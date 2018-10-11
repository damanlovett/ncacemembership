<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registrations form large-9 medium-8 columns content">
    <?= $this->Form->create($registration) ?>
    <fieldset>
        <legend><?= __('Add Registration') ?></legend>
        <?php
            echo $this->Form->input('conference_id', ['options' => $conferences]);
            echo $this->Form->input('member_status');
            echo $this->Form->input('renewed_membership');
            echo $this->Form->input('first_time');
            echo $this->Form->input('registration_type');
            echo $this->Form->input('lunch_plans');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('footer_text');
            echo $this->Form->input('processed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
