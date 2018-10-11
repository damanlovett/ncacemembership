<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Create Announcement') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Announcements List'), ['action' => 'index'], ['class'=>'btn btn-primary']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <div class="form-group">
    	
    	
    	<?= $this->Form->create($announcement, ['class'=>'form-horizontal']) ?>
         	
    	    <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Title'); ?></label>
            <div class="col-sm-6">
        		<?= $this->Form->input('title', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
        	</div>
        	</div>
        	
    	    <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Body'); ?></label>
            <div class="col-sm-6">			
        <?= $this->Ckeditor->textarea('body', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px; width:200px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
        	</div>
        	</div>

        <?= $this->Form->hidden('user_id', ['options' => $users]);?>
	  
	  
    	    <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Visible'); ?></label>
        <?= $this->Form->input('visible', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
        	</div>
			
			
			
    	    <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Placement'); ?></label>
            <div class="col-sm-2">
        <?= $this->Form->input('placement',['label'=>false, 'div'=>false, 'class'=> 'form-control', 'Empty' => '--', 'options' => $this->Switches->option('10')]);?>
        	</div>
        	</div>
			
			
			
			
    	    <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Archive'); ?></label>
        <?= $this->Form->input('archive', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
        	</div>
            


    <?= $this->Form->button(__('Edit')) ?>
    <?= $this->Form->end() ?>
    
    
</div>
</div>
