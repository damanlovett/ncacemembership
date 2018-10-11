<?php $this->set('title', 'Members'); ?>
<div id="updateMembershipsIndex">
    <?php echo $this->Search->searchForm('Memberships', ['legend' => false, 'updateDivId' => 'updateMembershipsIndex']); ?>
    <?php echo $this->element('Usermgmt.paginator', ['useAjax' => true, 'updateDivId' => 'updateMembershipsIndex']); ?>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col">
                    <?= $this->Paginator->sort('Users.last_name', 'Member') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('member_year') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('membership_type') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('type_payment') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('due_amount', 'Amount') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('processed') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('created') ?>
                </th>
                <th scope="col" class="actions">
                    <?= __('Actions') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership) : ?>
            <tr>
                <td>

                    <?= $this->Html->link($this->Html->image("view-doc.png", ["alt" => "view member"]), ['controller' => 'Transactions', 'action' => 'transactions', $membership->user->id], ['escape' => false]) ?>
                    <?= $membership->user->last_name . ", " . $membership->user->first_name ?>
                </td>
                <td>
                    <?= h($membership->member_year) ?>
                </td>
                <td>
                    <?= h($membership->membership_type) ?>
                </td>
                <td>
                    <?= h($membership->type_payment) ?>
                </td>
                <td>
                    <?= $this->Number->currency($membership->due_amount) ?>
                </td>
                <td>
                    <?= $this->Number->format($membership->processed) ? "Yes" : "<span style='color:red';>No</span>"; ?>
                </td>
                <td>
                    <?= h($membership->created) ?>
                </td>
                <td class="actions">

                    <?= "<div class='btn-group'>"; ?>
                    <?= "<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>" . __('Action') . " <span class='caret'></span></button>"; ?>
                    <?= "<ul class='dropdown-menu'>"; ?>
                    <?= "<li>" . $this->Html->link(__('View / Add Transaction'), ['action' => 'view', $membership->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Process'), ['controller' => 'transactions', 'action' => 'transactions', $membership->user->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('View Membership'), ['action' => 'review', $membership->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Preview Invoice'), ['action' => 'invoice', $membership->id, $membership->user->id, 'default']) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Print Friendly Invoice'), ['action' => 'invoice', $membership->id, $membership->user->id, 'print']) . "</li>"; ?>
                    <?= "</ul>"; ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (!empty($memberships)) {
	echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Members')]);
} ?>
</div>