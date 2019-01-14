<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SponsoredLevels Controller
 *
 * @property \App\Model\Table\SponsoredLevelsTable $SponsoredLevels
 */
class SponsoredLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sponsoredLevels = $this->paginate($this->SponsoredLevels);

        $this->set(compact('sponsoredLevels'));
        $this->set('_serialize', ['sponsoredLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Sponsored Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponsoredLevel = $this->SponsoredLevels->get($id, [
            'contain' => []
        ]);

        $this->set('sponsoredLevel', $sponsoredLevel);
        $this->set('_serialize', ['sponsoredLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sponsoredLevel = $this->SponsoredLevels->newEntity();
        if ($this->request->is('post')) {
            $sponsoredLevel = $this->SponsoredLevels->patchEntity($sponsoredLevel, $this->request->data);
            if ($this->SponsoredLevels->save($sponsoredLevel)) {
                $this->Flash->success(__('The sponsored level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsored level could not be saved. Please, try again.'));
        }
        $this->set(compact('sponsoredLevel'));
        $this->set('_serialize', ['sponsoredLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsored Level id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponsoredLevel = $this->SponsoredLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponsoredLevel = $this->SponsoredLevels->patchEntity($sponsoredLevel, $this->request->data);
            if ($this->SponsoredLevels->save($sponsoredLevel)) {
                $this->Flash->success(__('The sponsored level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsored level could not be saved. Please, try again.'));
        }
        $this->set(compact('sponsoredLevel'));
        $this->set('_serialize', ['sponsoredLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponsored Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponsoredLevel = $this->SponsoredLevels->get($id);
        if ($this->SponsoredLevels->delete($sponsoredLevel)) {
            $this->Flash->success(__('The sponsored level has been deleted.'));
        } else {
            $this->Flash->error(__('The sponsored level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
