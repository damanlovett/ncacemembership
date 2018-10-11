<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Mailer\Email;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 */
class TransactionsController extends AppController
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
        'limit'=>25
    ];
    /**
     * This controller uses search filters in following functions for ex index, online function
     *
     * @var array
     */
    public $searchFields = [
        'index'=>[
            'Transactions'=>[
                'Transaction'=>[
                    'type'=>'text',
                    'label'=>'Search',
                    'tagline'=>'Search by transaction, created by',
                    'condition'=>'multiple',
                    'searchFields'=>['Transaction.name', 'Transaction.membership_status', 'Transaction.renewed_membership'],
                    'searchFunc'=>['plugin'=>'Usermgmt', 'controller'=>'Transaction', 'function'=>'indexSearch'],
                    'inputOptions'=>['style'=>'width:200px;']
                ],
                'Transaction.processed'=>[
                    'type'=>'select',
                    'label'=>'Processed?',
                    'options'=>[''=>'Select', '1'=>'Active', '0'=>'Inactive']
                ],
                'Transaction.check_number'=>[
                    'type'=>'text',
                    'label'=>'Check Number',
                    'options'=>[''=>'Select', '1'=>'Current', '0'=>'Pending']
                ],
                'Transaction.created1'=>[
                    'type'=>'text',
                    'condition'=>'>=',
                    'label'=>'Created by',
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
            'contain' => ['Users']
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    /**
     * my  method
     *
     * @return \Cake\Network\Response|null
     */
    public function myTransactions()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $transactions = $this->paginate($this->Transactions->find('all')->where(['Transactions.user_id' => $this->UserAuth->getUserId()]));

        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    /**
     * View Transaction method
     *
     */
    public function transactions($userid)
    {
        $this->loadModel('UserDetails');
        $details = $this->UserDetails->find()
    ->where(['user_id' => $userid])
    ->first();

        $this->loadModel('Users');
        $user = $this->Users->get($userid);
 
        $transactions = $this->paginate($this->Transactions->find('all')->where(['Transactions.user_id' => $userid]), ['order' => ['Transactions.id' => 'desc']]);

        $this->loadModel('Memberships');
        $memberships = $this->paginate($this->Memberships->find('all')->where(['Memberships.user_id' => $userid]));

        $this->loadModel('Registrations');
        $registrations = $this->paginate($this->Registrations->find('all')->where(['Registrations.user_id' => $userid]));

        $this->set(compact('transactions','user','memberships','details','registrations','created'));
        $this->set('_serialize', ['transactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('transaction', $transaction);
        $this->set('_serialize', ['transaction']);
    }

    /**
     * View invoice
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function invoice($id = null, $userid = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('transaction', $transaction);
        $this->set('_serialize', ['transaction']);
		
		 $this->loadModel('Usermgmt.UserEmailSignatures');	 		 
		 $signature = $this->UserEmailSignatures->getEmailSignatureById('3');		 
		 $address = $this->UserEmailSignatures->getEmailSignatureById('4');		 
		 $paypal = $this->UserEmailSignatures->getEmailSignatureById('5');		 
		
		 $this->set(compact('signature','address','paypal'));
		
		 $this->loadModel('Usermgmt.Users');	 		 
		 $user = $this->Users->getUserById($userid, [
		 		'contain' =>['UserDetails']]);
		
		 $this->set(compact('user'));
    }

    /**
     * View process
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function process($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('transaction', $transaction);
        $this->set('_serialize', ['transaction']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->data);
            if ($this->Transactions->save($transaction)) {				
				
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'users'));
        $this->set('_serialize', ['transaction']);
    }



public function confirmation($userid=null,$id=null,$type=null,$sign=null) {
		 	
		 $this->loadModel('Usermgmt.Users');
		 $userEntity = $this->Users->getUserById($userid);
    //     $users = $this->Users->find('all', array('conditions'=>array('Users.ncace_status'=>$type))); 
	//	 $transaction = $this->Transactions->get($id, [
   //         'contain' => ['Users']
  //      ]);
		 $transaction = $this->Transactions->get($id);
		 
		 
		 
		 $this->loadModel('Usermgmt.UserEmailTemplates');
		 $template = $this->UserEmailTemplates->getEmailTemplateById($type);
		 
		 $header = $userEntity['first_name'];
		 
		 $this->loadModel('Usermgmt.UserEmailSignatures');	 		 
		 $signature = $this->UserEmailSignatures->getEmailSignatureById($sign);		 
		 
		 $message = '';
		 $message .= "<p>".$header.",</p>";
		 $message .= "<p>".$template['header']."</p>";
		 $message .= "<strong>Transaction:       </strong>".$transaction['name']."<br/>";
		 $message .= "<strong>Amount:       </strong>".$transaction['amount']."<br/>";
		 $message .= "<strong>Information:       </strong>".$transaction['credit_info']."<br/>";
		 $message .= "<strong>Description:       </strong>".$transaction['description']."<br/>";
		 $message .= "<strong>Posted on:       </strong>".$transaction['created']."<br/>";
		 $message .= "<strong>Posted by:       </strong>".$transaction['created_by']."<br/>";
		 $message .= $template['footer'];
		 $message .= "<p>".$signature['signature']."</p>";
      		 
		 $email = new Email('default');
		 $email
		 		->template('default')
		 		->emailFormat('html')
		 		->from('eddie@lovettcreations.org', 'Eddie')
		 		->to($userEntity['email'])
				->subject($template['template_name'])
				->send($message);
				
		 if ($userEntity['email']) {
				
			$this->Flash->success(__('A confirmation e-mail has been sent'));
			
		 } else {
		 	$this->Flash->error(__('The confirmation e-mail has not been sent'));
		 }
	 
                return $this->redirect(['action' => 'transactions', $userid,'#'=>'tabs-2']);
		 
   }


    /**
     * Correct method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function correct($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->data);
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'users'));
        $this->set('_serialize', ['transaction']);
    }












    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->data);
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'users'));
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

                return $this->redirect($this->referer());
    }
}
