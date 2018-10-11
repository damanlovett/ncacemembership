<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title">
            <?php echo __('Edit Transaction'); ?>
        </span>
        <span class="panel-title-right">
			<?php echo $this->Html->link(__('Back'), ['controller' => 'transactions', 'action'=>'transactions', $transaction['user_id']],['class'=>'btn btn-default']);?>
		</span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
    </div>
    <div class="panel-body">


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Transactions #<?=$transaction['id'];?></a></li>
  </ul>

  <div id="tabs-1">


    <?= $this->Form->create($transaction, ['url' => ['action' => 'correct'], 'class'=>'form-horizontal']) ?>
        <?= $this->Form->hidden('user_id', ['options' => $users, 'empty' => true]);?>
			<div class="form-group form-group-sm">
			<label for="name" class='col-sm-1  control-label'>Transaction</label>
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

        
        <div class="um-form-row form-group">
			<label for="created_by" class='col-sm-1  control-label'><?php echo __('Created By'); ?></label>
			<div class="col-sm-3">   
            <?= $this->Form->input('created_by', ['type'=>'text', 'disabled' => 'disabled', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
         </div>
         </div>   
            
    <?= $this->Form->button(__('Update Transaction')) ?>
    <?= $this->Form->end() ?>
    
   </div>
  </div>
    
</div>
