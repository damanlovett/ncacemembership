<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nominations Controller
 *
 * @property \App\Model\Table\NominationsTable $Nominations
 */
class NominationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Awards']
        ];
        $nominations = $this->paginate($this->Nominations);

        $this->set(compact('nominations'));
        $this->set('_serialize', ['nominations']);
    }

    /**
     * View method
     *
     * @param string|null $id Nomination id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nomination = $this->Nominations->get($id, [
            'contain' => ['Users', 'Awards', 'Votes']
        ]);

        $this->set('nomination', $nomination);
        $this->set('_serialize', ['nomination']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nomination = $this->Nominations->newEntity();
        if ($this->request->is('post')) {
            $nomination = $this->Nominations->patchEntity($nomination, $this->request->data);
            if ($this->Nominations->save($nomination)) {
                $this->Flash->success(__('The nomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomination could not be saved. Please, try again.'));
        }
        $users = $this->Nominations->Users->find('list', ['limit' => 200]);
        $awards = $this->Nominations->Awards->find('list', ['limit' => 200]);
        $this->set(compact('nomination', 'users', 'awards'));
        $this->set('_serialize', ['nomination']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nomination id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nomination = $this->Nominations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nomination = $this->Nominations->patchEntity($nomination, $this->request->data);
            if ($this->Nominations->save($nomination)) {
                $this->Flash->success(__('The nomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomination could not be saved. Please, try again.'));
        }
        $users = $this->Nominations->Users->find('list', ['limit' => 200]);
        $awards = $this->Nominations->Awards->find('list', ['limit' => 200]);
        $this->set(compact('nomination', 'users', 'awards'));
        $this->set('_serialize', ['nomination']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nomination id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nomination = $this->Nominations->get($id);
        if ($this->Nominations->delete($nomination)) {
            $this->Flash->success(__('The nomination has been deleted.'));
        } else {
            $this->Flash->error(__('The nomination could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
