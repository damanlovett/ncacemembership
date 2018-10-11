<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= h("Invoice: ".$transaction->name) ?>
            </span>
            <span class="panel-title-right">
    <div class="btn-group" role="group" aria-label="...">
            <?= $this->Html->link(__('Back', true), ['action'=>'index'], ['class'=>'btn btn-default']); ?>
    </div>
            </span>
        </div>
        <div class="panel-body">


	<?= $transaction->user->first_name."&nbsp;".$transaction->user->last_name ?><br />
	<?= $transaction->user->email ?><br />
	<?= $user['user_detail']['job_title'] ?><br />
	<?= $user['user_detail']['location'] ?><br />
	<?= $user['user_detail']['cellphone'] ?><br />


	  <div>DATE: <br /><h5><?= h($transaction->created) ?></h5></div>
	  <div >INVOICE: <br /><h5><?= $this->Number->format($transaction->id) ?></h5></div>

        	

	      BILL TO:
	     <?= $address['signature'];?>

       	
         	
        	
    	<?= $signature['signature'];?>
    	<?= $paypal['signature'];?>
    	<?= $address['signature'];?>


	        <h3>
            <?= $transaction->has('user') ? $this->Html->link($transaction->user->last_name.", ".$transaction->user->first_name, ['controller' => 'Transactions', 'action' => 'transactions', $transaction->user->id]) : '' ?>
        	</h3>
	<hr />
    <table class="table table-condensed table-bordered">
        <tr>
            <th scope="row" style="width: 20%"><?= __('Name') ?></th>
            <td><?= h($transaction->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Number') ?></th>
            <td><?= h($transaction->check_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Info') ?></th>
            <td><?= h($transaction->credit_info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($transaction->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction #') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($transaction->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transaction->modified) ?></td>
        </tr>
    </table>

        <p><strong><?= __('Description') ?></strong>: <?= $this->Text->autoParagraph(h($transaction->description)); ?></p>

</div>