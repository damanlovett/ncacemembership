<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberships form large-9 medium-8 columns content">
    <?= $this->Form->create($membership) ?>
    <fieldset>
        <legend><?= __('Add Membership') ?></legend>
        <?php
            echo $this->Form->hidden('user_id', ['value' => $this->UserAuth->getUserId()]);
            echo $this->Form->input('member_year', ['type'=>'select', 'options'=>$this->Switches->membershipYear()]);
						echo $this->Form->input('otype', ['label'=>'Organization Type', 'type'=>'select', 'options'=>$this->Switches->membershipOptions('otype')]);
			
            echo $this->Form->input('membership_type', ['type'=>'select', 'options'=>$this->Switches->membershipOptions('mtype')]);
            echo $this->Form->input('type_payment', ['type'=>'select', 'options'=>$this->Switches->membershipOptions('payment')]);
            echo $this->Form->input('due_amount');
            echo $this->Form->input('members_included');
            echo $this->Form->input('mentor_program', ['label'=>'Join Mentor Program', 'type'=>'select','options'=>$this->Switches->dropDown('yes')]);
            echo $this->Form->hidden('processed', ['value'=>0]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
