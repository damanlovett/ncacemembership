<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel2 panel-success" style="margin-bottom: 0px">
    <div class="panel-heading">
        <span class="panel-title" style="color:black">
            <?php echo $membership->member_year.__(' Membership Invoice for ').$membership->user->first_name." ".$membership->user->last_name; ?>
        </span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back', true), ['action'=>'personal', 'page'=>$page], ['class'=>'btn btn-primary hidden-print']); ?>
        </span>
        <span class="panel-title-right">
        	<form>
					<input type="button" value="Print this page" onClick="window.print()" class="btn btn-primary hidden-print">
			</form>
        </span>
    </div>

<div class="panel-body">

		<div class="container">
			
			
			
			<div style="width:90%; text-align: center; margin-bottom: 15px;">
				<?php echo $this->Html->image('NCACE-LogoHiSmall.jpg');?>
			</div>			
			
			
					<div class="row">
								<div class="col-sm-6">
									<div class="col-sm-8">
									<div class="panel panel-success"> 
									        <div class="panel-heading"><span class="panel-title">Bill To</span></div>
									        <div class="panel-body">
													<?= $membership->user->first_name."&nbsp;".$membership->user->last_name ?><br />
													<?= $user['user_detail']['location'] ?><br />
													<?= $user['user_detail']['cellphone'] ?><br />
											</div>
									
									</div>
									</div>
									
												
								</div>
								
								
								<div class="col-sm-6">
									<div class="col-sm-8">
									<div class="panel panel-success"> 
									        <div class="panel-heading"><span class="panel-title">Information</span></div>
									        <div class="panel-body">
														  <div>Invoice Date&nbsp;<?= h($membership->created) ?></div>
														  <div>Invoice #<?= $this->Number->format($membership->id) ?></div>
														  <div>&nbsp;</div>
											</div>
									
									</div>
									</div>
						
						
								</div>
					</div>
		
<div class="col-sm-9" style="margin-top: 30px">

	<table class="table table-striped table-bordered table-condensed table-hover">

        <tr>
            <th scope="row"><?= __('Member Year') ?></th>
            <td><?= h($membership->member_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Type') ?></th>
            <td><?= h($membership->membership_type) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->currency($membership->due_amount) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Members Included') ?></th>
            <td><?= h($membership->members_included);?></td>
       </tr>
        <tr>
            <th scope="row"><?= __('Mentor Program') ?></th>
            <td><?= $this->Number->format($membership->mentor_program)? "Yes" : "No" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= $this->Number->format($membership->processed)? "<span style='color: green'>Yes</span>" : "<span style='color:red'>No</span>" ?></td>
        </tr>
    </table>
</div> 
    
    					<div class="row" style="margin-bottom: 20px;">
								<div class="col-sm-6">
								    Payments can be mailed to:
	     							<?= $address['signature'];?>
								</div>
								<div class="col-sm-6">
							    	Questions should be direct to:
							    	<?= $signature['signature'];?>

								</div>
						</div>    
						
						<div class="row hidden-print" style="margin-left:25px;">
							<div class="alert alert-info">You may print this page as your invoice for your membership payment.</div>
						</div>
	
</div>
</div>
</div>
