<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blurb'), ['action' => 'edit', $blurb->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blurb'), ['action' => 'delete', $blurb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blurb->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blurbs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blurb'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blurbs view large-9 medium-8 columns content">
    <h3><?= h($blurb->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blurb->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($blurb->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blurb->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($blurb->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($blurb->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($blurb->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($blurb->body)); ?>
    </div>
</div>
