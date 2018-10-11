<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Pending Membership Accounts') ?>
                <div class="panel-title-right">
                		<?= $this->Html->link('All Memberships', ['controller' => 'memberships',	'action' => 'all'], ['class'=>'btn btn-primary btn-sm']) ?>
                	     <div class='btn-group'>
<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown' >Export Reports <span class='caret'></span></button>
<ul class='dropdown-menu'>
		<li><?= $this->Html->link('Processed', ['plugin' => false, 'controller' => 'memberships', 'action' => 'members_accounts', '1'], ['escape'=>false]) ?></li>
		<li><?= $this->Html->link('Unprocessed', ['controller' => 'memberships',	'action' => 'members_accounts', '0'], ['escape'=>false]) ?></li>
		
		<li><?= $this->Html->link('All', ['controller' => 'memberships',	'action' => 'all_accounts'], ['escape'=>false]) ?></li>
		<li><?= $this->Html->link('Mentors', ['plugin' => false, 'controller' => 'memberships', 'action' => 'mentor_accounts', $current->title], ['escape'=>false]) ?></li>
	</ul>
</div>
				<?= $this->Html->link(__('Set All Member to Pending*'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'reset_membership',0], ['class'=>'btn btn-success btn-sm']) ?>
                </div>
            </span>
        </div>
        <div class="panel-body">
        <div class="alert alert-info" style="text-align: left;">
<span><p><strong>Pending membership accounts are waiting for processing. The following actions can be done from this sections.</strong></p></span>
	<ul>
		<li>Set all members to pending</li>
		<li>Process the membership</li>
		<li>Add transaction to the membership</li>
		<li>Delete membership</li>
		<li>Preview / Print Invoice</li>
	</ul>
<p> The current year is <strong><?= $current->title;?></strong> <?= $this->Html->link('Change Current Year', ['controller' => 'blurbs',	'action' => 'change','4'], ['class'=>'btn btn-primary btn-xs']) ?></p>
   </div>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= __('Member') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membership_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_amount','Amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
            <tr>
                <td>

                <?= $this->Html->link($this->Html->image("view-doc.png", ["alt" => "view member"]), ['controller' => 'Transactions', 'action' => 'transactions',$membership->user->id], ['escape' => false]) ?>
                <?= $membership->user->last_name.", ".$membership->user->first_name ?></td>
                <td><?= h($membership->member_year) ?></td>
                <td><?= h($membership->membership_type) ?></td>
                <td><?= h($membership->type_payment) ?></td>
                <td><?= $this->Number->currency($membership->due_amount) ?></td>
                <td><?= $this->Number->format($membership->processed)? "Yes" : "<span style='color:red';>No</span>"; ?></td>
                <td><?= h($membership->created) ?></td>
                <td class="actions">
                	                	
                    <?= "<div class='btn-group'>";?>
					<?= "<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>".__('Action')." <span class='caret'></span></button>";?>
					<?= "<ul class='dropdown-menu'>";?>
                    <?= "<li>".$this->Html->link(__('View / Add Transaction'), ['action' => 'view', $membership->id])."</li>"; ?>
                    <?= "<li>".$this->Html->link(__('Process'), ['controller'=>'transactions','action' => 'transactions', $membership->user->id])."</li>"; ?>
                    <?= "<li>".$this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)])."</li>"; ?>
                    <?= "<li>".$this->Html->link(__('View Membership'), ['action' => 'review', $membership->id])."</li>"; ?>
                    <?= "<li>".$this->Html->link(__('Preview Invoice'), ['action' => 'invoice', $membership->id,$membership->user->id,'default'])."</li>"; ?>
                    <?= "<li>".$this->Html->link(__('Print Friendly Invoice'), ['action' => 'invoice', $membership->id,$membership->user->id,'print'])."</li>"; ?>
                    <?= "</ul>";?>
                                        
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
