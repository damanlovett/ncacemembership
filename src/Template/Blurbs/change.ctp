<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Update Current Membership Year') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Cancel Update'), ['controller'=>'memberships','action' => 'index'], ['class'=>'btn btn-primary']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <div class="form-group">
    <?= $this->Form->create($blurb, ['class'=>'form-horizontal']) ?>
    
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Name'); ?></label>
            <div class="col-sm-6">
            <?php echo $this->Form->input('name', ['label'=>false, 'div'=>false,'class' => 'form-control','disabled'=>true]);?>
             </div>
        </div>
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Current Membership Year'); ?></label>
            <div class="col-sm-8">
            <?php echo $this->Form->input('title', ['label'=>false, 'div'=>false,'class' => 'form-control']);?>
             </div>
        </div>
    
        <div class="um-button-row">
            <?php echo $this->Form->Submit(__('Update Current Year'), ['class'=>'btn btn-primary']); ?>
        </div>
    <?= $this->Form->end() ?>
    
    
</div>
</div>
