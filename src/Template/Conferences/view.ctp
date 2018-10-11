<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conference'), ['action' => 'edit', $conference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conference'), ['action' => 'delete', $conference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conferences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conference'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conferences view large-9 medium-8 columns content">
    <h3><?= h($conference->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($conference->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Member Text') ?></th>
            <td><?= h($conference->member_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renewed Text') ?></th>
            <td><?= h($conference->renewed_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Time') ?></th>
            <td><?= h($conference->first_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Text') ?></th>
            <td><?= h($conference->first_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration Text') ?></th>
            <td><?= h($conference->registration_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lunch Text') ?></th>
            <td><?= h($conference->lunch_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $conference->has('user') ? $this->Html->link($conference->user->id, ['controller' => 'Users', 'action' => 'view', $conference->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conference->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $this->Number->format($conference->visible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($conference->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($conference->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Header Text') ?></h4>
        <?= $this->Text->autoParagraph(h($conference->header_text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Footer Text') ?></h4>
        <?= $this->Text->autoParagraph(h($conference->footer_text)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fees') ?></h4>
        <?php if (!empty($conference->fees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Conference Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Visible') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($conference->fees as $fees): ?>
            <tr>
                <td><?= h($fees->id) ?></td>
                <td><?= h($fees->user_id) ?></td>
                <td><?= h($fees->conference_id) ?></td>
                <td><?= h($fees->name) ?></td>
                <td><?= h($fees->description) ?></td>
                <td><?= h($fees->amount) ?></td>
                <td><?= h($fees->type) ?></td>
                <td><?= h($fees->visible) ?></td>
                <td><?= h($fees->created) ?></td>
                <td><?= h($fees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fees', 'action' => 'view', $fees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fees', 'action' => 'edit', $fees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fees', 'action' => 'delete', $fees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Registrations') ?></h4>
        <?php if (!empty($conference->registrations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Conference Id') ?></th>
                <th scope="col"><?= __('Member Status') ?></th>
                <th scope="col"><?= __('Renewed Membership') ?></th>
                <th scope="col"><?= __('First Time') ?></th>
                <th scope="col"><?= __('Registration Type') ?></th>
                <th scope="col"><?= __('Lunch Plans') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Footer Text') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($conference->registrations as $registrations): ?>
            <tr>
                <td><?= h($registrations->id) ?></td>
                <td><?= h($registrations->conference_id) ?></td>
                <td><?= h($registrations->member_status) ?></td>
                <td><?= h($registrations->renewed_membership) ?></td>
                <td><?= h($registrations->first_time) ?></td>
                <td><?= h($registrations->registration_type) ?></td>
                <td><?= h($registrations->lunch_plans) ?></td>
                <td><?= h($registrations->user_id) ?></td>
                <td><?= h($registrations->created) ?></td>
                <td><?= h($registrations->modified) ?></td>
                <td><?= h($registrations->footer_text) ?></td>
                <td><?= h($registrations->processed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Registrations', 'action' => 'view', $registrations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Registrations', 'action' => 'edit', $registrations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Registrations', 'action' => 'delete', $registrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registrations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
