<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nominations'), ['controller' => 'Nominations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nomination'), ['controller' => 'Nominations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="votes form large-9 medium-8 columns content">
    <?= $this->Form->create($vote) ?>
    <fieldset>
        <legend><?= __('Add Vote') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('nomination_id', ['options' => $nominations]);
            echo $this->Form->input('vote');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
