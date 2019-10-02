<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="usrs index panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Sponsors') ?>
            <?= $this->element('sponsorsmenu'); ?>

        </span>
    </div>
    <div class="panel-body">

        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('organization') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usrs as $usr) : ?>
                <tr>
                    <td><?= h($usr->first_name) ?></td>
                    <td><?= h($usr->last_name) ?></td>
                    <td><?= h($usr->organization) ?></td>
                    <td><?= h($usr->phone) ?></td>
                    <td><?= h($usr->email) ?></td>
                    <td><?= h($usr->created) ?></td>
                    <td><?= h($usr->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usr->id], ['class' => 'btn btn-primary btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usr->id], ['class' => 'btn btn-primary btn-xs', 'confirm' => __('Are you sure you want to delete sponsor?', $usr->id)]) ?>
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
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    </div>
</div>