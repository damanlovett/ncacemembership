<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dropdowns Controller
 *
 * @property \App\Model\Table\DropdownsTable $Dropdowns
 */
class DropdownsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $dropdowns = $this->paginate($this->Dropdowns);

        $this->set(compact('dropdowns'));
        $this->set('_serialize', ['dropdowns']);
    }

    /**
     * View method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => []
        ]);

        $this->set('dropdown', $dropdown);
        $this->set('_serialize', ['dropdown']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dropdown = $this->Dropdowns->newEntity();
        if ($this->request->is('post')) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->data);
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
        $this->set('_serialize', ['dropdown']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->data);
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
        $this->set('_serialize', ['dropdown']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dropdown = $this->Dropdowns->get($id);
        if ($this->Dropdowns->delete($dropdown)) {
            $this->Flash->success(__('The dropdown has been deleted.'));
        } else {
            $this->Flash->error(__('The dropdown could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
