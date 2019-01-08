<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SponsoredItems Controller
 *
 * @property \App\Model\Table\SponsoredItemsTable $SponsoredItems
 */
class SponsoredItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sponsoredItems = $this->paginate($this->SponsoredItems);

        $this->set(compact('sponsoredItems'));
        $this->set('_serialize', ['sponsoredItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Sponsored Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponsoredItem = $this->SponsoredItems->get($id, [
            'contain' => []
        ]);

        $this->set('sponsoredItem', $sponsoredItem);
        $this->set('_serialize', ['sponsoredItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sponsoredItem = $this->SponsoredItems->newEntity();
        if ($this->request->is('post')) {
            $sponsoredItem = $this->SponsoredItems->patchEntity($sponsoredItem, $this->request->data);
            if ($this->SponsoredItems->save($sponsoredItem)) {
                $this->Flash->success(__('The sponsored item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsored item could not be saved. Please, try again.'));
        }
        $this->set(compact('sponsoredItem'));
        $this->set('_serialize', ['sponsoredItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsored Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponsoredItem = $this->SponsoredItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponsoredItem = $this->SponsoredItems->patchEntity($sponsoredItem, $this->request->data);
            if ($this->SponsoredItems->save($sponsoredItem)) {
                $this->Flash->success(__('The sponsored item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsored item could not be saved. Please, try again.'));
        }
        $this->set(compact('sponsoredItem'));
        $this->set('_serialize', ['sponsoredItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponsored Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponsoredItem = $this->SponsoredItems->get($id);
        if ($this->SponsoredItems->delete($sponsoredItem)) {
            $this->Flash->success(__('The sponsored item has been deleted.'));
        } else {
            $this->Flash->error(__('The sponsored item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
