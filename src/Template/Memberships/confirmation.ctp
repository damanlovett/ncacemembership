<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading" style="margin-bottom: 20px;">
        <span class="panel-title" style="color:black">
            <?php echo ('PayPal Confirmation'); ?>
        </span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back', true), ['action'=>'index', 'page'=>$page], ['class'=>'btn btn-default']); ?>
        </span>
    </div>

<div class="panel-body">

		<div class="container">
			
			
			<div style="width:100%; text-align: center; margin-bottom: 20px">
				<?php echo $this->Html->image('NCACE-LogoHiSmall.jpg');?>
			</div>
			
			
					<div class="row">
									<div class="col-sm-14" style="padding:20px; margin-bottom: 10px">
													<p>Thank you for registering (or renewing) your NCACE membership for 2018! Please allow 2-4 weeks for us to verify payment of your dues and process your membership within the membership portal.</p>
											</div>
									
									</div>
									
												
								
							
					</div>
		
    
    					<div class="row">
								
									<div class="col-sm-14" style="padding:30px; margin-bottom: 200px; text-align: center">
							    	<strong>Questions should be direct to:</strong>
							    	<?= $signature['signature'];?>
								</div>
						</div>    
	
</div>
</div>
</div>
