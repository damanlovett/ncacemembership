<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sponsored Levels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sponsoredLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($sponsoredLevel) ?>
    <fieldset>
        <legend><?= __('Add Sponsored Level') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('placement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
