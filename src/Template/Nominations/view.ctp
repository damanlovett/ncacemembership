<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nomination'), ['action' => 'edit', $nomination->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nomination'), ['action' => 'delete', $nomination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomination->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nominations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nomination'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Awards'), ['controller' => 'Awards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Award'), ['controller' => 'Awards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nominations view large-9 medium-8 columns content">
    <h3><?= h($nomination->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nomination->has('user') ? $this->Html->link($nomination->user->id, ['controller' => 'Users', 'action' => 'view', $nomination->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Award') ?></th>
            <td><?= $nomination->has('award') ? $this->Html->link($nomination->award->title, ['controller' => 'Awards', 'action' => 'view', $nomination->award->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Organization Name') ?></th>
            <td><?= h($nomination->organization_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($nomination->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($nomination->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nominee Phone') ?></th>
            <td><?= h($nomination->nominee_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($nomination->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Email') ?></th>
            <td><?= h($nomination->contact_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nomination->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $this->Number->format($nomination->visible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nomination->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($nomination->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nomination') ?></h4>
        <?= $this->Text->autoParagraph(h($nomination->nomination)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contact Phone') ?></h4>
        <?= $this->Text->autoParagraph(h($nomination->contact_phone)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Votes') ?></h4>
        <?php if (!empty($nomination->votes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Nomination Id') ?></th>
                <th scope="col"><?= __('Vote') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nomination->votes as $votes): ?>
            <tr>
                <td><?= h($votes->id) ?></td>
                <td><?= h($votes->user_id) ?></td>
                <td><?= h($votes->nomination_id) ?></td>
                <td><?= h($votes->vote) ?></td>
                <td><?= h($votes->created) ?></td>
                <td><?= h($votes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Votes', 'action' => 'view', $votes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Votes', 'action' => 'edit', $votes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Votes', 'action' => 'delete', $votes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
