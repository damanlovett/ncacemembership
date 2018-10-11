<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dropdown'), ['action' => 'edit', $dropdown->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dropdown'), ['action' => 'delete', $dropdown->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dropdown'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dropdowns view large-9 medium-8 columns content">
    <h3><?= h($dropdown->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($dropdown->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('List Type') ?></th>
            <td><?= h($dropdown->list_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dropdown->id) ?></td>
        </tr>
    </table>
</div>
