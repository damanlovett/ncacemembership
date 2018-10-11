<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 */
class MembershipsController extends AppController
{
    /**
     * This controller uses following components
     *
     * @var array
     */
    public $components = ['Usermgmt.Search'];
    /**
     * This controller uses following default pagination values
     *
     * @var array
     */
    public $paginate = [
        'limit' => 25
    ];
    /**
     * This controller uses search filters in following functions for ex index, online function
     *
     * @var array
     */
    public $searchFields = [
        'index' => [
            'Memberships' => [
                'Documents' => [
                    'type' => 'text',
                    'label' => 'Search',
                    'tagline' => 'Search by name',
                    'condition' => 'multiple',
                    'searchFields' => ['Users.first_name', 'Users.last_name'],
                    'inputOptions' => ['style' => 'width:300px;']
                ]
            ]
        ],
        'mydocuments' => [
            'Documents' => [
                'Documents' => [
                    'type' => 'text',
                    'label' => 'Search',
                    'tagline' => 'Search by document name, type',
                    'condition' => 'multiple',
                    'searchFields' => ['Documents.signature_name', 'Documents.signature'],
                    'inputOptions' => ['style' => 'width:300px;']
                ],
                'Documents.dropdown_id' => [
                    'type' => 'select',
                    'label' => 'Category',
                    'model' => 'Dropdowns',
                    'selector' => 'getDocumentCategories'
                ]
            ]
        ]
    ];
    /**
     * Called before the controller action. You can use this method to configure and customize components
     * or perform logic that needs to happen before each controller action.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Memberships');
        if (isset($this->Security) && $this->request->is('ajax')) {
            $this->Security->config('unlockedActions', [$this->request['action']]);
            $this->getEventManager()->off($this->Csrf);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->Search->applySearch();

        $this->paginate = [
            'contain' => ['Users'],
            'sortWhitelist' => [
                'membership_type', 'member_year', 'Users.last_name', 'created', 'type_payment', 'due_amount', 'processed'
            ],
            'order' => ['Users.last_name' => 'asc']
        ];
        $memberships = $this->paginate($this->Memberships->find('all')->where(['Memberships.processed' => 0]));


        $this->set(compact('memberships'));
        $this->set('_serialize', ['memberships']);

        $this->loadModel('Blurbs');
        $current = $this->Blurbs->getBlurbById('4');
        $this->set(compact('current'));


        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->render('/Element/membership');
        }

    }
    /**
     * Personal method
     *
     * @return \Cake\Network\Response|null
     */
    public function personal()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $memberships = $this->paginate($this->Memberships->find('all')->where(['Memberships.user_id' => $this->UserAuth->getUserId()]), ['order' => ['Memberships.member_year' => 'desc']]);


        $this->set(compact('memberships'));
        $this->set('_serialize', ['memberships']);

        $this->loadModel('Usermgmt.UserEmailSignatures');
        $questions = $this->UserEmailSignatures->getEmailSignatureById('1');

        $this->set(compact('questions'));

    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function all()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'sortWhitelist' => [
                'membership_type', 'member_year', 'Users.last_name', 'created', 'type_payment', 'due_amount', 'processed'
            ],
            'order' => ['Users.last_name' => 'asc']
        ];
        $memberships = $this->paginate($this->Memberships->find('all'));


        $this->set(compact('memberships'));
        $this->set('_serialize', ['memberships']);

        $this->loadModel('Blurbs');
        $current = $this->Blurbs->getBlurbById('4');
        $this->set(compact('current'));

    }



    public function membersAccounts($id = null)
    {

        if ($id == 1) {
            $this->response->download('processed_accounts.csv');
        } else {
            $this->response->download('unprocessed_memberships.csv');
        }

        $datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['id', 'First', 'Last', 'Email', 'Username', 'year', 'type', 'payment', 'Due', ''];
        $_extract = ['id', 'user.first_name', 'user.last_name', 'user.email', 'user.username', 'member_year', 'membership_type', 'type_payment', 'due_amount'];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function mentorAccounts($year = null)
    {

        $this->response->download($year . '_mentor_accounts.csv');
        $datas = $this->Memberships->find('all')->contain(['Users'])->where(['Memberships.member_year' => $year, 'AND' => ['Memberships.mentor_program' => 1], ])->toArray();

        $_serialize = 'datas';
        $_header = ['id', 'First', 'Last', 'Username', 'Email', ];
        $_extract = ['id', 'user.first_name', 'user.last_name', 'user.username', 'user.email'];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }


    public function allAccounts()
    {

        $this->response->download('all_accounts.csv');

        $datas = $this->Memberships->find('all')->contain('Users')->toArray();

        $_serialize = 'datas';
        $_header = ['id', 'First', 'Last', 'Email', 'Username', 'year', 'type', 'payment', 'Due', ''];
        $_extract = ['id', 'user.first_name', 'user.last_name', 'user.email', 'user.username', 'member_year', 'membership_type', 'type_payment', 'due_amount'];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }


    public function confirmation()
    {

        $this->loadModel('Usermgmt.UserEmailSignatures');
        $signature = $this->UserEmailSignatures->getEmailSignatureById('3');

        $this->set(compact('signature'));
    }




    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);
    }

    /**
     * Review method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function review($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);
    }


    /**
     * Invoice method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function invoice($id = null, $userid = null, $layout = null)
    {

        $this->viewBuilder()->layout($layout);

        $membership = $this->Memberships->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('membership', $membership);
        $this->set('_serialize', ['membership']);

        $this->loadModel('Usermgmt.UserEmailSignatures');
        $signature = $this->UserEmailSignatures->getEmailSignatureById('3');
        $address = $this->UserEmailSignatures->getEmailSignatureById('4');
        $paypal = $this->UserEmailSignatures->getEmailSignatureById('5');

        $this->set(compact('signature', 'address', 'paypal'));

        $this->loadModel('Usermgmt.Users');
        $user = $this->Users->getUserById($userid, [
            'contain' => ['UserDetails']
        ]);

        $this->set(compact('user'));
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $users = $this->Memberships->Users->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'users'));
        $this->set('_serialize', ['membership']);
    }

    /**
     * My method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function my()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'payment']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }

//		$this->loadModel('UserDetails');
//			$institution = $this->UserDetails
//							    ->find()
//							    ->order(['organization' => 'ASC'])
//								->where(['organization !='=>''])
//								->all();
//			 $this->set(compact('institution'));

        $this->loadModel('Blurbs');
        $due = $this->Blurbs->getBlurbById('2');
        $mentor = $this->Blurbs->getBlurbById('1');
        $current = $this->Blurbs->getBlurbById('4');
        $this->set(compact('due', 'mentor', 'current'));

        $users = $this->UserAuth->getUserId();
        //$users = $this->Memberships->Users->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'users'));
        $this->set('_serialize', ['membership']);
    }

    /**
     * payment method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function payment()
    {

        $this->loadModel('Usermgmt.UserEmailSignatures');
        $membership = $this->UserEmailSignatures->getEmailSignatureById('1');
        $signature = $this->UserEmailSignatures->getEmailSignatureById('3');
        $address = $this->UserEmailSignatures->getEmailSignatureById('4');
        $paypal = $this->UserEmailSignatures->getEmailSignatureById('5');

        $this->set(compact('membership', 'signature', 'address', 'paypal'));


    }


    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->data);
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $users = $this->Memberships->Users->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'users'));
        $this->set('_serialize', ['membership']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}