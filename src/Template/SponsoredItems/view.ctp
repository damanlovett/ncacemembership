<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sponsored Item'), ['action' => 'edit', $sponsoredItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sponsored Item'), ['action' => 'delete', $sponsoredItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sponsored Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsored Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsorships'), ['controller' => 'Sponsorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsorship'), ['controller' => 'Sponsorships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sponsoredItems view large-9 medium-8 columns content">
    <h3><?= h($sponsoredItem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sponsoredItem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsorship') ?></th>
            <td><?= $sponsoredItem->has('sponsorship') ? $this->Html->link($sponsoredItem->sponsorship->name, ['controller' => 'Sponsorships', 'action' => 'view', $sponsoredItem->sponsorship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sponsoredItem->has('user') ? $this->Html->link($sponsoredItem->user->id, ['controller' => 'Users', 'action' => 'view', $sponsoredItem->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sponsoredItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($sponsoredItem->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsored Level Id') ?></th>
            <td><?= $this->Number->format($sponsoredItem->sponsored_level_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sponsoredItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sponsoredItem->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sponsoredItem->description)); ?>
    </div>
</div>
