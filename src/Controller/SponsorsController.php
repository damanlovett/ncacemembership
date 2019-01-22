<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Sponsors Controller
 *
 * @property \App\Model\Table\SponsorsTable $Sponsors
 */
class SponsorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'SponsoredItems', 'Sponsorships'],
            'order' => ['Sponsors.user_id' => 'asc']
        ];
        $sponsors = $this->paginate($this->Sponsors);

        $this->set(compact('sponsors'));
        $this->set('_serialize', ['sponsors']);
    }

    /**
     * View method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => ['Users', 'SponsoredItems', 'Sponsorships']
        ]);

        $this->set('sponsor', $sponsor);
        $this->set('_serialize', ['sponsor']);
    }

    /** 
     * My method
     * 
     * 
     */
    public function my($id = null)
    {
        $userId = $this->UserAuth->getUserId();
        $sponsor = $this->Sponsors->newEntity();
        if ($this->request->is('post')) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->data);
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'my', $id]);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $this->loadModel('SponsoredItems');
        $sponsorship = $this->SponsoredItems->find('all')
            ->where(['SponsoredItems.sponsorship_id' => $id])
            ->contain(['Users', 'SponsoredLevels'])
            ->order(['SponsoredLevels.placement' => 'ASC'])
            ->limit(100);

        //$this->set('sponsorship', $sponsorship);

        $sponsorlist = $this->Sponsors->find('all')
            ->where(['Sponsors.sponsorship_id' => $id, 'Sponsors.user_id' => $userId])
            ->contain(['Users', 'SponsoredItems', 'SponsoredItems.SponsoredLevels'])
            ->limit(50);

        //$this->set('sponsorlist', $sponsorlist);
        $this->set(compact('sponsor', 'sponsorlist', 'sponsorship'));
        $this->set('_serialize', ['sponsor']);

    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $userId = $this->UserAuth->getUserId();

        $sponsor = $this->Sponsors->newEntity();
        if ($this->request->is('post')) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->data);
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }

        $this->loadModel('SponsoredItems');
        $sponsorship = $this->SponsoredItems->find('all')
            ->where(['SponsoredItems.sponsorship_id' => $id])
            ->contain(['Users', 'SponsoredLevels'])
            ->order(['SponsoredLevels.placement' => 'ASC'])
            ->limit(100);

        $this->set('sponsorship', $sponsorship);

        $sponsorlist = $this->Sponsors->find('all')
            ->where(['Sponsors.sponsorship_id' => $id, 'Sponsors.user_id' => $userId])
            ->contain(['Users', 'SponsoredItems', 'SponsoredItems.SponsoredLevels'])
            ->limit(50);

        $this->set('sponsorlist', $sponsorlist);

        //$users = $this->Sponsors->Users->find('list', ['limit' => 200]);
        $sponsoredItems = $this->Sponsors->SponsoredItems->find('list')
            ->where(['sponsorship_id' => $id, 'unavailable' => 0])
            ->limit(50);
        $sponsorships = $this->Sponsors->Sponsorships->get($id, [
            'keyField' => 'name',
            'valueField' => 'id'
        ]);
        $this->set(compact('sponsor', 'users', 'sponsoredItems', 'sponsorships', 'userId'));
        $this->set('_serialize', ['sponsor']);
    }

    /**
     * mview method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function mview($id = null, $id2 = null)
    {
        $userId = $this->UserAuth->getUserId();

        $sponsor = $this->Sponsors->newEntity();
        if ($this->request->is('post')) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->data);
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }

        $this->loadModel('Users');
        $user = $this->Users->findById($id2)->first();
        $this->set('user', $user);

        $this->loadModel('UserDetails');
        $details = $this->UserDetails->findByUserId($id2)->first();
        $this->set('details', $details);

        $sponsorlist = $this->Sponsors->find('all')
            ->where(['Sponsors.sponsorship_id' => $id, 'Sponsors.user_id' => $id2])
            ->contain(['Users', 'SponsoredItems', 'SponsoredItems.SponsoredLevels'])
            ->limit(50);

        $this->set('sponsorlist', $sponsorlist);

        //$users = $this->Sponsors->Users->find('list', ['limit' => 200]);
        $sponsoredItems = $this->Sponsors->SponsoredItems->find('list')
            ->where(['sponsorship_id' => $id, 'unavailable' => 0])
            ->limit(50);
        $sponsorships = $this->Sponsors->Sponsorships->get($id, [
            'keyField' => 'name',
            'valueField' => 'id'
        ]);
        $this->set(compact('sponsor', 'users', 'sponsoredItems', 'sponsorships', 'userId'));
        $this->set('_serialize', ['sponsor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->data);
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $users = $this->Sponsors->Users->find('list', ['limit' => 200]);
        $sponsoredItems = $this->Sponsors->SponsoredItems->find('list', ['limit' => 200]);
        $sponsorships = $this->Sponsors->Sponsorships->find('list', ['limit' => 200]);
        $this->set(compact('sponsor', 'users', 'sponsoredItems', 'sponsorships'));
        $this->set('_serialize', ['sponsor']);
    }
    /**
     * Thanks method
     * 
     */
    public function thanks($id = null)
    {
        $userEntity = $this->UserAuth->getUser();

        $header = $userEntity['first_name'];
        //$headers.="MIME-Version: 1.0\n";
        //$headers.="Content-type: text/html; charset=iso 8859-1";


        $message = '';
        $message .= "<p>" . $userEntity['first_name'] . "  " . $userEntity['last_name'];
        $message .= " has a submitted a Sponsorship Request for $" . $id . "  Please log";
        $message .= " into the system <a href='http://members.ncace.org'>http://members.ncace.org</a> and process the transaction.</p>";
        $message .= "<p><hr/>";

        $email = new Email('default');
        $email
            ->template('default')
            ->emailFormat('both')
            ->from('admin@ncace.org', 'admin')
            ->to('eddie@lovettcreations.org', 'membership')
            ->subject('Sponsorship Request')
            ->send($message);

        if ($userEntity['email']) {

            $this->Flash->success(__('Email has been sent'));

        } else {
            $this->Flash->error(__('Email has not been sent'));

        }

        return $this->redirect($this->referer());

    }


    /**
     * Delete method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponsor = $this->Sponsors->get($id);
        if ($this->Sponsors->delete($sponsor)) {
            $this->Flash->success(__('The sponsor has been deleted.'));
        } else {
            $this->Flash->error(__('The sponsor could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}