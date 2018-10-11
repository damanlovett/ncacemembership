<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nominations'), ['controller' => 'Nominations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nomination'), ['controller' => 'Nominations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="votes index large-9 medium-8 columns content">
    <h3><?= __('Votes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomination_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vote') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votes as $vote): ?>
            <tr>
                <td><?= $this->Number->format($vote->id) ?></td>
                <td><?= $vote->has('user') ? $this->Html->link($vote->user->id, ['controller' => 'Users', 'action' => 'view', $vote->user->id]) : '' ?></td>
                <td><?= $vote->has('nomination') ? $this->Html->link($vote->nomination->id, ['controller' => 'Nominations', 'action' => 'view', $vote->nomination->id]) : '' ?></td>
                <td><?= $this->Number->format($vote->vote) ?></td>
                <td><?= h($vote->created) ?></td>
                <td><?= h($vote->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vote->id)]) ?>
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
