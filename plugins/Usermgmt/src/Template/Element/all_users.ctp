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
<div id="updateUsersIndex">
	<?php echo $this->Search->searchForm('Users', ['legend'=>false, 'updateDivId'=>'updateUsersIndex']); ?>
	<?php echo $this->element('Usermgmt.paginator', ['updateDivId'=>'updateUsersIndex']); ?>
<hr />


<div class='btn-group'>
<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>Export Reports <span class='caret'></span></button>
<ul class='dropdown-menu'>
		<li><?= $this->Html->link('Active', ['controller' => 'users',	'action' => 'members_status', '1'], ['escape'=>false]) ?></li>
		<li><?= $this->Html->link('InActive', ['controller' => 'users',	'action' => 'members_status', '0'], ['escape'=>false]) ?></li>
		<li><?= $this->Html->link('All Members', ['controller' => 'users',	'action' => 'all_members', '_ext' => 'csv'], ['escape'=>false]) ?></li>
	</ul>
</div>


<hr />

	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th><?php echo __('#'); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.id', __('NCACE #')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.first_name', __('Name')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.username', __('Username')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.email', __('Email')); ?></th>
				<th><?php echo __('Groups(s)'); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.email_verified', __('Email Verified')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.active', __('Status')); ?></th>
				<th class="psorting"><?php echo $this->Paginator->sort('Users.ncace_status', __('NCACE Status')); ?></th>
				<th><?php echo __('Action'); ?></th>
			</tr>
		</thead>
		<tbody>
	<?php	if(!empty($users)) {
				$page = $this->request->params['paging']['Users']['page'];
				$limit = $this->request->params['paging']['Users']['perPage'];
				$i = ($page-1) * $limit;
				foreach($users as $row) {
					$i++;
					echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$row['id']."</td>";
						echo "<td>".h($row['first_name']).' '.h($row['last_name'])."</td>";
						echo "<td>".h($row['username'])."</td>";
						echo "<td>".h($row['email'])."</td>";
						echo "<td>".$row['user_group_name']."</td>";
						echo "<td>";
							if($row['email_verified']) {
								echo "<span class='label label-success'>".__('Yes')."</span>";
							} else {
								echo "<span class='label label-danger'>".__('No')."</span>";
							}
						echo"</td>";
						echo "<td>";
							if($row['active']) {
								echo "<span class='label label-success'>".__('Active')."</span>";
							} else {
								echo "<span class='label label-danger'>".__('Inactive')."</span>";
							}
						echo"</td>";
						echo "<td>";
							if($row['ncace_status']) {
								echo "<span class='label label-success'>".__('Current')."</span>";
							} else {
								echo "<span class='label label-danger'>".__('Pending')."</span>";
							}
						echo"</td>";
						echo "<td>";
							echo "<div class='btn-group'>";
								echo "<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>".__('Action')." <span class='caret'></span></button>";
								echo "<ul class='dropdown-menu'>";

									echo "<li>".$this->Html->link(__('Process'), ['plugin' => false, 'controller'=>'Transactions', 'action'=>'Transactions', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
									echo "<li>".$this->Html->link(__('View User'), ['controller'=>'Users', 'action'=>'viewUser', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
									echo "<li>".$this->Html->link(__('Edit User'), ['controller'=>'Users', 'action'=>'editUser', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
									echo "<li>".$this->Html->link(__('Change Password'), ['controller'=>'Users', 'action'=>'changeUserPassword', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
									if($row['id'] != 1 && strtolower($row['username']) != 'admin') {
										if($row['active']) {
											echo "<li>".$this->Form->postLink(__('Inactivate'), ['controller'=>'Users', 'action'=>'setInactive', $row['id'], 'page'=>$page], ['escape'=>false, 'confirm'=>__('Are you sure you want to inactivate this user?')])."</li>";
										} else {
											echo "<li>".$this->Form->postLink(__('Activate'), ['controller'=>'Users', 'action'=>'setActive', $row['id'], 'page'=>$page], ['escape'=>false, 'confirm'=>__('Are you sure you want to activate this user?')])."</li>";
										}
										if(!$row['email_verified']) {
											echo "<li>".$this->Form->postLink(__('Verify Email'), ['action'=>'verifyEmail', $row['id'], 'page'=>$page], ['escape'=>false, 'confirm'=>__('Are you sure you want to verify email of this user?')])."</li>";
										}
										echo "<li>".$this->Form->postLink(__('Delete User'), ['controller'=>'Users', 'action'=>'deleteUser', $row['id'], 'page'=>$page], ['escape'=>false, 'confirm'=>__('Are you sure you want to delete this user?')])."</li>";
									}
									echo "<li>".$this->Html->link(__('View Permissions'), ['controller'=>'Users', 'action'=>'viewUserPermissions', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
									echo "<li>".$this->Html->link(__('Send Mail'), ['controller'=>'UserEmails', 'action'=>'sendToUser', $row['id'], 'page'=>$page], ['escape'=>false])."</li>";
								echo "</ul>";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=10><br/><br/>".__('No Records Available')."</td></tr>";
			} ?>
		</tbody>
	</table>
	<?php if(!empty($users)) {
		echo $this->element('Usermgmt.pagination', ['paginationText'=>__('Number of Users')]);
	}?>
</div>
