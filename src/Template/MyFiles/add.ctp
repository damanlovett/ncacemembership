<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List My Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="myFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($myFile, ['type'=>'File']); ?>
    <fieldset>
        <legend><?= __('Add My File') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('type', ['type'=>'file']);
           // echo $this->Form->input('size');
        ?>
    </fieldset>
    <?= //$this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
