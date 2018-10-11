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
        <?= $this->Html->link(__('Announcements List'), ['action' => 'index'], ['class'=>'btn btn-default']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <div class="form-group">
    <?= $this->Form->create($announcement, ['class'=>'form-horizontal']) ?>

        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Title'); ?></label>
            <div class="col-sm-6">
            <?php echo $this->Form->input('title', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Announcement'); ?></label>
           <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('body', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
             </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Username'); ?></label>
            <div class="col-sm-3">
            <?php echo $this->Form->input('user_id', ['options' => $users]); ?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Publish?'); ?></label>
            <div class="col-sm-3">
            <?php echo $this->Form->input('visible', ['type' => 'checkbox', 'label'=>false, 'div'=>false]);?>
             </div>
        </div>

        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Order'); ?></label>
            <div class="col-sm-1">
            <?php echo $this->Form->input('placement', ['Empty' => '--', 'options' => $this->Switches->option('10'), 'label'=>false, 'div'=>false]);?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Archive?'); ?></label>
            <div class="col-sm-3">
            <?php echo $this->Form->input('archive', ['type' => 'checkbox', 'label'=>false, 'div'=>false]);?>
             </div>
        </div>
        </div>

        <div class="um-button-row">
            <?php echo $this->Form->Submit(__('Create Award'), ['class'=>'btn btn-primary']); ?>
        </div>
    <?= $this->Form->end() ?>
</div>
</div>
