<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Announcements') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Edit Home Page'), ['action' => 'main', '1'], ['class'=>'btn btn-primary']); ?>
        <?= $this->Html->link(__('Create Announcement'), ['action' => 'add'], ['class'=>'btn btn-primary']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('archive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $announcement): ?>
            <tr>
                <td><?= $this->Number->format($announcement->id) ?></td>
                <td><?= h($announcement->title) ?></td>
                <td><?= $announcement->has('user') ? $this->Html->link($announcement->user->first_name." ".$announcement->user->last_name, ['controller' => 'Users', 'action' => 'view', $announcement->user->id]) : '' ?></td>
                <td><?= h($announcement->visible) ?></td>
                <td><?= $this->Number->format($announcement->placement) ?></td>
                <td><?= h($announcement->archive) ?></td>
                <td><?= h($announcement->created) ?></td>
                <td><?= h($announcement->modified) ?></td>
                <td class="actions">
                    <div class="btn-group btn-group-xs" style="margin: auto;" role="group" aria-label="...">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcement->id], ['class' => 'btn btn-default  btn-success']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcement->id], ['class' => 'btn btn-default btn-warning']) ?>
                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class' => 'btn btn-default btn-danger']) ?>
                    </div>
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
