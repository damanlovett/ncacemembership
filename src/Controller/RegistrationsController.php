<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Registrations Controller
 *
 * @property \App\Model\Table\RegistrationsTable $Registrations
 */
class RegistrationsController extends AppController
{

    /**
     * This controller uses following components
     *
     * @var array
     */
    public $components = ['Usermgmt.Search', 'Usermgmt.UserConnect', ];
    /**
     * This controller uses following default pagination values
     *
     * @var array
     */
    public $paginate = [
        'limit'=>25
    ];
    /**
     * This controller uses search filters in following functions for ex index, online function
     *
     * @var array
     */
    public $searchFields = [
        'index'=>[
            'Registrations'=>[
                'Registration'=>[
                    'type'=>'text',
                    'label'=>'Search',
                    'tagline'=>'Search by conference, status, renewed',
                    'condition'=>'multiple',
                    'searchFields'=>['Registration.name', 'Registration.membership_status', 'Registration.renewed_membership'],
                    'searchFunc'=>['plugin'=>'Usermgmt', 'controller'=>'Registration', 'function'=>'indexSearch'],
                    'inputOptions'=>['style'=>'width:200px;']
                ],
                'Registration.id'=>[
                    'type'=>'text',
                    'condition'=>'=',
                    'label'=>'Conference Id',
                    'inputOptions'=>['style'=>'width:50px;']
                ],
                'Registration.renewed_membership'=>[
                    'type'=>'select',
                    'label'=>'Status',
                    'options'=>[''=>'Select', '1'=>'Active', '0'=>'Inactive']
                ],
                'Registration.membership_status'=>[
                    'type'=>'select',
                    'label'=>'NCACE Status',
                    'options'=>[''=>'Select', '1'=>'Current', '0'=>'Pending']
                ],
                'Registration.created1'=>[
                    'type'=>'text',
                    'condition'=>'>=',
                    'label'=>'From',
                    'searchField'=>'created',
                    'inputOptions'=>['style'=>'width:100px;', 'class'=>'datepicker']
                ],
            ]
        ]

    ];





















    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Conferences', 'Users']
        ];
        $registrations = $this->paginate($this->Registrations);

        $this->set(compact('registrations'));
        $this->set('_serialize', ['registrations']);
    }

    /**
     * View method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registration = $this->Registrations->get($id, [
            'contain' => ['Conferences', 'Users']
        ]);

        $this->set('registration', $registration);
        $this->set('_serialize', ['registration']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registration = $this->Registrations->newEntity();
        if ($this->request->is('post')) {
            $registration = $this->Registrations->patchEntity($registration, $this->request->data);
            if ($this->Registrations->save($registration)) {
                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $conferences = $this->Registrations->Conferences->find('list', ['limit' => 200]);
        $users = $this->Registrations->Users->find('list', ['limit' => 200]);
        $this->set(compact('registration', 'conferences', 'users'));
        $this->set('_serialize', ['registration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registration = $this->Registrations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registration = $this->Registrations->patchEntity($registration, $this->request->data);
            if ($this->Registrations->save($registration)) {
                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $conferences = $this->Registrations->Conferences->find('list', ['limit' => 200]);
        $users = $this->Registrations->Users->find('list', ['limit' => 200]);
        $this->set(compact('registration', 'conferences', 'users'));
        $this->set('_serialize', ['registration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registration = $this->Registrations->get($id);
        if ($this->Registrations->delete($registration)) {
            $this->Flash->success(__('The registration has been deleted.'));
        } else {
            $this->Flash->error(__('The registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
