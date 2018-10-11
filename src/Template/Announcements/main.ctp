<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Main Announcement') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Return'), ['action' => 'index'], ['class'=>'btn btn-primary']); ?>
        <?= $this->Html->link(__('Create Announcement'), ['action' => 'add'], ['class'=>'btn btn-primary']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    	
    	
    <?= $this->Form->create($announcement, ['class' => 'form-horizontal']) ?>
        
        
     		<div class="form-group form-group-sm" style="margin-top: 20px">
			<label for="body" class='col-sm-1  control-label'>&nbsp;</label>
         
               
            <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('body', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px; width:200px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
            </div>

               
			</div>
		
               
        
  	
            <?= $this->Form->hidden('user_id', ['options' => $users]); ?>
			
            <?= $this->Form->hidden('visible'); ?>
			
            <?= $this->Form->hidden('placement',['Empty' => '--', 'options' => $this->Switches->option('10')]); ?>
        
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
