<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nomination'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Awards'), ['controller' => 'Awards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Award'), ['controller' => 'Awards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nominations index large-9 medium-8 columns content">
    <h3><?= __('Nominations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('award_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organization_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nominee_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nominations as $nomination): ?>
            <tr>
                <td><?= $this->Number->format($nomination->id) ?></td>
                <td><?= $nomination->has('user') ? $this->Html->link($nomination->user->id, ['controller' => 'Users', 'action' => 'view', $nomination->user->id]) : '' ?></td>
                <td><?= $nomination->has('award') ? $this->Html->link($nomination->award->title, ['controller' => 'Awards', 'action' => 'view', $nomination->award->id]) : '' ?></td>
                <td><?= h($nomination->organization_name) ?></td>
                <td><?= h($nomination->first_name) ?></td>
                <td><?= h($nomination->last_name) ?></td>
                <td><?= h($nomination->nominee_phone) ?></td>
                <td><?= h($nomination->contact) ?></td>
                <td><?= h($nomination->contact_email) ?></td>
                <td><?= h($nomination->created) ?></td>
                <td><?= h($nomination->modified) ?></td>
                <td><?= $this->Number->format($nomination->visible) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nomination->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nomination->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nomination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomination->id)]) ?>
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
