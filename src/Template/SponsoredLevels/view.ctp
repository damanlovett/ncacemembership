<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sponsored Level'), ['action' => 'edit', $sponsoredLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sponsored Level'), ['action' => 'delete', $sponsoredLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sponsored Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsored Level'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sponsoredLevels view large-9 medium-8 columns content">
    <h3><?= h($sponsoredLevel->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sponsoredLevel->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sponsoredLevel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Placement') ?></th>
            <td><?= $this->Number->format($sponsoredLevel->placement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sponsoredLevel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sponsoredLevel->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sponsoredLevel->description)); ?>
    </div>
</div>
