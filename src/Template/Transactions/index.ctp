<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Transactions') ?>
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
        <div class="alert alert-info">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div id="updateUsersIndex">
    <?php echo $this->Search->searchForm('Transactions', ['legend'=>false, 'updateDivId'=>'updateUsersIndex']); ?>
    <?php echo $this->element('Usermgmt.paginator', ['updateDivId'=>'updateUsersIndex']); ?>
    </div>
    <hr />
        <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','Member') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Transaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('check_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit_info','Credit Info?') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed', 'Processed?') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->id) ?></td>
                <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->last_name.", ".$transaction->user->first_name, ['plugin' => 'usermgmt', 'controller' => 'Users', 'action' => 'viewUser', $transaction->user->id]) : '' ?></td>
                <td><?= h($transaction->name) ?></td>
                <td><?= $this->Number->currency($transaction->amount, 'USD') ?></td>
                <td><?= h($transaction->check_number) ?></td>
                <td><?= $transaction->has('credit_info') ? "Yes" : "No"; ?></td>
                <td><?= $transaction->has('processed') ? "Yes" : "No"; ?></td>
                <td><?= h($transaction->created_by) ?></td>
                <td><?= h($transaction->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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
