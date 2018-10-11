<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Edit Membership') ?>
                <div class="panel-title-right">
                		<?= $this->Html->link('All Memberships', ['controller' => 'memberships',	'action' => 'all'], ['class'=>'btn btn-primary btn-sm']) ?>
                	     <div class='btn-group'>
<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown' >Export Reports <span class='caret'></span></button>
<ul class='dropdown-menu'>
		<li><?= $this->Html->link('Processed', ['plugin' => false, 'controller' => 'memberships', 'action' => 'members_accounts', '1'], ['escape'=>false]) ?></li>
		<li><?= $this->Html->link('Unprocessed', ['controller' => 'memberships',	'action' => 'members_accounts', '0'], ['escape'=>false]) ?></li>
		
		<li><?= $this->Html->link('All', ['controller' => 'memberships',	'action' => 'all_accounts'], ['escape'=>false]) ?></li>
	</ul>
</div>
                </div>
            </span>
        </div>
<div class="panel-body">
<div class="memberships form large-9 medium-8 columns content">
    <?= $this->Form->create($membership,['class'=>'form-horizontal']) ?>
        <?php echo $this->Form->hidden('user_id', ['options' => $users]);?>
        
        
		<div class="um-form-row form-group">
			<label for="processed" class='col-sm-3  control-label'><?php echo __('Has this membership been processed?');?></label>
			<div class="col-sm-2">           
            <?php echo $this->Form->input('processed', ['div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'select','options'=>$this->Switches->dropDown('yes')]);?>
             </div>
		</div>        
			
			<hr />
			
					<div class="um-form-row form-group">
			<label for="member_year" class='col-sm-3  control-label'><?php echo __('Membership Year');?></label>
			<div class="col-sm-2">
            <?php echo $this->Form->input('member_year', ['type'=>'select','div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipYear()]);?>
            </div>
		</div>
		
		<div class="um-form-row form-group">
			<label for="otype" class='col-sm-3  control-label'><?php echo __('Organization Type');?></label>
			<div class="col-sm-4">	
		<?php echo $this->Form->input('otype', ['label'=>'Organization Type', 'type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('otype')]);		?>
            </div>
		</div>
		
		<div class="um-form-row form-group">
			<label for="name" class='col-sm-3  control-label'><?php echo __('Membership Type');?></label>
			<div class="col-sm-3">		<?php echo $this->Form->input('membership_type', ['type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('mtype')]);?>
             </div>
		</div>

		<div class="um-form-row form-group">
			<label for="due_amount" class='col-sm-3 control-label'><?php echo __('Amount');?></label>
			<div class="col-sm-2 input-group"><span class="input-group-addon">$</span>		<?php echo $this->Form->input('due_amount', ['div'=>false, 'label'=>false, 'class'=>'form-control']);?>
             </div>
		</div>		<div class="um-form-row form-group">
			<label for="members_included" class='col-sm-3  control-label'><?php echo __('If this is a group membership, please list the additional members');?></label>
			<div class="col-sm-5">	
            <?php echo $this->Form->input('members_included',['div'=>false, 'label'=>false, 'placeholder' => 'Submit first and last name of each additional member', 'class'=>'form-control']);?>
              </div>
		</div>
         
 		<div class="um-form-row form-group">
			<label for="type_payment" class='col-sm-3  control-label'><?php echo __('Payment Type');?></label>
			<div class="col-sm-2">          
            <?php echo $this->Form->input('type_payment', ['type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('payment')]);?>
             </div>
		</div>
          
		<div class="um-form-row form-group">
			<label for="mentor_program" class='col-sm-3  control-label'><?php echo __('Want to participate in the mentor program');?></label>
			<div class="col-sm-2">           
            <?php echo $this->Form->input('mentor_program', ['div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'select','options'=>$this->Switches->dropDown('yes')]);?>
             </div>
		</div>
          

			
			
			
        <? /*    echo $this->Form->input('member_year');
            echo $this->Form->input('membership_type');
            echo $this->Form->input('type_payment');
            echo $this->Form->input('due_amount');
            echo $this->Form->input('members_included');
            echo $this->Form->input('account_questions');
            echo $this->Form->input('mentor_program');
            echo $this->Form->input('processed');
        */?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
