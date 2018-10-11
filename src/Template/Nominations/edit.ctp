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
                ['action' => 'delete', $nomination->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nomination->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nominations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Awards'), ['controller' => 'Awards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Award'), ['controller' => 'Awards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nominations form large-9 medium-8 columns content">
    <?= $this->Form->create($nomination) ?>
    <fieldset>
        <legend><?= __('Edit Nomination') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('award_id', ['options' => $awards]);
            echo $this->Form->input('organization_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('nominee_phone');
            echo $this->Form->input('nomination');
            echo $this->Form->input('contact');
            echo $this->Form->input('contact_phone');
            echo $this->Form->input('contact_email');
            echo $this->Form->input('visible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
