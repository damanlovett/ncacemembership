***********************************************************
TOP OF PAGE
***********************************************************
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
    <div class="form-group">
***********************************************************
FORM INPUT
***********************************************************
        <div class="um-form-row form-group">
            <label class="col-sm-3 control-label"><?php echo __('Username'); ?></label>
            <div class="col-sm-3">
            <?= $this->Form->input('user_id', ['label'=>false, 'div'=>false,'class' => 'form-control', 'options' => $users]); ?>
             </div>
        </div>
***********************************************************
FORM TEXTAREA INPUT
***********************************************************
           <div class="col-sm-8">
            <?= $this->Ckeditor->textarea('description', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#bdc3c7'], 'standard');?>
             </div>
***********************************************************
FORM SUBMIT
***********************************************************
        <div class="um-button-row">
            <?php echo $this->Form->Submit(__('Create Award'), ['class'=>'btn btn-primary']); ?>
        </div>
    <?= $this->Form->end() ?>
***********************************************************
BUTTON GROUP
***********************************************************
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('New Award'), ['action' => 'add'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class'=>'btn btn-default']); ?>
</div>
***********************************************************
ACTION BUTTON GROUP
***********************************************************
        <div class='btn-group'>
        <button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>Actions<span class='caret'></span></button>
        <ul class='dropdown-menu'>

            <li><?= $this->Html->link(__('View'), ['action' => 'view', $award->id]);?> </li>
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $award->id]);?>  </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $award->id], ['confirm' => __('Are you sure you want to delete # {0}?', $award->id)]);?>  </li>
        </ul>
        </div>
***********************************************************
TABLE FORMAT
***********************************************************
    <table class="table table-striped table-bordered table-condensed table-hover">



