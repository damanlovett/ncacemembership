<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title">
            <?php echo __('Membership Information'); ?>
        </span>
        <span class="panel-title-right">
			<?php echo $this->Html->link(__('Back to All Users', true), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action'=>'index'], ['class'=>'btn btn-primary']);?>
		</span>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back Membership Home', true), ['controller'=>'memberships', 'action'=>'index'], ['class'=>'btn btn-primary']); ?>
        </span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
    </div>
    <div class="panel-body">
            <table class="table-condensed" style="width:100%; margin-bottom: 20px;">
<tbody>
                    <tr>
                        <td style="text-align: right; width: 235px">
                            <div class="profile">
                                <img alt="<?php echo h($user['first_name'].' '.$user['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $user['photo'], 200, null, true);?>">
                            </div>
                        </td>
                        <td style="text-align: left"><h1><?php echo h($user['first_name']).' '.h($user['last_name']);?></h1>
                        	    <div style="margin-bottom: 10px;">
		                        	    <strong><?php echo __('Organization:  ');?></strong><?php echo h($details['organization']);?><br/>
		                        	    <strong><?php echo __('Department:  ');?></strong><?php echo h($details['department']);?><br/>
		                        	    <strong><?php echo __('Type:  ');?></strong><?php echo h($details['organization_type']);?><br/>
		                        	    <strong><?php echo __('Status:  ');?></strong><?php echo h($details['organization_status']);?><br/>
		                        	    <strong><?php echo __('Member Status:  ');?></strong><?php echo h($details['member_status']);?><br/>
		                        	    <strong><?php echo __('NCACE:  ');?></strong><?= ($user['ncace_status']) ? __('Current') : __('Pending');?><br/>
		                        </div>
                        	<?= $this->Html->link(__('Renewal Email'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'welcome',$user['id'],2,1], ['class'=>'btn btn-danger btn-sm']); ?>
                        	<?= $this->Html->link(__('Welcome Email'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'welcome',$user['id'],1,1], ['class'=>'btn btn-success btn-sm']); ?>
                        	<?= $this->Html->link(__('Transaction Email'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'reminder',$user['id'],4,3], ['class'=>'btn btn-success btn-sm']); ?>
                        	<?= ($user['ncace_status']) ?  $this->Html->link(__('Set Member to Pending'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'reset_member',$user['id'],0], ['class'=>'btn btn-success btn-sm']) : $this->Html->link(__('Set Member to Current'), ['plugin' => 'Usermgmt','controller' => 'users', 'action' => 'reset_member',$user['id'],1], ['class'=>'btn btn-warning btn-sm']);   	
                        	?>                        
                          </td>
                    </tr>
                    
                </tbody>
            </table>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Membership</a></li>
    <li><a href="#tabs-2">Transactions</a></li>
    <li><a href="#tabs-3">Registrations</a></li>
  </ul>

  <div id="tabs-1">
    <table class="table table-striped table-bordered table-condensed table-hover">
<thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_year','Year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membership_type','Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_payment','Payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('due_amount','Amount Due') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mentor_program','Mentor Program?') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
            <tr>
                <td><?= $this->Number->format($membership->id) ?></td>
                <td><?= h($membership->member_year) ?></td>
                <td><?= h($membership->membership_type) ?></td>
                <td><?= h($membership->type_payment) ?></td>
                <td><?= $this->Number->currency($membership->due_amount,'USD') ?></td>
                <td><?= $this->Number->format($membership->mentor_program)? "Yes" : "No"; ?></td>
                <td><?= $this->Number->format($membership->processed)? "Yes" : "No"; ?></td>
                <td><?= h($membership->created) ?></td>
                <td><?= h($membership->modified) ?></td>
                <td class="actions">
                	<div class='btn-group'>
                		<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>Action<span class='caret'></span></button>
                		<ul class='dropdown-menu'>
                    <li><?= $this->Html->link(__('View'), ['controller'=>'memberships','action' => 'view', $membership->id]) ?></li>
                    <li><?= $this->Html->link(__('Process'), ['controller'=>'memberships','action' => 'edit', $membership->id]) ?></li>
                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?></li>
                        </ul>
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
  <div id="tabs-2">
  	
  	<a class="btn btn-success btn-xs" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
New Transaction</a>

<div class="collapse" id="collapseExample">
  <div class="well"  style="margin-top:10px">
    
    <?php $created = $var['first_name']." ".$var['last_name'];?>

    <?= $this->Form->create(null, ['url' => ['action' => 'add'], 'class' => 'form-horizontal']) ?>
        
            <?= $this->Form->hidden('user_id', ['default' => $user['id']]);?>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Name</label>
			<div class="col-sm-5">
            <?=  $this->Form->input('name', ['type' => 'text', 'label' => false, 'div'=>false, 'class'=> 'form-control']);?>
			</div>
		    </div>
		   	<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Description</label>
			<div class="col-sm-5">
		    <?=  $this->Form->input('description', ['type' => 'textarea', 'label' => false, 'div'=>false, 'class'=> 'form-control']);?>
			</div>
		    </div>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Amount</label>
			<div class="input-group col-sm-2">
				<div class="input-group-addon">$</div>
           <?=  $this->Form->input('amount', ['label' => false, 'div'=>false, 'class'=> 'form-control']);?>
			</div>
		    </div>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Check</label>
			<div class="input-group col-sm-2">
			<div class="input-group-addon">#</div>
            <?=  $this->Form->input('check_number', ['type' => 'text', 'label' => false, 'div'=>false, 'class'=> 'form-control']);?>
			</div>
		    </div>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Credit / Check Info</label>
			<div class="col-sm-5">
            <?=  $this->Form->input('credit_info', ['type' => 'textarea', 'label' => false, 'div'=>false, 'class'=> 'form-control']);?>
			</div>
		    </div>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Admin Notes</label>
			<div class="col-sm-5">
            <?=  $this->Form->input('admin_notes', ['type' => 'textarea', 'label' => false, 'div'=>false, 'class'=> 'form-control', 'placeholder' => 'Only seen by administrators']);?>
 			</div>
		   </div>
           <?=  $this->Form->hidden('created_by', ['default' => $created]);  ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
    
    
  </div>
</div>

    <table class="table table-striped table-bordered table-condensed table-hover" style="margin-top:10px">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','Transaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('check_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit_info','Credit / Check Info?') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->id) ?></td>
                <td><?= h($transaction->name) ?></td>
                <td><?= $this->Number->currency($transaction->amount, 'USD') ?></td>
                <td><?= h($transaction->check_number) ?></td>
                <td><?= $transaction->has('credit_info')? "Yes" : "No"; ?></td>
                <td><?= h($transaction->created_by) ?></td>
                <td><?= h($transaction->created) ?></td>
                <td><?= h($transaction->modified) ?></td>
                
                
                <td class="actions">
                	<div class='btn-group'>
                		<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>Action<span class='caret'></span></button>
                		<ul class='dropdown-menu'>
                    <li><?= $this->Html->link(__('Send Confirmation'), ['controller'=> 'transactions', 'action' => 'confirmation', $transaction->user_id,$transaction->id,3,1]) ?></li>
                    <li><?= $this->Html->link(__('View'), ['controller'=> 'transactions', 'action' => 'view', $transaction->id]) ?></li>
                    <li><?= $this->Html->link(__('Edit'), ['controller'=> 'transactions', 'action' => 'edit', $transaction->id]) ?></li>
                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?></li>
                    </ul>
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
    <div id="tabs-3">

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
                <!-- <td><?= $registration->has('id') ? $this->Html->link($registration->conference->name, ['controller' => 'Conferences', 'action' => 'view', $registration->conference->id]) : '' ?></td> -->
                <td>2017 Annual Conference</td>
                <td><?= h($registration->member_status) ?></td>
                <td><?= h($registration->renewed_membership) ?></td>
                <td><?= h($registration->registration_type) ?></td>
                <td><?= $registration->has('user') ? $this->Html->link($registration->user->last_name.", ".$registration->user->first_name, ['controller' => 'Users', 'action' => 'view', $registration->user->id]) : '' ?></td>
                <td><?= h($registration->created) ?></td>
                <td><?= h($registration->modified) ?></td>
                <td><?= $this->Number->format($registration->processed)? 'Yes' : 'No'; ?></td>
                <td class="actions">
                	<div class='btn-group'>
                		<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>Action<span class='caret'></span></button>
                		<ul class='dropdown-menu'>
                    <li><?= $this->Html->link(__('View'), ['action' => 'view', $registration->id]) ?></li>
                    <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $registration->id]) ?></li>
                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?></li>
                   </ul>
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
</div>
</div>
</div>
