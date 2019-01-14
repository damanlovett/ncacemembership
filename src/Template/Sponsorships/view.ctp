<?php

/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= __('Actions') ?>
        </li>
        <li>
            <?= $this->Html->link(__('Edit Sponsorship'), ['action' => 'edit', $sponsorship->id]) ?>
        </li>
        <li>
            <?= $this->Form->postLink(__('Delete Sponsorship'), ['action' => 'delete', $sponsorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsorship->id)]) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsorships'), ['action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsorship'), ['action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Conference'), ['controller' => 'Conferences', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsored Items'), ['controller' => 'SponsoredItems', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsored Item'), ['controller' => 'SponsoredItems', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= h($sponsorship->name) ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <table class="vertical-table  table-striped table-bordered table-condensed table-hover">
            <tr>
                <th scope="row">
                    <?= __('Name') ?>
                </th>
                <td>
                    <?= h($sponsorship->name) ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('Conference') ?>
                </th>
                <td>
                    <?= $sponsorship->has('conference') ? $this->Html->link($sponsorship->conference->name, ['controller' => 'Conferences', 'action' => 'view', $sponsorship->conference->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('User') ?>
                </th>
                <td>
                    <?= $sponsorship->has('user') ? $this->Html->link($sponsorship->user->id, ['controller' => 'Users', 'action' => 'view', $sponsorship->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('Id') ?>
                </th>
                <td>
                    <?= $this->Number->format($sponsorship->id) ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('Created') ?>
                </th>
                <td>
                    <?= h($sponsorship->created) ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('Modified') ?>
                </th>
                <td>
                    <?= h($sponsorship->modified) ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?= __('Visible') ?>
                </th>
                <td>
                    <?= $sponsorship->visible ? __('Yes') : __('No'); ?>
                </td>
            </tr>
        </table>
        <div class="row">
            <h4>
                <?= __('Description') ?>
            </h4>
            <?= $this->Text->autoParagraph(h($sponsorship->description)); ?>
        </div>
        <div class="related">
            <h4>
                <?= __('Related Levels') ?>
            </h4>
            <?php if (!empty($sponsorship->levels)) : ?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                    <th scope="col">
                        <?= __('Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('Name') ?>
                    </th>
                    <th scope="col">
                        <?= __('Description') ?>
                    </th>
                    <th scope="col">
                        <?= __('Sponsorship Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('User Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('Created') ?>
                    </th>
                    <th scope="col">
                        <?= __('Modified') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
                <?php foreach ($sponsorship->levels as $levels) : ?>
                <tr>
                    <td>
                        <?= h($levels->id) ?>
                    </td>
                    <td>
                        <?= h($levels->name) ?>
                    </td>
                    <td>
                        <?= h($levels->description) ?>
                    </td>
                    <td>
                        <?= h($levels->sponsorship_id) ?>
                    </td>
                    <td>
                        <?= h($levels->user_id) ?>
                    </td>
                    <td>
                        <?= h($levels->created) ?>
                    </td>
                    <td>
                        <?= h($levels->modified) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Levels', 'action' => 'view', $levels->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Levels', 'action' => 'edit', $levels->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Levels', 'action' => 'delete', $levels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $levels->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4>
                <?= __('Related Sponsored Items') ?>
            </h4>
            <?php if (!empty($sponsorship->sponsored_items)) : ?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                    <th scope="col">
                        <?= __('Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('Name') ?>
                    </th>
                    <th scope="col">
                        <?= __('Amount') ?>
                    </th>
                    <th scope="col">
                        <?= __('Description') ?>
                    </th>
                    <th scope="col">
                        <?= __('Sponsorship Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('Level Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('User Id') ?>
                    </th>
                    <th scope="col">
                        <?= __('Created') ?>
                    </th>
                    <th scope="col">
                        <?= __('Modified') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
                <?php foreach ($sponsorship->sponsored_items as $sponsoredItems) : ?>
                <tr>
                    <td>
                        <?= h($sponsoredItems->id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->name) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->amount) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->description) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->sponsorship_id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->level_id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->user_id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->created) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItems->modified) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'SponsoredItems', 'action' => 'view', $sponsoredItems->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'SponsoredItems', 'action' => 'edit', $sponsoredItems->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'SponsoredItems', 'action' => 'delete', $sponsoredItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredItems->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>