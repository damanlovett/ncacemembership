<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Awards Controller
 *
 * @property \App\Model\Table\AwardsTable $Awards
 */
class AwardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $awards = $this->paginate($this->Awards);

        $this->set(compact('awards'));
        $this->set('_serialize', ['awards']);
    }

    /**
     * View method
     *
     * @param string|null $id Award id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $award = $this->Awards->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('award', $award);
        $this->set('_serialize', ['award']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $award = $this->Awards->newEntity();
        if ($this->request->is('post')) {
            $award = $this->Awards->patchEntity($award, $this->request->data);
            if ($this->Awards->save($award)) {
                $this->Flash->success(__('The award has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The award could not be saved. Please, try again.'));
        }
        $users = $this->Awards->Users->find('list', ['limit' => 200]);
        $this->set(compact('award', 'users'));
        $this->set('_serialize', ['award']);

        $this->loadModel('Dropdowns');
        $options = $this->Dropdowns->find('list');
        $this->set(compact('options'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Award id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $award = $this->Awards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $award = $this->Awards->patchEntity($award, $this->request->data);
            if ($this->Awards->save($award)) {
                $this->Flash->success(__('The award has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The award could not be saved. Please, try again.'));
        }
        $users = $this->Awards->Users->find('list', ['limit' => 200]);
        $this->set(compact('award', 'users'));
        $this->set('_serialize', ['award']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Award id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $award = $this->Awards->get($id);
        if ($this->Awards->delete($award)) {
            $this->Flash->success(__('The award has been deleted.'));
        } else {
            $this->Flash->error(__('The award could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
