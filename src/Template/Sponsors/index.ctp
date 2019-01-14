<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sponsor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsored Items'), ['controller' => 'SponsoredItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsored Item'), ['controller' => 'SponsoredItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsorships'), ['controller' => 'Sponsorships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsorship'), ['controller' => 'Sponsorships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sponsors index large-9 medium-8 columns content">
    <h3><?= __('Sponsors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsored_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsorships_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sponsors as $sponsor): ?>
            <tr>
                <td><?= $this->Number->format($sponsor->id) ?></td>
                <td><?= $sponsor->has('user') ? $this->Html->link($sponsor->user->id, ['controller' => 'Users', 'action' => 'view', $sponsor->user->id]) : '' ?></td>
                <td><?= $sponsor->has('sponsored_item') ? $this->Html->link($sponsor->sponsored_item->name, ['controller' => 'SponsoredItems', 'action' => 'view', $sponsor->sponsored_item->id]) : '' ?></td>
                <td><?= $sponsor->has('sponsorship') ? $this->Html->link($sponsor->sponsorship->name, ['controller' => 'Sponsorships', 'action' => 'view', $sponsor->sponsorship->id]) : '' ?></td>
                <td><?= $this->Number->format($sponsor->processed) ?></td>
                <td><?= h($sponsor->created) ?></td>
                <td><?= h($sponsor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sponsor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponsor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
