<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CoinsOnHand Controller
 *
 * @property \App\Model\Table\CoinsOnHandTable $CoinsOnHand
 * @method \App\Model\Entity\CoinsOnHand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoinsOnHandController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $coinsOnHand = $this->paginate($this->CoinsOnHand);

        $this->set(compact('coinsOnHand'));
    }

    /**
     * View method
     *
     * @param string|null $id Coins On Hand id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coinsOnHand = $this->CoinsOnHand->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('coinsOnHand'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coinsOnHand = $this->CoinsOnHand->newEmptyEntity();
        if ($this->request->is('post')) {
            $coinsOnHand = $this->CoinsOnHand->patchEntity($coinsOnHand, $this->request->getData());
            if ($this->CoinsOnHand->save($coinsOnHand)) {
                $this->Flash->success(__('The coins on hand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coins on hand could not be saved. Please, try again.'));
        }
        $users = $this->CoinsOnHand->Users->find('list', ['limit' => 200]);
        $this->set(compact('coinsOnHand', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coins On Hand id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coinsOnHand = $this->CoinsOnHand->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coinsOnHand = $this->CoinsOnHand->patchEntity($coinsOnHand, $this->request->getData());
            if ($this->CoinsOnHand->save($coinsOnHand)) {
                $this->Flash->success(__('The coins on hand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coins on hand could not be saved. Please, try again.'));
        }
        $users = $this->CoinsOnHand->Users->find('list', ['limit' => 200]);
        $this->set(compact('coinsOnHand', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coins On Hand id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coinsOnHand = $this->CoinsOnHand->get($id);
        if ($this->CoinsOnHand->delete($coinsOnHand)) {
            $this->Flash->success(__('The coins on hand has been deleted.'));
        } else {
            $this->Flash->error(__('The coins on hand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
