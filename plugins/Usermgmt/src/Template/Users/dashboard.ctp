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
			<?php echo __('Dashboard');?>
			<div class="panel-title-right">
                	                    <?= ($var['ncace_status']) ? __('') : $this->Html->link(__('Renew Now'), ['plugin'=>false, 'controller'=>'memberships', 'action' => 'my'], ['class'=>'btn btn-danger btn-sm']); ?> 
             </div>
		</span>
	</div>
	<div class="panel-body dashboard-section" style="min-height: 750px;">


<div class="profile" style="float:left; margin-right:30px; display:none">
								<img alt="<?php echo h($var['first_name'].' '.$var['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $var['photo'], 200, null, true);?>" class="img-rounded">
</div>
<div style="display:none;">
<?php	if($this->UserAuth->isLogged()) {
			echo __('Hello').' '.h($var['first_name']).' '.h($var['last_name']);
			echo "<br/><br/>";
			echo $mainAnnouncement->body;
			echo "<br/><br/>";
			$lastLoginTime = $this->UserAuth->getLastLoginTime();
			if($lastLoginTime) {
				echo __('Your last login time is ').$lastLoginTime;
				echo "<br/><br/>";
			}


?>

</div>
<div class="container">

 <div class="row" style="margin-bottom: 30px">
 	<div class="col-md-3">
 	<img alt="<?php echo h($var['first_name'].' '.$var['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $var['photo'], 200, null, true);?>"style="float:left" class="img-thumbnail">
 	</div>

 	<div class="col-md-9" style="height:200px">
 		<h4>Welcome&nbsp;<?=$var['first_name'];?></h4>
					 	<strong>Job Title: </strong> <?= $var['user_detail']['job_title'];?><br />
					 	<strong>Department: </strong> <?= $var['user_detail']['department'];?><br />
 	               	    <strong><?php echo __('Organization:  ');?></strong><?php echo h($var['user_detail']['organization']);?><br/>
                	    <strong><?php echo __('Department:  ');?></strong><?php echo h($var['user_detail']['department']);?><br/>
                	    <strong><?php echo __('Type:  ');?></strong><?php echo h($var['user_detail']['organization_type']);?><br/>
                	    <strong><?php echo __('Status:  ');?></strong><?php echo h($var['user_detail']['organization_status']);?><br/>
                	    <strong><?php echo __('Member Status:  ');?></strong><?php echo h($var['user_detail']['member_status']);?><br/>
                	    <strong><?php echo __('NCACE Status:  ');?></strong><?= ($var['ncace_status']) ? __('Current') : __('Pending :: <span class="label label-danger">NCACE Status :: Renewal Time</span>');?> 	
 	</div>
 	<div style="clear: both"></div>
 	</div>
 	<hr />
 	
 	<div class="row">
 	 	<div class="col-md-3 img-thumbnail2 btn-primary2">

 	<ul style="display: none">
 	<li>ITEM1: xxxxxx</li>
 	<li>ITEM2: xxxxxx</li>
 	<li>ITEM3: xxxxxx</li>
 	<li>ITEM4: xxxxxx</li>
 	<li>ITEM5: xxxxxx</li>
 	</ul>
 	</div>

 	<div class="col-md-9">

		        <?= ($mainAnnouncement->body); ?>

 	</div>
 </div>
 
 </div>
	
	
	
	
	
	
	
	
	
  
  
</div>



<div style="display:none;">
<?php

			echo "<h4><span class='label label-default'>My Account</span></h4><br/>";
			if($this->UserAuth->HP('Users', 'myprofile', 'Usermgmt')) {
				echo $this->Html->link(__('My Profile'), ['controller'=>'Users', 'action'=>'myprofile', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
			}
			if($this->UserAuth->HP('Users', 'editProfile', 'Usermgmt')) {
				echo $this->Html->link(__('Edit Profile'), ['controller'=>'Users', 'action'=>'editProfile', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
			}
			if($this->UserAuth->HP('Users', 'changePassword', 'Usermgmt')) {
				echo $this->Html->link(__('Change Password'), ['controller'=>'Users', 'action'=>'changePassword', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
			}
			if(ALLOW_DELETE_ACCOUNT && $this->UserAuth->HP('Users', 'deleteAccount', 'Usermgmt') && !$this->UserAuth->isAdmin()) {
				echo $this->Form->postLink(__('Delete Account'), ['controller'=>'Users', 'action'=>'deleteAccount', 'plugin'=>'Usermgmt'], ['escape'=>false, 'class'=>'btn btn-default um-btn', 'confirm'=>__('Are you sure you want to delete your account?')]);
			}
			echo "<hr/>";

			if($this->UserAuth->isAdmin()) {
				echo "<h4><span class='label label-default'>User Management</span></h4><br/>";
				if($this->UserAuth->HP('Users', 'addUser', 'Usermgmt')) {
					echo $this->Html->link(__('Add User'), ['controller'=>'Users', 'action'=>'addUser', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'addMultipleUsers', 'Usermgmt')) {
					echo $this->Html->link(__('Add Multiple Users'), ['controller'=>'Users', 'action'=>'addMultipleUsers', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Users'), ['controller'=>'Users', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'online', 'Usermgmt')) {
					echo $this->Html->link(__('Online Users'), ['controller'=>'Users', 'action'=>'online', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroups', 'add', 'Usermgmt')) {
					echo $this->Html->link(__('Add Group'), ['controller'=>'UserGroups', 'action'=>'add', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroups', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Groups'), ['controller'=>'UserGroups', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Group Permissions</span></h4><br/>";
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('Group Permissions'), ['controller'=>'UserGroupPermissions', 'action'=>'permissionGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionSubGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('Subgroup Permissions'), ['controller'=>'UserGroupPermissions', 'action'=>'permissionSubGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Email Communication</span></h4><br/>";
				if($this->UserAuth->HP('UserEmails', 'send', 'Usermgmt')) {
					echo $this->Html->link(__('Send Mail'), ['controller'=>'UserEmails', 'action'=>'send', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('View Sent Mails'), ['controller'=>'UserEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('ScheduledEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Scheduled Mails'), ['controller'=>'ScheduledEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserContacts', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Contact Enquiries'), ['controller'=>'UserContacts', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailTemplates', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Email Templates'), ['controller'=>'UserEmailTemplates', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailSignatures', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Email Signatures'), ['controller'=>'UserEmailSignatures', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Static Pages Management</span></h4><br/>";
				if($this->UserAuth->HP('StaticPages', 'add', 'Usermgmt')) {
					echo $this->Html->link(__('Add Page'), ['controller'=>'StaticPages', 'action'=>'add', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('StaticPages', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Pages'), ['controller'=>'StaticPages', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Admin Settings</span></h4><br/>";
				if($this->UserAuth->HP('UserSettings', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Settings'), ['controller'=>'UserSettings', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserSettings', 'cakelog', 'Usermgmt')) {
					echo $this->Html->link(__('Cake Logs'), ['controller'=>'UserSettings', 'action'=>'cakelog', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'deleteCache', 'Usermgmt')) {
					echo $this->Html->link(__('Delete Cache'), ['controller'=>'Users', 'action'=>'deleteCache', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";
			}
		} ?>
	</div>
</div>
