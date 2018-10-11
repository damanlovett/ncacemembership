<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Conferences Registrations') ?>
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
        <div class="alert alert-info" style="text-align: left;">
<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
        </div>

        <?php echo $this->element('registrationsearch');?>








    </div>
</div>
</div>
