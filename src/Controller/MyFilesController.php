<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MyFiles Controller
 *
 * @property \App\Model\Table\MyFilesTable $MyFiles
 */
class MyFilesController extends AppController
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
        $myFiles = $this->paginate($this->MyFiles);

        $this->set(compact('myFiles'));
        $this->set('_serialize', ['myFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id My File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $myFile = $this->MyFiles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('myFile', $myFile);
        $this->set('_serialize', ['myFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $myFile = $this->MyFiles->newEntity();
        if ($this->request->is('post')) {
            $myFile = $this->MyFiles->patchEntity($myFile, $this->request->data);
            if ($this->MyFiles->save($myFile)) {
                $this->Flash->success(__('The my file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The my file could not be saved. Please, try again.'));
        }
        $users = $this->MyFiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('myFile', 'users'));
        $this->set('_serialize', ['myFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id My File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $myFile = $this->MyFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $myFile = $this->MyFiles->patchEntity($myFile, $this->request->data);
            if ($this->MyFiles->save($myFile)) {
                $this->Flash->success(__('The my file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The my file could not be saved. Please, try again.'));
        }
        $users = $this->MyFiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('myFile', 'users'));
        $this->set('_serialize', ['myFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id My File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $myFile = $this->MyFiles->get($id);
        if ($this->MyFiles->delete($myFile)) {
            $this->Flash->success(__('The my file has been deleted.'));
        } else {
            $this->Flash->error(__('The my file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
