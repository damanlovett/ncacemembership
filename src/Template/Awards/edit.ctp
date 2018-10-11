<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $award->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $award->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Awards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="awards form large-9 medium-8 columns content">
    <?= $this->Form->create($award) ?>
    <fieldset>
        <legend><?= __('Edit Award') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('award_year');
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('instructions');
            echo $this->Form->input('deadline');
            echo $this->Form->input('contact');
            echo $this->Form->input('contact_email');
            echo $this->Form->input('visible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
