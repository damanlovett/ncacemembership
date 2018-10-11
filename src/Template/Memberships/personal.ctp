<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('My Memberships') ?>
                <div class="panel-title-right">
                	                    <?= $this->Html->link(__('Renew Membership'), ['action' => 'my'], ['class'=>'btn btn-primary btn-sm']) ?>
                	                    <?= $this->Html->link(__('Return Home'), ['plugin'=>'Usermgmt','controller'=>'users','action' => 'dashboard'], ['class'=>'btn btn-primary btn-sm']) ?>
       	     
                </div>
            </span>
        </div>
        <div class="panel-body">
        <div class="alert alert-info" style="text-align: left;">
<span><strong>Membership questions should be directed to</strong> <?= $questions['signature'];?></span>
   </div>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('member_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membership_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= "actions"?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
            <tr>
                <td><?= h($membership->member_year) ?></td>
                <td><?= h($membership->membership_type) ?></td>
                <td><?= h($membership->type_payment) ?></td>
                <td><?= $this->Number->currency($membership->due_amount) ?></td>
                <td><?= $this->Number->format($membership->processed)? "Yes" : "<span style='color:red';>No</span>"; ?></td>
                <td><?= h($membership->created) ?></td>
                <td><?= h($membership->modified) ?></td>
                <td>
                	
                	<?= "<div class='btn-group'>";?>
					<?= "<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>".__('Action')." <span class='caret'></span></button>";?>
					<?= "<ul class='dropdown-menu'>";?>
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
