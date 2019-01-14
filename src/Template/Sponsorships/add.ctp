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
            <?= $this->Html->link(__('List Sponsorships'), ['action' => 'index']) ?>
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
    <?= $this->Form->create($sponsorship) ?>
    <fieldset>
        <legend>
            <?= __('Add Sponsorship') ?>
        </legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('conference_id', ['options' => $conferences, 'empty' => true]);
        echo $this->Form->input('user_id', ['options' => $users]);
        echo $this->Form->input('description');
        echo $this->Form->input('visible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>