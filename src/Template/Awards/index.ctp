<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
    <?= __('Awards') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('New Award'), ['action' => 'add'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class'=>'btn btn-default']); ?>
        <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class'=>'btn btn-default']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr class="info">
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('award_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                <th scope="col" class="actions">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($awards as $award): ?>
            <tr>
                <td><?= $this->Number->format($award->id) ?></td>
                <td><?= $award->has('user') ? $this->Html->link($award->user->id, ['controller' => 'Users', 'action' => 'view', $award->user->id]) : '' ?></td>
                <td><?= h($award->award_year) ?></td>
                <td><?= h($award->title) ?></td>
                <td><?= date_format($award->deadline, 'l d, Y') ?></td>
                <td><?= h($award->contact) ?></td>
                <td><?= h($award->contact_email) ?></td>
                <td><?= h($award->created) ?></td>
                <td><?= h($award->modified) ?></td>
                <td><?= $this->Number->format($award->visible) ? 'Yes' : 'No'; ?></td>
                <td>
                <div class="btn-group btn-group-xs" style="margin: auto;" role="group" aria-label="...">

                    <?= $this->Html->link(__('View'), ['action' => 'view', $award->id], ['class' => 'btn btn-default  btn-success']) ?> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $award->id], ['class' => 'btn btn-default  btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $award->id], ['confirm' => __('Are you sure you want to delete # {0}?', $award->id), 'class' => 'btn btn-default  btn-danger']) ?>
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
