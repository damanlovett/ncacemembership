<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fees Controller
 *
 * @property \App\Model\Table\FeesTable $Fees
 */
class FeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Conferences']
        ];
        $fees = $this->paginate($this->Fees);

        $this->set(compact('fees'));
        $this->set('_serialize', ['fees']);
    }

    /**
     * View method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fee = $this->Fees->get($id, [
            'contain' => ['Users', 'Conferences']
        ]);

        $this->set('fee', $fee);
        $this->set('_serialize', ['fee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fee = $this->Fees->newEntity();
        if ($this->request->is('post')) {
            $fee = $this->Fees->patchEntity($fee, $this->request->data);
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $users = $this->Fees->Users->find('list', ['limit' => 200]);
        $conferences = $this->Fees->Conferences->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'users', 'conferences'));
        $this->set('_serialize', ['fee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fee = $this->Fees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fee = $this->Fees->patchEntity($fee, $this->request->data);
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $users = $this->Fees->Users->find('list', ['limit' => 200]);
        $conferences = $this->Fees->Conferences->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'users', 'conferences'));
        $this->set('_serialize', ['fee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fee = $this->Fees->get($id);
        if ($this->Fees->delete($fee)) {
            $this->Flash->success(__('The fee has been deleted.'));
        } else {
            $this->Flash->error(__('The fee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
