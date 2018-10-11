<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading" style="margin-bottom: 20px;">
        <span class="panel-title" style="color:black">
            <?php echo $membership->member_year.__(' Membership for ').$membership->user->first_name." ".$membership->user->last_name; ?>
        </span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back Membership Home', true), ['action'=>'index', 'page'=>$page], ['class'=>'btn btn-primary']); ?>
        </span>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Edit Membership', true), ['action'=>'edit', $membership->id, 'page'=>$page], ['class'=>'btn btn-primary']); ?>
        </span>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back to Processing', true), ['controller'=>'transactions', 'action'=>'transactions', $membership->user->id, 'page'=>$page], ['class'=>'btn btn-primary']); ?>
        </span>
    </div>

<div class="panel-body">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Membership</a></li>
    <li><a href="#tabs-2">Add Transaction</a></li>
  </ul>
  <div id="tabs-1">

    <table class="table table-striped table-bordered table-condensed table-hover">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $membership->user->first_name." ".$membership->user->last_name; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Member Year') ?></th>
            <td><?= h($membership->member_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Type') ?></th>
            <td><?= h($membership->membership_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Payment') ?></th>
            <td><?= h($membership->type_payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->currency($membership->due_amount) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Members Included') ?></th>
            <td><?= h($membership->members_included);?></td>
       </tr>
       <!-- <tr>
            <th scope="row"><?= __('Account Questions') ?></th> 
            <td><?= h($membership->account_questions);?></td>
       </tr>
      -->
        <tr>
            <th scope="row"><?= __('Mentor Program') ?></th>
            <td><?= $this->Number->format($membership->mentor_program)? "Yes" : "No" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $this->Number->format($membership->processed)? "<span style='color: green'>Yes</span>" : "<span style='color:red'>No</span>" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($membership->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($membership->modified) ?></td>
        </tr>
    </table>
</div>

  <div id="tabs-2">
    <?php $created = $var['first_name']." ".$var['last_name'];?>

    <?= $this->Form->create(null, ['url' => ['controller' => 'Transactions', 'action' => 'add'], 'class' => 'form-horizontal']) ?>
        
            <?= $this->Form->hidden('user_id', ['default' => $membership->user_id]);?>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Transaction Name</label>
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
		   			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Process?</label>
			<div class="col-sm-5">
            <?=  $this->Form->input('processed', ['type'=>'select', 'options'=>array('0'=>'No','1'=>'Yes'), 'label' => false, 'div'=>false, 'class'=> 'form-control']);?>
 			</div>
		   </div>

		   
           <?=  $this->Form->hidden('created_by', ['default' => $created]);  ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
</div> <!-- End of tabs -->

</div>
</div>
