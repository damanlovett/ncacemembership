<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vote'), ['action' => 'edit', $vote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vote'), ['action' => 'delete', $vote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Votes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vote'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nominations'), ['controller' => 'Nominations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nomination'), ['controller' => 'Nominations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="votes view large-9 medium-8 columns content">
    <h3><?= h($vote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vote->has('user') ? $this->Html->link($vote->user->id, ['controller' => 'Users', 'action' => 'view', $vote->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nomination') ?></th>
            <td><?= $vote->has('nomination') ? $this->Html->link($vote->nomination->id, ['controller' => 'Nominations', 'action' => 'view', $vote->nomination->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vote') ?></th>
            <td><?= $this->Number->format($vote->vote) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vote->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vote->modified) ?></td>
        </tr>
    </table>
</div>
