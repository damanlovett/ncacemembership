<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Blurbs') ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Create Blurb'), ['action' => 'add'], ['class'=>'btn btn-default']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blurbs as $blurb): ?>
            <tr>
                <td><?= $this->Number->format($blurb->id) ?></td>
                <td><?= h($blurb->name) ?></td>
                <td><?= h($blurb->title) ?></td>
                <td><?= h($blurb->created) ?></td>
                <td><?= h($blurb->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blurb->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blurb->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blurb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blurb->id)]) ;?>
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
