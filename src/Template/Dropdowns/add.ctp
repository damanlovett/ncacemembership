<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dropdowns form large-9 medium-8 columns content">
    <?= $this->Form->create($dropdown) ?>
    <fieldset>
        <legend><?= __('Add Dropdown') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('list_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
