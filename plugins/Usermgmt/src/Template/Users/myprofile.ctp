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
			<?php echo __('My Profile'); ?>
		</span>
		<div class="panel-title-right">
			<?php echo $this->Html->link(__('Edit', true), ['action'=>'editProfile'], ['class'=>'btn btn-primary']); ?>
		</div>
	</div>
	<div class="panel-body">
		<div class="profile" style="float: left; margin-right: 20px">
								<img alt="<?php echo h($user['first_name'].' '.$user['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $user['photo'], 200, null, true);?>" class="img-rounded">

							</div>
		<div style="display:inline-block;" class="table-responsive2">
			<table class="table-condensed table-striped table-bordered table-hover">
				<tbody>
					<tr class="active">
						<td style="text-align:right"><strong><?php echo __('Name');?>:</strong></td>
						<td><?php echo h($user['first_name']." ".$user['last_name']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Group(s)');?>:</strong></td>
						<td><?php echo h($user['group_name']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Username');?>:</strong></td>
						<td><?php echo h($user['username']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Email');?>:</strong></td>
						<td><?php echo h($user['email']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Job Title');?>:</strong></td>
						<td><?php echo h($user['user_detail']['job_title']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Organization');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Department/Division');?>:</strong></td>
						<td><?php echo h($user['user_detail']['department']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Organization Type');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization_type']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Organization Status');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization_status']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('NCACE Status');?>:</strong></td>
						<td><?php echo h($user['ncace_status']? 'Current' : 'Pending');?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Organization Website');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization_web']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Membership Status');?>:</strong></td>
						<td><?php echo h($user['user_detail']['member_status']);?></td>
					</tr>

					<tr>
						<td style="text-align:right"><strong><?php echo __('Gender');?>:</strong></td>
						<td><?php echo h(ucwords($user['gender']));?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Birthday');?>:</strong></td>
						<td><?php if(!empty($user['bday'])) { echo $user['bday']->format('d-M-Y'); } ?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Phone');?>:</strong></td>
						<td><?php echo h($user['user_detail']['cellphone']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Address'); ?>:</strong></td>
						<td><?php echo h($user['user_detail']['location']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Status');?>:</strong></td>
						<td><?php echo ($user['active']) ? __('Active') : __('Inactive');?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Joined');?></strong></td>
						<td><?php echo $user['created']->format('d-M-Y');?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
