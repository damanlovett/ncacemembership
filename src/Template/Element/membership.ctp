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
<?php $this->set('title', 'Members'); ?>
<div id="updateMembershipsIndex">
    <?php echo $this->Search->searchForm('Memberships', ['legend' => false, 'updateDivId' => 'updateMembershipsIndex']); ?>
    <?php echo $this->element('Usermgmt.paginator', ['updateDivId' => 'updateMembershipsIndex']); ?>
    <hr />


    <div class="alert alert-info" style="text-align: left;">
        <span>
            <p>
                <strong>Pending membership accounts are waiting for processing. The following actions can be done from
                    this sections.</strong>
            </p>
        </span>
        <ul>
            <li>Set all members to pending</li>
            <li>Process the membership</li>
            <li>Add transaction to the membership</li>
            <li>Delete membership</li>
            <li>Preview / Print Invoice</li>
        </ul>
        <p> The current year is
            <strong>
                <?= $current->title; ?>
            </strong>
            <?= $this->Html->link('Change Current Year', ['controller' => 'blurbs', 'action' => 'change', '4'], ['class' => 'btn btn-primary btn-xs']) ?>
        </p>
    </div>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th scope="col">
                    <?= $this->Paginator->sort('Users.last_name') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('member_year', 'Year') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('membership_type', 'Type') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('type_payment', 'Payment') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('due_amount', 'Amount') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('processed') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('created') ?>
                </th>
                <th scope="col" class="actions">
                    <?= __('Actions') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership) : ?>
            <tr>
                <td>

                    <?= $this->Html->link($this->Html->image("view-doc.png", ["alt" => "view member"]), ['controller' => 'Transactions', 'action' => 'transactions', $membership->user->id], ['escape' => false]) ?>
                    <?= $membership->user->last_name . ", " . $membership->user->first_name ?>
                </td>
                <td>
                    <?= h($membership->member_year) ?>
                </td>
                <td>
                    <?= h($membership->membership_type) ?>
                </td>
                <td>
                    <?= h($membership->type_payment) ?>
                    <?= h($membership->userDetails->organization) ?>
                </td>
                <td>
                    <?= $this->Number->currency($membership->due_amount) ?>
                </td>
                <td>
                    <?= $this->Number->format($membership->processed) ? "Yes" : "<span style='color:red';>No</span>"; ?>
                </td>
                <td>
                    <?= h($membership->created) ?>
                </td>
                <td class="actions">

                    <?= "<div class='btn-group'>"; ?>
                    <?= "<button class='btn btn-primary btn-xs dropdown-toggle' data-toggle='dropdown'>" . __('Action') . " <span class='caret'></span></button>"; ?>
                    <?= "<ul class='dropdown-menu'>"; ?>
                    <?= "<li>" . $this->Html->link(__('View / Add Transaction'), ['action' => 'view', $membership->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Process'), ['controller' => 'transactions', 'action' => 'transactions', $membership->user->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('View Membership'), ['action' => 'review', $membership->id]) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Preview Invoice'), ['action' => 'invoice', $membership->id, $membership->user->id, 'default']) . "</li>"; ?>
                    <?= "<li>" . $this->Html->link(__('Print Friendly Invoice'), ['action' => 'invoice', $membership->id, $membership->user->id, 'print']) . "</li>"; ?>
                    <?= "</ul>"; ?>

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
        <p>
            <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
        </p>
    </div>
</div>