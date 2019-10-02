<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usrs Controller
 *
 * @property \App\Model\Table\UsrsTable $Usrs
 */
class UsrsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {
        $usrs = $this->paginate($this->Usrs);

        $this->set(compact('usrs'));
        $this->set('_serialize', ['usrs']);
    }

    /**
     * View method
     *
     * @param string|null $id Usr id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usr = $this->Usrs->get($id, [
            'contain' => ['Sponsors']
        ]);

        $this->set('usr', $usr);
        $this->set('_serialize', ['usr']);


        $this->loadModel('Sponsors');
        $sponsorlist = $this->Sponsors->find('all')
            ->where(['Sponsors.usr_id' => $id])
            ->contain(['SponsoredItems']);

        $this->set(compact('sponsorlist'));

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userId = null;
        $usr = $this->Usrs->newEntity();
        if ($this->request->is('post')) {
            $usr = $this->Usrs->patchEntity($usr, $this->request->data);
            if ($this->Usrs->save($usr)) {
                $userId = $usr['id'];
                $this->Flash->success(__('The usr has been saved.'));

                return $this->redirect(['controller' => 'sponsors', 'action' => 'add', 1, $userId]);
            }
            $this->Flash->error(__('The usr could not be saved. Please, try again.'));
        }
        $this->set(compact('usr'));
        $this->set('_serialize', ['usr']);

        $this->loadModel('SponsoredItems');
        $sponsorship = $this->SponsoredItems->find('all')
            ->where(['SponsoredItems.sponsorship_id' => 1])
            ->contain(['Usrs', 'SponsoredLevels'])
            ->order(['SponsoredLevels.placement' => 'ASC'])
            ->limit(100);

        $this->set('sponsorship', $sponsorship);

    }

    /**
     * Edit method
     *
     * @param string|null $id Usr id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usr = $this->Usrs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usr = $this->Usrs->patchEntity($usr, $this->request->data);
            if ($this->Usrs->save($usr)) {
                $this->Flash->success(__('The usr has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usr could not be saved. Please, try again.'));
        }
        $this->set(compact('usr'));
        $this->set('_serialize', ['usr']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usr id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usr = $this->Usrs->get($id);
        if ($this->Usrs->delete($usr)) {
            $this->Flash->success(__('The usr has been deleted.'));
        } else {
            $this->Flash->error(__('The usr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}