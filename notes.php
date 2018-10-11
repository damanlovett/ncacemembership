

C:\xampp\htdocs\ncace>composer require friendsofcake/cakephp-csvview:2.0

public function edit_fee($id=null,$type=null,$message=null) {

         $fees = $this->Fee->find('all', array('conditions'=>array('Fee.type'=>$type))); 

         foreach($fees as $nr => $fee) { 
            
           $fees[$nr]['Fee']['visible'] = $id; 
            
         } 

         if($this->Fee->saveAll($fees)) { 
		   $this->Session->setFlash($message);
         $this->redirect($this->referer());
            } else {
		   $this->Session->setFlash(__('Editing was not changed'));
         $this->redirect($this->referer());
            }
   }