<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title">
			<?php echo __('Renew Membership'); ?>
		</span>
		<span class="panel-title-right">
			<?php echo $this->Html->link(__('Back'), ['controller' => 'memberships', 'action'=>'personal'],['class'=>'btn btn-primary']);?>
		</span>
		<?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
	</div>
	<div class="panel-body">

		<?= $this->Form->create($membership,['class'=>'form-horizontal']) ?>

		<?php
            echo $this->Form->hidden('user_id', ['value' => $this->UserAuth->getUserId()]);?>


		<div class="um-form-row form-group">
			<label for="member_year" class='col-sm-3  control-label'>
				<?php echo __('Membership Year');?>
			</label>
			<div class="col-sm-2">
				<?php echo $this->Form->input('member_year', ['div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipYear()]);?>
			</div>
		</div>

		<div class="um-form-row form-group">
			<label for="otype" class='col-sm-3  control-label'>
				<?php echo __('Organization Type');?>
			</label>
			<div class="col-sm-4">
				<?php echo $this->Form->input('otype', ['label'=>'Organization Type', 'type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('otype')]);		?>
			</div>
		</div>

		<div class="um-form-row form-group">
			<label for="name" class='col-sm-3  control-label'>
				<?php echo __('Membership Type');?>
			</label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('membership_type', ['type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('mtype')]);?>
			</div>
		</div>

		<div class="um-form-row form-group">
			<label for="due_amount" class='col-sm-3 control-label'>
				<?php echo __('Amount Paying Today');?>
			</label>
			<div class="col-sm-2 input-group">
				<span class="input-group-addon">$</span>
				<?php echo $this->Form->input('due_amount', ['div'=>false, 'label'=>false, 'class'=>'form-control']);?>
			</div>
		</div>

		<div class="container">


			<div class="um-form-row form-group">
				<div class="col-sm-10">

					<div class="panel panel-info">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
							<strong>
								<?= $due->title;?>
							</strong>
						</div>
						<div class="panel-body small">
							<?= $due->body;?>
						</div>
					</div>
				</div>
			</div>

			<div class="um-form-row form-group">
				<label for="members_included" class='col-sm-3  control-label'>
					<?php echo __('If this is a group membership<br /><span style="color:red;font-weight:normal;"><i>List institution and members</i></span>');?>
				</label>
				<div class="col-sm-5">
					<?php echo $this->Form->input('members_included',['div'=>false, 'label'=>false, 'placeholder' => 'Institution: first and last name. e.g., NC State: John Doe, Jane Doe', 'class'=>'form-control']);?>
				</div>
			</div>


			<div class="um-form-row form-group">
				<label for="type_payment" class='col-sm-3  control-label'>
					<?php echo __('Payment Type');?>
				</label>
				<div class="col-sm-2">
					<?php echo $this->Form->input('type_payment', ['type'=>'select', 'div'=>false, 'label'=>false, 'class'=>'form-control', 'options'=>$this->Switches->membershipOptions('payment')]);?>
				</div>
			</div>

			<div class="um-form-row form-group">
				<div class="col-sm-10">

					<div class="panel panel-info">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
							<strong>
								<?= $mentor->title;?>
							</strong>
						</div>
						<div class="panel-body small">
							<?= $mentor->body;?>
						</div>
					</div>
				</div>
			</div>




			<div class="um-form-row form-group">
				<label for="mentor_program" class='col-sm-3  control-label'>
					<?php echo __('Want to participate in the mentor program');?>
				</label>
				<div class="col-sm-2">
					<?php echo $this->Form->input('mentor_program', ['div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'select','options'=>$this->Switches->dropDown('yes')]);?>
				</div>
			</div>


			<?php echo $this->Form->hidden('processed', ['value'=>0]); ?>
			</fieldset>
			<?= $this->Form->button(__('Submit')) ?>
			<?= $this->Form->end() ?>

		</div>
	</div>