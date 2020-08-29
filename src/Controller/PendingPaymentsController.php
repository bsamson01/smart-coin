<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PendingPayments Controller
 *
 * @property \App\Model\Table\PendingPaymentsTable $PendingPayments
 * @method \App\Model\Entity\PendingPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PendingPaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pendingPayments = $this->paginate($this->PendingPayments);

        $this->set(compact('pendingPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Pending Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pendingPayment = $this->PendingPayments->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pendingPayment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pendingPayment = $this->PendingPayments->newEmptyEntity();
        if ($this->request->is('post')) {
            $pendingPayment = $this->PendingPayments->patchEntity($pendingPayment, $this->request->getData());
            if ($this->PendingPayments->save($pendingPayment)) {
                $this->Flash->success(__('The pending payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending payment could not be saved. Please, try again.'));
        }
        $this->set(compact('pendingPayment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pending Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pendingPayment = $this->PendingPayments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pendingPayment = $this->PendingPayments->patchEntity($pendingPayment, $this->request->getData());
            if ($this->PendingPayments->save($pendingPayment)) {
                $this->Flash->success(__('The pending payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending payment could not be saved. Please, try again.'));
        }
        $this->set(compact('pendingPayment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pending Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pendingPayment = $this->PendingPayments->get($id);
        if ($this->PendingPayments->delete($pendingPayment)) {
            $this->Flash->success(__('The pending payment has been deleted.'));
        } else {
            $this->Flash->error(__('The pending payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
