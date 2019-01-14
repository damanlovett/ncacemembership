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
            <?= $this->Html->link(__('New Sponsored Level'), ['action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Sponsored Levels') ?>
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
                        <?= $this->Paginator->sort('placement') ?>
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
                <?php foreach ($sponsoredLevels as $sponsoredLevel) : ?>
                <tr>
                    <td>
                        <?= $this->Number->format($sponsoredLevel->id) ?>
                    </td>
                    <td>
                        <?= h($sponsoredLevel->name) ?>
                    </td>
                    <td>
                        <?= $this->Number->format($sponsoredLevel->placement) ?>
                    </td>
                    <td>
                        <?= h($sponsoredLevel->created) ?>
                    </td>
                    <td>
                        <?= h($sponsoredLevel->modified) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sponsoredLevel->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponsoredLevel->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsoredLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredLevel->id)]) ?>
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