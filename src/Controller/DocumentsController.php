<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
//ALTER TABLE `documents` CHANGE `data` `doc_file` VARCHAR(100) NULL;
//ALTER TABLE `documents` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
//ALTER TABLE `documents` ADD `dropdown_id` INT(11) NULL AFTER `id`;
class DocumentsController extends AppController {
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
			'Documents'=>[
				'Documents'=>[
					'type'=>'text',
					'label'=>'Search',
					'tagline'=>'Search by document name, type',
					'condition'=>'multiple',
					'searchFields'=>['Documents.signature_name', 'Documents.signature'],
					'inputOptions'=>['style'=>'width:300px;']
				],
				'Documents.dropdown_id'=>[
					'type'=>'select',
					'label'=>'Category',
					'model'=>'Dropdowns',
					'selector'=>'getDocumentCategories'
				]
			]
		],
		'mydocuments'=>[
			'Documents'=>[
				'Documents'=>[
					'type'=>'text',
					'label'=>'Search',
					'tagline'=>'Search by document name, type',
					'condition'=>'multiple',
					'searchFields'=>['Documents.signature_name', 'Documents.signature'],
					'inputOptions'=>['style'=>'width:300px;']
				],
				'Documents.dropdown_id'=>[
					'type'=>'select',
					'label'=>'Category',
					'model'=>'Dropdowns',
					'selector'=>'getDocumentCategories'
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
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->loadModel('Documents');
		if(isset($this->Security) && $this->request->is('ajax')) {
			$this->Security->config('unlockedActions', [$this->request['action']]);
			$this->getEventManager()->off($this->Csrf);
		}
	}
	public function index() {
		$this->paginate = ['limit'=>10, 'contain'=>['Dropdowns'], 'order'=>['Documents.id'=>'DESC']];
		$this->Search->applySearch();
		$documents = $this->paginate($this->Documents)->toArray();
		$this->set(compact('documents'));
		if($this->request->is('ajax')) {
			$this->viewBuilder()->layout('ajax');
			$this->render('/Documents/all_documents');
		}
	}
	public function mydocuments() {
		$cond = [];
		$cond['Documents.user_id'] = $this->UserAuth->getUserId();
		$this->paginate = ['limit'=>10, 'conditions'=>$cond, 'contain'=>['Dropdowns'], 'order'=>['Documents.id'=>'DESC']];
		$this->Search->applySearch($cond);
		$documents = $this->paginate($this->Documents)->toArray();
		$this->set(compact('documents'));
		if($this->request->is('ajax')) {
			$this->viewBuilder()->layout('ajax');
			$this->render('/Documents/all_mydocuments');
		}
	}
	/**
	 * It is used to add document
	 *
	 * @access public
	 * @return void
	 */
	public function add() {
		$userId = $this->UserAuth->getUserId();
		$documentEntity = $this->Documents->newEntity($this->request->data, ['validate'=>'forAdd']);
		if($this->request->is('post')) {
			$errors = $documentEntity->errors();
			if($this->request->is('ajax')) {
				if(empty($errors)) {
					$response = ['error'=>0, 'message'=>'success'];
				} else {
					$response = ['error'=>1, 'message'=>'failure'];
					$response['data']['Documents'] = $errors;
				}
				echo json_encode($response);exit;
			} else {
				if(empty($errors)) {
					$targetPath = WWW_ROOT."library".DS.'documents'.DS.$userId;
					if(!is_dir($targetPath)) {
						mkdir($targetPath, 0777, true);
					}
					$attachedFilesTmp = $dbAttachments = array();
					
					if(!empty($this->request->data['Documents']['attachment_no'])) {
						$attachment_no = $this->request->data['Documents']['attachment_no'];
						$attachments = $this->getAttachments($attachment_no);
						if(!empty($attachments['attachedFilesDB'])) {
							$dbAttachments = $attachments['attachedFilesDB'];
							$attachedFilesTmp = $attachments['attachedFilesTmp'];
						}
					}
					$doc_file = null;
					if(!empty($dbAttachments)) {
						$path_info = pathinfo($dbAttachments[0]);
						$doc_file = mt_rand().time().'.'.$path_info['extension'];
					}
					$documentEntity['doc_file'] = $doc_file;

					$documentEntity['user_id'] = $this->UserAuth->getUserId();
					$this->Documents->save($documentEntity, ['validate'=>false]);
					
					if(!empty($attachedFilesTmp)) {
						$rmdir = '';
						foreach($attachedFilesTmp as $attachedFile) {
							$path_parts = pathinfo($attachedFile);
							$rmdir = $path_parts['dirname'];
							rename($attachedFile, $targetPath.DS.$doc_file);
						}
						if($rmdir) {
							@rmdir($rmdir);
						}
					}
					
					$this->Flash->success(__('The document has been uploaded'));
					$this->redirect(['action'=>'mydocuments']);
				}
			}
		}
		$this->loadModel('Dropdowns');
		$categories = $this->Dropdowns->getDocumentCategories();
		$this->set(compact('documentEntity', 'categories'));
	}
	/**
	 * It is used to edit document
	 *
	 * @access public
	 * @param integer $documentId document id
	 * @return void
	 */
	public function edit($documentId=null) {
		$page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1;
		if($documentId) {
			$userId = $this->UserAuth->getUserId();
			$documentEntity = $this->Documents->find()->where(['Documents.id'=>$documentId, 'Documents.user_id'=>$userId])->first();
			if(!empty($documentEntity)) {
				$this->Documents->patchEntity($documentEntity, $this->request->data, ['validate'=>'forAdd']);
				if($this->request->is(['put', 'post'])) {
					$errors = $documentEntity->errors();
					if($this->request->is('ajax')) {
						if(empty($errors)) {
							$response = ['error'=>0, 'message'=>'success'];
						} else {
							$response = ['error'=>1, 'message'=>'failure'];
							$response['data']['Documents']  = $errors;
						}
						echo json_encode($response);exit;
					} else {
						if(empty($errors)) {
							$targetPath = WWW_ROOT."library".DS.'documents'.DS.$userId;
							if(!is_dir($targetPath)) {
								mkdir($targetPath, 0777, true);
							}
							$attachedFilesTmp = $dbAttachments = array();
							if(!empty($documentEntity['doc_file'])) {
								$dbAttachments = array($documentEntity['doc_file']);
							}
							if(!empty($documentEntity['existing_document_files'])) {
								foreach($dbAttachments as $k=>$attachment) {
									$found = false;
									foreach($documentEntity['existing_document_files'] as $existingAttachment) {
										if($existingAttachment == $attachment) {
											$found = true;
										}
									}
									if(!$found) {
										unset($dbAttachments[$k]);
										@unlink($targetPath.DS.$attachment);
									}
								}
								$dbAttachments = array_values($dbAttachments);
							}
							
							if(!empty($this->request->data['Documents']['attachment_no'])) {
								$attachment_no = $this->request->data['Documents']['attachment_no'];
								$attachments = $this->getAttachments($attachment_no);
								if(!empty($attachments['attachedFilesDB'])) {
									$dbAttachments = array_merge($dbAttachments, $attachments['attachedFilesDB']);
									$attachedFilesTmp = $attachments['attachedFilesTmp'];
								}
							}
							$doc_file = null;
							if(!empty($dbAttachments)) {
								$path_info = pathinfo($dbAttachments[0]);
								$doc_file = mt_rand().time().'.'.$path_info['extension'];
							}
							$documentEntity['doc_file'] = $doc_file;

							$this->Documents->save($documentEntity, ['validate'=>false]);

							if(!empty($attachedFilesTmp)) {
								$rmdir = '';
								foreach($attachedFilesTmp as $attachedFile) {
									$path_parts = pathinfo($attachedFile);
									$rmdir = $path_parts['dirname'];
									rename($attachedFile, $targetPath.DS.$doc_file);
								}
								if($rmdir) {
									@rmdir($rmdir);
								}
							}
					
							$this->Flash->success(__('The document has been updated successfully'));
							$this->redirect(['action'=>'mydocuments', 'page'=>$page]);
						}
					}
				}
				$this->loadModel('Dropdowns');
				$categories = $this->Dropdowns->getDocumentCategories();
				$this->set(compact('documentEntity', 'userId', 'categories'));
			} else {
				$this->Flash->error(__('Invalid document id'));
				$this->redirect(['action'=>'mydocuments', 'page'=>$page]);
			}
		} else {
			$this->Flash->error(__('Missing document id'));
			$this->redirect(['action'=>'mydocuments', 'page'=>$page]);
		}
	}
	/**
	 * It is used to delete document
	 *
	 * @access public
	 * @param integer $documentId document id
	 * @return void
	 */
	public function delete($documentId=null) {
		$page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1;
		if($documentId) {
			if($this->request->is('post')) {
				$userId = $this->UserAuth->getUserId();
				$documentEntity = $this->Documents->find()->where(['Documents.id'=>$documentId, 'Documents.user_id'=>$userId])->first();
				if(!empty($documentEntity)) {
					if($this->Documents->delete($documentEntity)) {
						$this->Flash->success(__('Selected document has been deleted successfully'));
					} else {
						$this->Flash->error(__('Unable to delete selected document, please try again'));
					}
				} else {
					$this->Flash->error(__('Invalid document id'));
				}
			}
		} else {
			$this->Flash->error(__('Missing document id'));
		}
		$this->redirect(['action'=>'mydocuments', 'page'=>$page]);
	}
	/**
	 * Used to upload attachment
	 *
	 * @access public
	 * @param integer $attachment_no attachment no
	 * @return void
	 */
	public function uploadAttachment($attachment_no=null) {
		if(($this->request->is('post') || $this->request->is('put')) && $this->request->is('ajax') && $attachment_no) {
			$uploadFileTypes = array();
			$fullpath = WWW_ROOT."temp".DS.$attachment_no.DS;
			if(!is_dir($fullpath)) {
				mkdir($fullpath, 0777, true);
			}
			$maxSize = 10485760; //means 10MB=10*1024*1024=10485760 Bytes
			$_FILES = array();
			$fileInput = 'attachment';

			if(isset($this->request->data['Documents']['document_file'])) {
				$_FILES[$fileInput] = $this->request->data['Documents']['document_file'];
				// change file tpye here action specific
				$uploadFileTypes = array("jpeg", "jpg", "gif", "png", "pdf");
				// change max size action specific
				$maxSize = 10485760;
			}
			$fileTypes = "/\.(".implode('|', $uploadFileTypes).")$/i";
			if(isset($_FILES[$fileInput])) {
				include_once(ROOT.DS.'vendor'.DS.'fileupload'.DS.'UploadHandler.php');
				$options = array(
							'upload_url'=>SITE_URL.'temp/'.$attachment_no.'/',
							'upload_dir'=>$fullpath,
							'accept_file_types'=>$fileTypes,
							'max_file_size'=>$maxSize,
							'image_versions'=>array(),
							'param_name'=>$fileInput
							);
				$upload_handler = new \UploadHandler($options);
				if($upload_handler->success) {

				}
			}
		}
		exit;
	}
	/**
	 * Used to delete uploaded attachment
	 *
	 * @access public
	 * @param integer $attachment_no attachment no
	 * @param string $filename filename
	 * @return void
	 */
	public function deleteAttachment($attachment_no=null, $filename=null) {
		$delete = 0;
		if($this->request->is('ajax') && $attachment_no && $filename) {
			$fullpath = WWW_ROOT."temp".DS.$attachment_no.DS;
			@unlink($fullpath.$filename);
			$delete = 1;
		}
		echo $delete;
		exit;
	}
}