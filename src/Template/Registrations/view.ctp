<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Registration'), ['action' => 'edit', $registration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Registration'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registrations view large-9 medium-8 columns content">
    <h3><?= h($registration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Conference') ?></th>
            <td><?= $registration->has('conference') ? $this->Html->link($registration->conference->name, ['controller' => 'Conferences', 'action' => 'view', $registration->conference->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Member Status') ?></th>
            <td><?= h($registration->member_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renewed Membership') ?></th>
            <td><?= h($registration->renewed_membership) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Time') ?></th>
            <td><?= h($registration->first_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration Type') ?></th>
            <td><?= h($registration->registration_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lunch Plans') ?></th>
            <td><?= h($registration->lunch_plans) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $registration->has('user') ? $this->Html->link($registration->user->id, ['controller' => 'Users', 'action' => 'view', $registration->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($registration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $this->Number->format($registration->processed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($registration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($registration->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Footer Text') ?></h4>
        <?= $this->Text->autoParagraph(h($registration->footer_text)); ?>
    </div>
</div>
