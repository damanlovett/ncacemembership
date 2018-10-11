<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DocumentsTable extends Table {

	public function initialize(array $config) {
		$this->addBehavior('Timestamp');
		$this->primaryKey('id');
		$this->belongsTo('Dropdowns');
	}
	public function validationForAdd($validator) {
		$validator
			->notEmpty('dropdown_id', __('Please select category'))
			->notEmpty('doc_type', __('Please enter document type'))
			->notEmpty('name', __('Please enter document name'))
			->allowEmpty('document_file')
			->add('document_file', [
				'mustMatch'=>[
					'rule'=>'checkForAttachments',
					'provider'=>'table',
					'message'=>__('Please upload file')
				]
			]);
		return $validator;
	}
	/**
	 * Used to validate attachments
	 *
	 * @access public
	 * @return boolean
	 */
	public function checkForAttachments($value, $context) {
		if(empty($context['data']['existing_document_files'][0]) && !empty($context['data']['attachment_no'])) {
			$attachment_no = $context['data']['attachment_no'];
			$attachments = $this->getAttachments($attachment_no);
			if(empty($attachments['attachedFilesTmp'])) {
				return false;
			}
		}
		return true;
	}
	public function getAttachments($attachment_no) {
		$return = $attachedFilesTmp = $attachedFilesDB = array();
		if(!empty($attachment_no)) {
			$fullpath = WWW_ROOT."temp".DS.$attachment_no.DS;
			$attachedFiles = glob($fullpath."*.*");
			if(is_array($attachedFiles) && !empty($attachedFiles)) {
				foreach($attachedFiles as $p=>$attachedFile) {
					$filemtime = filemtime($attachedFile).$p;
					$attachedFilesTmp[$filemtime] = $attachedFile;
				}
				ksort($attachedFilesTmp);
				foreach($attachedFilesTmp as $attachedFile) {
					$path_parts = pathinfo($attachedFile);
					$attachedFilesDB[] = $path_parts['basename'];
				}
			}
		}
		$return['attachedFilesTmp'] = $attachedFilesTmp;
		$return['attachedFilesDB'] = $attachedFilesDB;
		return $return;
	}
}