<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Create Award') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('List Awards'), ['action' => 'index'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('Back', true), ['action'=>'index'], ['class'=>'btn btn-default']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <?= $this->Form->create($award, ['class'=>'form-horizontal']) ?>
    <div class="form-group">

        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Username'); ?></label>
            <div class="col-sm-3">
            <?= $this->Form->input('user_id', ['label'=>false, 'div'=>false,'class' => 'form-control', 'options' => $users]); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Award Year'); ?></label>
            <div class="col-sm-2">

            <?= $this->Form->input('award_year', ['label'=>false, 'div'=>false,'class' => 'form-control', 'type' => 'text']); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Award'); ?></label>
            <div class="col-sm-3">

            <?= $this->Form->select('title', $options, ['empty' => 'Select Award', 'label'=>false, 'div'=>false,'class' => 'form-control']); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Award Description'); ?></label>
            <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('description', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Submission Instructions / Requirements'); ?></label>
            <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('instructions', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Deadline'); ?></label>
            <div class="col-sm-3">

            <?= $this->Form->input('deadline', ['label'=>false, 'div'=>false,'type' => 'text', 'class' => 'form-control datepicker']); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Contact For Questions'); ?></label>
            <div class="col-sm-3">

            <?= $this->Form->input('contact', ['label'=>false, 'div'=>false,'class' => 'form-control']); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Contact Email'); ?></label>
            <div class="col-sm-3">

            <?= $this->Form->input('contact_email', ['label'=>false, 'div'=>false,'class' => 'form-control']); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Make Award Live'); ?></label>
            <div class="col-sm-3">
            <?= $this->Form->input('visible', ['label'=>false, 'div'=>false,'default' => '0', 'type' => 'checkbox']); ?>
             </div>
        </div>

    </div>
        <div class="um-button-row">
            <?php echo $this->Form->Submit(__('Create Award'), ['class'=>'btn btn-primary']); ?>
        </div>
    <?= $this->Form->end() ?>
</div>
</div>
