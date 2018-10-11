<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Conferences') ?>
            </span>
            <span class="panel-title-right">
    <div class="btn-group" role="group" aria-label="...">
            <?= $this->Html->link(__('List Awards'), ['action' => 'index'], ['class'=>'btn btn-default']); ?>
            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class'=>'btn btn-default']); ?>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class'=>'btn btn-default']); ?>
            <?= $this->Html->link(__('Back', true), ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    </div>
            </span>
        </div>
        <div class="panel-body">
        <div class="alert alert-info" style="text-align: left;">
<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
        </div>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Created by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conferences as $conference): ?>
            <tr>
                <td><?= h($conference->name) ?></td>
                <td><?= h($conference->created) ?></td>
                <td><?= h($conference->modified) ?></td>
                <td><?= $this->Number->format($conference->visible)? 'Yes' : 'No' ?></td>
                <td><?= $conference->has('user') ? $conference->user->first_name." ".$conference->user->last_name : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conference->id)]) ?>
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
</div>
