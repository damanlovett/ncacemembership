<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blurbs Controller
 *
 * @property \App\Model\Table\BlurbsTable $Blurbs
 */
class BlurbsController extends AppController
{
	
/**
	 * This controller uses following helpers
	 *
	 * @var array
	 */
	public $helpers = ['Usermgmt.Tinymce', 'Usermgmt.Ckeditor'];	

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $blurbs = $this->paginate($this->Blurbs);

        $this->set(compact('blurbs'));
        $this->set('_serialize', ['blurbs']);
    }

    /**
     * View method
     *
     * @param string|null $id Blurb id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blurb = $this->Blurbs->get($id, [
            'contain' => []
        ]);

        $this->set('blurb', $blurb);
        $this->set('_serialize', ['blurb']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blurb = $this->Blurbs->newEntity();
        if ($this->request->is('post')) {
            $blurb = $this->Blurbs->patchEntity($blurb, $this->request->data);
            if ($this->Blurbs->save($blurb)) {
                $this->Flash->success(__('The blurb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blurb could not be saved. Please, try again.'));
        }
        $this->set(compact('blurb'));
        $this->set('_serialize', ['blurb']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blurb id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blurb = $this->Blurbs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blurb = $this->Blurbs->patchEntity($blurb, $this->request->data);
            if ($this->Blurbs->save($blurb)) {
                $this->Flash->success(__('The blurb has been saved.'));

                return $this->redirect(['controller' => 'memberships', 'action' => 'index']);
            }
            $this->Flash->error(__('The blurb could not be saved. Please, try again.'));
        }
        $this->set(compact('blurb'));
        $this->set('_serialize', ['blurb']);
    }

    /**
     * Change method
     *
     * @param string|null $id Blurb id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function change($id = null)
    {
        $blurb = $this->Blurbs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blurb = $this->Blurbs->patchEntity($blurb, $this->request->data);
            if ($this->Blurbs->save($blurb)) {
                $this->Flash->success(__('The blurb has been saved.'));

                return $this->redirect(['controller'=>'memberships','action' => 'index']);
            }
            $this->Flash->error(__('The blurb could not be saved. Please, try again.'));
        }
        $this->set(compact('blurb'));
        $this->set('_serialize', ['blurb']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blurb id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blurb = $this->Blurbs->get($id);
        if ($this->Blurbs->delete($blurb)) {
            $this->Flash->success(__('The blurb has been deleted.'));
        } else {
            $this->Flash->error(__('The blurb could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
