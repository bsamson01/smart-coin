<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BankingDetails Controller
 *
 * @property \App\Model\Table\BankingDetailsTable $BankingDetails
 * @method \App\Model\Entity\BankingDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankingDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Banks'],
        ];
        $bankingDetails = $this->paginate($this->BankingDetails);

        $this->set(compact('bankingDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Banking Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bankingDetail = $this->BankingDetails->get($id, [
            'contain' => ['Users', 'Banks'],
        ]);

        $this->set(compact('bankingDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bankingDetail = $this->BankingDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $bankingDetail = $this->BankingDetails->patchEntity($bankingDetail, $this->request->getData());
            if ($this->BankingDetails->save($bankingDetail)) {
                $this->Flash->success(__('The banking detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banking detail could not be saved. Please, try again.'));
        }
        $users = $this->BankingDetails->Users->find('list', ['limit' => 200]);
        $banks = $this->BankingDetails->Banks->find('list', ['limit' => 200]);
        $this->set(compact('bankingDetail', 'users', 'banks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banking Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bankingDetail = $this->BankingDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankingDetail = $this->BankingDetails->patchEntity($bankingDetail, $this->request->getData());
            if ($this->BankingDetails->save($bankingDetail)) {
                $this->Flash->success(__('The banking detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banking detail could not be saved. Please, try again.'));
        }
        $users = $this->BankingDetails->Users->find('list', ['limit' => 200]);
        $banks = $this->BankingDetails->Banks->find('list', ['limit' => 200]);
        $this->set(compact('bankingDetail', 'users', 'banks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banking Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankingDetail = $this->BankingDetails->get($id);
        if ($this->BankingDetails->delete($bankingDetail)) {
            $this->Flash->success(__('The banking detail has been deleted.'));
        } else {
            $this->Flash->error(__('The banking detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
