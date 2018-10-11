<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fee'), ['action' => 'edit', $fee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fee'), ['action' => 'delete', $fee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fees view large-9 medium-8 columns content">
    <h3><?= h($fee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $fee->has('user') ? $this->Html->link($fee->user->id, ['controller' => 'Users', 'action' => 'view', $fee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conference') ?></th>
            <td><?= $fee->has('conference') ? $this->Html->link($fee->conference->name, ['controller' => 'Conferences', 'action' => 'view', $fee->conference->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($fee->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($fee->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $this->Number->format($fee->visible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fee->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($fee->description)); ?>
    </div>
</div>
