<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;

/**
 * Profile Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileController extends AppController
{

    public function initialize(): void
    {
        $this->loadModel('Users');
        $this->loadModel('CoinsOnAuction');
        $this->loadModel('PendingPayments');
        $this->loadModel('CoinsOnHand');
        $this->loadModel('Transactions');
        $this->loadModel('WaitingPeriods');
        parent::initialize();

        $email = $this->Authentication->getIdentityData('email');
        $this->user = $this->Users->findByEmail($email)->first();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->user;
        $this->CoinsOnAuction->virtualFields['totalCoins'] = 'SUM(amount)';
        $coinsOnAuction = $this->CoinsOnAuction->find('all')->toArray();
        $transactions = $this->Users->getUserTransactions($this->user->id);
        $toPay = $this->PendingPayments->findByBuyer($this->user->id)->toArray();
        $toBePaid = $this->PendingPayments->findBySeller($this->user->id)->toArray();
        $onSale = $this->CoinsOnAuction->findByUserId($this->user->id)->toArray();
        $onHand = $this->CoinsOnHand->findByUserId($this->user->id)->toArray();

        $this->set(compact('user', 'coinsOnAuction', 'transactions' , 'toPay', 'toBePaid', 'onSale', 'onHand'));
    }

    public function confirmPayments()
    {

        if ($this->request->is(['post', 'put'])) {
            $id = $this->request->getData('id');

            if ($id) {
                $id = (int)$id;
                $payment = $this->PendingPayments->findByIdAndSellerAndPaid($id, $this->user->id, false)->first();
                if ($payment) {
                    $payment->paid = true;
                    $this->PendingPayments->save($payment);
                    $transactionData = [
                        'buyer_id' => $payment->buyer,
                        'seller_id' => $payment->seller,
                        'amount' => $payment->amount,
                        'waiting_time_id' => $payment->waiting_period
                    ];

                    $transaction = $this->Transactions->newEmptyEntity();
                    $this->Transactions->patchEntity($transaction, $transactionData);
                    $this->Transactions->save($transaction);
                    $waitingPeriod = $this->WaitingPeriods->findById($payment->waiting_period)->first();
                    $coinsOnHandData = [
                        'user_id' => $payment->buyer,
                        'amount' => $payment->amount,
                        'waiting_period' => $waitingPeriod->days,
                        'sell_amount' => $payment->amount * (( 100 + $waitingPeriod->percentage_gain) / 100),
                        'sell_date' => new \DateTime('+'.$waitingPeriod->days . ' days')
                    ];
                    $coinsOnHand = $this->CoinsOnHand->newEmptyEntity();
                    $this->CoinsOnHand->patchEntity($coinsOnHand, $coinsOnHandData);
                    $this->CoinsOnHand->save($coinsOnHand);
                    $payment = $this->PendingPayments->get($payment->id);
                    $this->PendingPayments->delete($payment);
                }
            }
        }
        return $this->redirect($this->referer());
    }

    public function sellCoins()
    {
        if ($this->request->is(['post', 'put'])) {
            $id = $this->request->getData('id');

            if ($id) {
                $id = (int)$id;
                $coinsForSell = $this->CoinsOnHand->findByIdAndUserId($id, $this->user->id)
                                ->where([
                                    'sell_date' <= FrozenTime::now()
                                ])->first();
                if ($coinsForSell) {
                    
                }
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->user;

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
