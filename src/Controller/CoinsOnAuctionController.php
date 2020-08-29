<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CoinsOnAuction Controller
 *
 * @property \App\Model\Table\CoinsOnAuctionTable $CoinsOnAuction
 * @method \App\Model\Entity\CoinsOnAuction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoinsOnAuctionController extends AppController
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
        $coinsOnAuction = $this->paginate($this->CoinsOnAuction);

        $this->set(compact('coinsOnAuction'));
    }

    /**
     * View method
     *
     * @param string|null $id Coins On Auction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coinsOnAuction = $this->CoinsOnAuction->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('coinsOnAuction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coinsOnAuction = $this->CoinsOnAuction->newEmptyEntity();
        if ($this->request->is('post')) {
            $coinsOnAuction = $this->CoinsOnAuction->patchEntity($coinsOnAuction, $this->request->getData());
            if ($this->CoinsOnAuction->save($coinsOnAuction)) {
                $this->Flash->success(__('The coins on auction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coins on auction could not be saved. Please, try again.'));
        }
        $users = $this->CoinsOnAuction->Users->find('list', ['limit' => 200]);
        $this->set(compact('coinsOnAuction', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coins On Auction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coinsOnAuction = $this->CoinsOnAuction->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coinsOnAuction = $this->CoinsOnAuction->patchEntity($coinsOnAuction, $this->request->getData());
            if ($this->CoinsOnAuction->save($coinsOnAuction)) {
                $this->Flash->success(__('The coins on auction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coins on auction could not be saved. Please, try again.'));
        }
        $users = $this->CoinsOnAuction->Users->find('list', ['limit' => 200]);
        $this->set(compact('coinsOnAuction', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coins On Auction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coinsOnAuction = $this->CoinsOnAuction->get($id);
        if ($this->CoinsOnAuction->delete($coinsOnAuction)) {
            $this->Flash->success(__('The coins on auction has been deleted.'));
        } else {
            $this->Flash->error(__('The coins on auction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
