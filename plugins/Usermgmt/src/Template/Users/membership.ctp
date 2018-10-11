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
			<?php echo __('Membership Information for ').$user->full_name; ?>
		</span>
		<?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
	</div>
	<div class="panel-body">
		<div style="display:inline-block;">
			<?php if(!empty($user)) { ?>
			<table class="table-condensed" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<div class="profile">
								<img alt="<?php echo h($user['first_name'].' '.$user['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $user['photo'], 200, null, true);?>">
							</div>
						</td>
						<td><h1><?php echo h($user['first_name']).' '.h($user['last_name']);?></h1></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Group(s)');?>:</strong></td>
						<td><?php echo h($user['group_name']);?></td>
						<td style="text-align:right"><strong><?php echo __('Organization');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Department');?>:</strong></td>
						<td><?php echo h($user['user_detail']['department']);?></td>
						<td style="text-align:right"><strong><?php echo __('Type');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization_type']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('Status');?>:</strong></td>
						<td><?php echo h($user['user_detail']['organization_status']);?></td>
						<td style="text-align:right"><strong><?php echo __('Member Status');?>:</strong></td>
						<td><?php echo h($user['user_detail']['member_status']);?></td>
					</tr>
					<tr>
						<td style="text-align:right"><strong><?php echo __('NCACE');?>:</strong></td>
						<td><?php echo ($user['ncace_status']) ? __('Current') : __('Pending');?></td>
						<td style="text-align:right">Status [ set status to]</td>
						<td>Send Email</td>
					</tr>
				</tbody>
			</table>
			<?php } ?>
			<hr />

			<hr />

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Membership</a></li>
    <li><a href="#tabs-2">Transactions</a></li>
  </ul>
  <div id="tabs-1">

	<table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('check_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit_info') ?></th>
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
                <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                <td><?= h($transaction->name) ?></td>
                <td><?= $this->Number->format($transaction->amount) ?></td>
                <td><?= h($transaction->check_number) ?></td>
                <td><?= h($transaction->credit_info) ?></td>
                <td><?= h($transaction->created_by) ?></td>
                <td><?= h($transaction->created) ?></td>
                <td><?= h($transaction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
	</table>






  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
</div>
		</div>
	</div>
</div>
