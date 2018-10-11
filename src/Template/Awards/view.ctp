<?php
/**
  * @var \App\View\AppView $this
  *
  **/
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= $award->award_year." ".$award->title ?>
        </span>
        <span class="panel-title-right">
<div class="btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Award List'), ['action' => 'index'], ['class'=>'btn btn-success']); ?>
</div>
        </span>
    </div>
    <div class="panel-body">

<table class="table-condensed" style="width:600px;">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $award->has('user') ? $this->Html->link($award->user->id, ['controller' => 'Users', 'action' => 'view', $award->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td style="text-align:right"><strong><?php echo __('Award Year');?>:</strong></td>
            <td><?= h($award->award_year) ?></td>
        </tr>
        <tr>
            <td style="text-align:right"><strong><?php echo __('Title');?>:</strong></td>
            <td><?= h($award->title) ?></td>
        </tr>
        <tr>
            <td style="text-align:right"><strong><?php echo __('Contact');?>:</strong></td>
            <td><?= h($award->contact) ?></td>
        </tr>
        <tr>
            <td style="text-align:right"><strong><?php echo __('Contact E-mail');?>:</strong></td>
            <td><?= h($award->contact_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($award->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $this->Number->format($award->visible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($award->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($award->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($award->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($award->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($award->instructions)); ?>
    </div>
</div>
