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
            <?= __('Sponsorships') ?>
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
                        <?= $this->Paginator->sort('conference_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('user_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('visible') ?>
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
                <?php foreach ($sponsorships as $sponsorship) : ?>
                <tr>
                    <td>
                        <?= $this->Number->format($sponsorship->id) ?>
                    </td>
                    <td>
                        <?= h($sponsorship->name) ?>
                    </td>
                    <td>
                        <?= $sponsorship->has('conference') ? $this->Html->link($sponsorship->conference->name, ['controller' => 'Conferences', 'action' => 'view', $sponsorship->conference->id]) : '' ?>
                    </td>
                    <td>
                        <?= $sponsorship->has('user') ? $this->Html->link($sponsorship->user->id, ['controller' => 'Users', 'action' => 'view', $sponsorship->user->id]) : '' ?>
                    </td>
                    <td>
                        <?= h($sponsorship->visible) ?>
                    </td>
                    <td>
                        <?= h($sponsorship->created) ?>
                    </td>
                    <td>
                        <?= h($sponsorship->modified) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sponsorship->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponsorship->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsorship->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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