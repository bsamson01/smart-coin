<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WaitingPeriods Controller
 *
 * @property \App\Model\Table\WaitingPeriodsTable $WaitingPeriods
 * @method \App\Model\Entity\WaitingPeriod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WaitingPeriodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $waitingPeriods = $this->paginate($this->WaitingPeriods);

        $this->set(compact('waitingPeriods'));
    }

    /**
     * View method
     *
     * @param string|null $id Waiting Period id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $waitingPeriod = $this->WaitingPeriods->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('waitingPeriod'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $waitingPeriod = $this->WaitingPeriods->newEmptyEntity();
        if ($this->request->is('post')) {
            $waitingPeriod = $this->WaitingPeriods->patchEntity($waitingPeriod, $this->request->getData());
            if ($this->WaitingPeriods->save($waitingPeriod)) {
                $this->Flash->success(__('The waiting period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The waiting period could not be saved. Please, try again.'));
        }
        $this->set(compact('waitingPeriod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Waiting Period id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $waitingPeriod = $this->WaitingPeriods->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $waitingPeriod = $this->WaitingPeriods->patchEntity($waitingPeriod, $this->request->getData());
            if ($this->WaitingPeriods->save($waitingPeriod)) {
                $this->Flash->success(__('The waiting period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The waiting period could not be saved. Please, try again.'));
        }
        $this->set(compact('waitingPeriod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Waiting Period id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $waitingPeriod = $this->WaitingPeriods->get($id);
        if ($this->WaitingPeriods->delete($waitingPeriod)) {
            $this->Flash->success(__('The waiting period has been deleted.'));
        } else {
            $this->Flash->error(__('The waiting period could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
