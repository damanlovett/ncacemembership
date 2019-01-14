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
            <?= $this->Html->link(__('New Sponsored Item'), ['action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsorships'), ['controller' => 'Sponsorships', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsorship'), ['controller' => 'Sponsorships', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsored Levels'), ['controller' => 'sponsored-levels', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsored Level'), ['controller' => 'sponsored-levels', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Sponsored Items') ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">

        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <?= $this->Paginator->sort('id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('name') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('amount') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('sponsorship_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('sponsored_level_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('user_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('created') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('modified') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $total_package = 0; ?>
                <?php foreach ($sponsoredItems as $sponsoredItem) : ?>
                <?php $total_package = $total_package + $sponsoredItem->amount; ?>
                <tr>
                    <td>
                        <?= $this->Number->format($sponsoredItem->id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItem->name) ?>
                    </td>
                    <td>
                        <?= $this->Number->format($sponsoredItem->amount) ?>
                    </td>
                    <td>
                        <?= $sponsoredItem->has('sponsorship') ? $this->Html->link($sponsoredItem->sponsorship->name, ['controller' => 'Sponsorships', 'action' => 'view', $sponsoredItem->sponsorship->id]) : '' ?>
                    </td>
                    <td>
                        <?= $this->Number->format($sponsoredItem->sponsored_level_id) ?>
                    </td>
                    <td>
                        <?= $sponsoredItem->has('user') ? $this->Html->link($sponsoredItem->user->id, ['controller' => 'Users', 'action' => 'view', $sponsoredItem->user->id]) : '' ?>
                    </td>
                    <td>
                        <?= h($sponsoredItem->created) ?>
                    </td>
                    <td>
                        <?= h($sponsoredItem->modified) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sponsoredItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponsoredItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsoredItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $total_package; ?>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p>
                <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    </div>
</div>