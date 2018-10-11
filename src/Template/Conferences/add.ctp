<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Conferences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conferences form large-9 medium-8 columns content">
    <?= $this->Form->create($conference) ?>
    <fieldset>
        <legend><?= __('Add Conference') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('header_text');
            echo $this->Form->input('member_text');
            echo $this->Form->input('renewed_text');
            echo $this->Form->input('first_time');
            echo $this->Form->input('first_text');
            echo $this->Form->input('registration_text');
            echo $this->Form->input('lunch_text');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('footer_text');
            echo $this->Form->input('visible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
