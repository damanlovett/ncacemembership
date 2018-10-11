        <div id="updateUsersIndex">
    <?php echo $this->Search->searchForm('Registrations', ['legend'=>false, 'updateDivId'=>'updateUsersIndex']); ?>
    <?php echo $this->element('Usermgmt.paginator', ['updateDivId'=>'updateUsersIndex']); ?>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('conference_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_status','Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('renewed_membership', 'Renewed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_type', 'Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', 'Member') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registrations as $registration): ?>
            <tr>
                <td><?= $registration->has('conference') ? $this->Html->link($registration->conference->name, ['controller' => 'Conferences', 'action' => 'view', $registration->conference->id]) : '' ?></td>
                <td><?= h($registration->member_status) ?></td>
                <td><?= h($registration->renewed_membership) ?></td>
                <td><?= h($registration->registration_type) ?></td>
                <td><?= $registration->has('user') ? $this->Html->link($registration->user->last_name.", ".$registration->user->first_name, ['controller' => 'Users', 'action' => 'view', $registration->user->id]) : '' ?></td>
                <td><?= h($registration->created) ?></td>
                <td><?= h($registration->modified) ?></td>
                <td><?= $this->Number->format($registration->processed)? 'Yes' : 'No'; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $registration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?>
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
