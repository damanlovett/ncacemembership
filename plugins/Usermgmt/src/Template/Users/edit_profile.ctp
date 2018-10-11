<?php
/* Cakephp 3.x User Management Premium Version (a product of Ektanjali Softwares Pvt Ltd)
Website- http://ektanjali.com
Plugin Demo- http://cakephp3-user-management.ektanjali.com/
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT. */
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title">
			<?php echo __('Edit Profile'); ?>
		</span>
		<div class="panel-title-right">
			<?php echo $this->Html->link(__('Back', true), ['action'=>'myprofile'], ['class'=>'btn btn-primary']); ?>
		</div>
	</div>
	<div class="panel-body">
		<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'editProfileForm', 'submitButtonId'=>'editProfileSubmitBtn']); ?>
		<?php echo $this->Form->create($userEntity, ['type'=>'file', 'id'=>'editProfileForm', 'class'=>'form-horizontal']); ?>
		<?php $changeUserName = (ALLOW_CHANGE_USERNAME || empty($userEntity['username'])) ? false : true; ?>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Username'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.username', ['type'=>'text', 'label'=>false, 'div'=>false, 'readonly'=>$changeUserName, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('First Name'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.first_name', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Last Name'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.last_name', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Email');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.email', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Job Title'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.job_title', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Organization'); ?></label>
			<div class="col-sm-5">
				<?php echo $this->Form->input('Users.user_detail.organization', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Department/Division'); ?></label>
			<div class="col-sm-4">
				<?php echo $this->Form->input('Users.user_detail.department', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Organization Type');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.organization_type', ['type'=>'radio', 'label'=>false, 'div'=>false, 'options'=>$otypes, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Organization Status');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.organization_status', ['type'=>'radio', 'label'=>false, 'div'=>false, 'options'=>$ostatus, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Organization Website');?></label>
			<div class="col-sm-5">
				<?php echo $this->Form->input('Users.user_detail.organization_web', ['type'=>'text', 'placeholder'=>'http://','label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Membership Status');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.member_status', ['type'=>'radio', 'label'=>false, 'div'=>false, 'options'=>$mstatus, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Gender'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.gender', ['type'=>'select', 'options'=>$genders, 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Birthday'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.bday', ['type'=>'text', 'placeholder'=>'YYYY-MM-DD', 'label'=>false, 'div'=>false, 'class'=>'form-control datepicker']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Phone'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.cellphone', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Address'); ?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.location', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'class'=>'form-control']); ?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Photo');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.photo_file', ['type'=>'file', 'label'=>false, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-button-row">
			<?php echo $this->Form->Submit(__('Update Profile'), ['class'=>'btn btn-primary', 'id'=>'editProfileSubmitBtn']); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
