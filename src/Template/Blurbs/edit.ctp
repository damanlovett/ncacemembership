<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Edit blurb') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Blurb List'), ['action' => 'index'], ['class'=>'btn btn-primary']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <div class="form-group">
    <?= $this->Form->create($blurb, ['class'=>'form-horizontal']) ?>
    
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Name'); ?></label>
            <div class="col-sm-6">
            <?php echo $this->Form->input('name', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Title'); ?></label>
            <div class="col-sm-8">
            <?php echo $this->Form->input('title', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Body'); ?></label>
           <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('body', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
             </div>    
            </div>
    
        <div class="um-button-row">
            <?php echo $this->Form->Submit(__('Update Blurb'), ['class'=>'btn btn-primary']); ?>
        </div>
    <?= $this->Form->end() ?>
    
    
</div>
</div>
