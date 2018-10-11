<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="panel panel-success">
    <div class="panel-heading" style="margin-bottom: 20px;">
        <span class="panel-title" style="color:black">
            <?php echo $membership->member_year.__(' Membership for ').$membership->user->first_name." ".$membership->user->last_name; ?>
        </span>
        <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
        <span class="panel-title-right">
            <?php echo $this->Html->link(__('Back', true), ['action'=>'personal', $membership->id, 'page'=>$page], ['class'=>'btn btn-default']); ?>
        </span>
    </div>

<div class="panel-body">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Membership</a></li>
  </ul>
  <div id="tabs-1">

    <table class="table table-striped table-bordered table-condensed table-hover">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $membership->user->first_name." ".$membership->user->last_name; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Member Year') ?></th>
            <td><?= h($membership->member_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Type') ?></th>
            <td><?= h($membership->membership_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Payment') ?></th>
            <td><?= h($membership->type_payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Amount') ?></th>
            <td><?= $this->Number->currency($membership->due_amount) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Members Included') ?></th>
            <td><?= h($membership->members_included);?></td>
       </tr>
       <!-- <tr>
            <th scope="row"><?= __('Account Questions') ?></th> 
            <td><?= h($membership->account_questions);?></td>
       </tr>
      -->
        <tr>
            <th scope="row"><?= __('Mentor Program') ?></th>
            <td><?= $this->Number->format($membership->mentor_program)? "Yes" : "No" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $this->Number->format($membership->processed)? "<span style='color: green'>Yes</span>" : "<span style='color:red'>No</span>" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($membership->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($membership->modified) ?></td>
        </tr>
    </table>
</div>

</div> <!-- End of tabs -->

</div>
</div>
