<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sponsor'), ['action' => 'edit', $sponsor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sponsor'), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sponsors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsored Items'), ['controller' => 'SponsoredItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsored Item'), ['controller' => 'SponsoredItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsorships'), ['controller' => 'Sponsorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsorship'), ['controller' => 'Sponsorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sponsors view large-9 medium-8 columns content">
    <h3><?= h($sponsor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sponsor->has('user') ? $this->Html->link($sponsor->user->id, ['controller' => 'Users', 'action' => 'view', $sponsor->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsored Item') ?></th>
            <td><?= $sponsor->has('sponsored_item') ? $this->Html->link($sponsor->sponsored_item->name, ['controller' => 'SponsoredItems', 'action' => 'view', $sponsor->sponsored_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsorship') ?></th>
            <td><?= $sponsor->has('sponsorship') ? $this->Html->link($sponsor->sponsorship->name, ['controller' => 'Sponsorships', 'action' => 'view', $sponsor->sponsorship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sponsor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $this->Number->format($sponsor->processed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sponsor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sponsor->modified) ?></td>
        </tr>
    </table>
</div>
