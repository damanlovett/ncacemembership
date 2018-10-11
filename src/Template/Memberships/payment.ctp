<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
        <div class="panel-heading">
            <span class="panel-title" style="font-size: 22px;">
                <?= __('Memberships Payment Checkout') ?>
                <div class="panel-title-right">
                	                    <?= $this->Html->link(__('Return Home'), ['plugin'=>'Usermgmt','controller'=>'users','action' => 'dashboard'], ['class'=>'btn btn-primary btn-sm']) ?>
       	     
                </div>
            </span>
        </div>
        <div class="panel-body">
<div class="container">    
<div class="row" style="margin-bottom:20px;margin-left:25px;">
	
		<div class="col-md-6">
			<p>If you have questions about your <br /><strong>payments</strong> please contact:
			<span style="font-size:11px;"><?= $signature['signature'];?></span>
			</p>
		</div>
			
			
		<div class="col-md-6">	
			<p>If you have questions about your <br /><strong>memberships</strong> please contact:
		    <span style="font-size:11px;"><?= $membership['signature'];?></span>
		   </p>
		</div>


</div>

<div class="row" style="margin-left:25px;">
			<div class="alert alert-info">Please add admin@ncace.org to your filters so it doesn't go to spam. You may also need to check your spam folders for confirmation emails</div>
	
</div>


<div class="row" style="margin-left:25px;">
	<div id="tabs">
		  <ul>
		    <li><a href="#tabs-1">Credit Card</a></li>
		    <li><a href="#tabs-2">Checks</a></li>
		  </ul>

		  <div id="tabs-1">
		  	    	<?= "<strong>".$paypal['signature_name']."</strong>";?>
    	<?= $paypal['signature']."<br />";?>
    	
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="HFAJDF33CXVRC">
<table>
<tr><td><input type="hidden" name="on0" value="Membership Options">Select the Membership type: <select name="os0">
	<option value="Regular">Regular $50.00 USD</option>
	<option value="Group">Group $250.00 USD</option>
</select><br /><br />
<input type="hidden" name="on1" value="Who is this membership for?">Please enter the name of the primary member's name if a group membership.</td></tr><br />
<tr><td><input type="text" name="os1" maxlength="200"></td></tr>
</table>
<br />
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

		  </div>
		  <div id="tabs-2">
		  	<p><strong>Paying by Check</strong><br />
		  		Please use the address below if you are paying by check.  In the memo line or on a separate sheet, please put the name of the member that should get credit or who should be contacted if NCACE has any questions.</p>
		  	    	<?= $address['signature'];?>
		  </div>
	</div>

</div>
</div>
</div>
</div>