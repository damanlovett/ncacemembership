<?php
	echo $this->Html->script('/plugins/fileupload/vendor/jquery.ui.widget.js');
	echo $this->Html->script('/plugins/fileupload/jquery.iframe-transport.js');
	echo $this->Html->script('/plugins/fileupload/jquery.fileupload.js');
	echo $this->Html->script('document.js');
	echo $this->Html->css('document.css');
?>
<script type="text/javascript">
	$(function() {
		$.docupload.uploadurl = urlForJs+"Documents/uploadAttachment";
		$.docupload.deleteurl = urlForJs+"Documents/deleteAttachment";
		$.docupload.uploadFileTypes = ["jpeg", "jpg", "gif", "png", "pdf"];
		$.docupload.uploadMaxSize = "10485760";
		$.docupload.multiple = false;
		$.docupload._attachFileUpload();
	});
</script>
<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title">
			<?php echo __('Add Document'); ?>
		</span>
		<span class="panel-title-right">
			<?php echo $this->Html->link(__('Back', true), ['action'=>'index'], ['class'=>'btn btn-default']); ?>
		</span>
	</div>
	<div class="panel-body">
		<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'addDocumentForm', 'submitButtonId'=>'addDocumentSubmitBtn']); ?>
		<?php echo $this->Form->create($documentEntity, ['type'=>'file', 'id'=>'addDocumentForm', 'class'=>'form-horizontal']); ?>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Category'); ?></label>
			<div class="col-sm-4">
				<?php echo $this->Form->input('Documents.dropdown_id', ['type'=>'select', 'label'=>false, 'div'=>false, 'class'=>'form-control', 'options'=>$categories]); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Document Type'); ?></label>
			<div class="col-sm-4">
				<?php echo $this->Form->input('Documents.doc_type', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Document Name'); ?></label>
			<div class="col-sm-4">
				<?php echo $this->Form->input('Documents.name', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Document File'); ?></label>
			<div class="col-sm-4">
				<div class="attachment-section">
					<?php
						$attachment_no = (!empty($this->request->data['Documents']['attachment_no'])) ? $this->request->data['Documents']['attachment_no'] : time().mt_rand();
					?>
					<div class="attachBtnDiv" style="padding-top:0">
						<?php echo $this->Html->link('Attach a file', 'javascript:void(0)', array('escape'=>false, 'class'=>'btn btn-primary btn-xs attachment-link', 'style'=>'padding: 1px 5px;'));

						echo $this->Form->input('Documents.document_file', array('type'=>'file', 'label'=>false, 'div'=>false, 'style'=>'display:none', 'class'=>'attachment-file'));

						echo $this->Form->hidden('Documents.attachment_no', array('value'=>$attachment_no, 'class'=>'attachment_no'));?>
						<div class="attachment-name"></div>
						<div class="attachment-button"></div>
						<div class="fileAttachmentProgressHolder">
							<div class="fileAttachmentProgress"><span class="colorbar" style="width: 0%;"></span></div>
							<a href="#" class="cancelUpload"><?php echo $this->Html->image('blank.gif', array('class'=>'icon'));?></a>
						</div>
					</div>
					<div class="attachments-type">only jpeg, jpg, gif, png, pdf file types are supported. (Max 10 MB)</div>
					<div class="all-attachments">
						<?php
						$fullpath = WWW_ROOT."temp".DS.$attachment_no.DS;
						$attachedFiles = glob($fullpath."*.*");
						if(is_array($attachedFiles)) {
							$attachedFilesTmp = array();
							foreach($attachedFiles as $p=>$attachedFile) {
								$filemtime = filemtime($attachedFile).$p;
								$attachedFilesTmp[$filemtime] = $attachedFile;
							}
							ksort($attachedFilesTmp);
							foreach($attachedFilesTmp as $attachedFile) {
								$filesize = round((filesize($attachedFile) / 1024), 1);
								$path_parts = pathinfo($attachedFile);
								echo "<div class='atchFileDiv'>";
									echo "<span class='atchFileIcon'>".$this->Html->image('blank.gif', array('class'=>'icon'))."</span>";
									echo "<span class='atchFileName'><a href='".SITE_URL."temp/".$attachment_no."/".$path_parts['basename']."' target='_blank'>".$path_parts['basename']." (".$filesize." KB)</a></span>";
									echo "<span class='atchFileDel'><a filename='".$path_parts['basename']."' href='".SITE_URL."Documents/deleteAttachment/".$attachment_no."/".$path_parts['basename']."' class='delAttachment'>".$this->Html->image('blank.gif', array('class'=>'icon'))."</a></span>";
								echo "</div>";
							}
						}?>
					</div>
				</div>
			</div>
		</div>
		<div class="um-button-row">
			<?php echo $this->Form->Submit(__('Add Document'), ['div'=>false, 'class'=>'btn btn-primary', 'id'=>'addDocumentSubmitBtn']); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>