<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit My File'), ['action' => 'edit', $myFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete My File'), ['action' => 'delete', $myFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List My Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New My File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="myFiles view large-9 medium-8 columns content">
    <h3><?= h($myFile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($myFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($myFile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $myFile->has('user') ? $this->Html->link($myFile->user->id, ['controller' => 'Users', 'action' => 'view', $myFile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($myFile->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($myFile->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($myFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($myFile->modified) ?></td>
        </tr>
    </table>
</div>
