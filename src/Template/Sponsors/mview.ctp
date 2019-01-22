<?php

/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav" style="display:none;">
        <li class="heading">
            <?= __('Actions') ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsors'), ['action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsored Items'), ['controller' => 'SponsoredItems', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsored Item'), ['controller' => 'SponsoredItems', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Sponsorships'), ['controller' => 'Sponsorships', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Sponsorship'), ['controller' => 'Sponsorships', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= "Sponsorship for " . $user->first_name . " " . $user->last_name ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return to Sponsorships'), ['plugin' => false, 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <div style="display:none;">
            <?= $this->Form->create($sponsor) ?>

            <?php
            echo $this->Form->hidden('user_id', ['value' => $id2]);
            echo $this->Form->input('sponsored_item_id', ['options' => $sponsoredItems]);
            echo $this->Form->hidden('sponsorship_id', ['value' => $id]);
            echo $this->Form->hidden('processed');
            ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            <hr />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <table class=" table-sm table-borderless table-condensed">
                        <!--Table body-->
                        <tbody>
                            <tr>
                                <td>
                                    <?= $user->first_name . " " . $user->last_name ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?= $details->organization ?>
                                </td>
                            <tr>
                                <td>
                                    <?= $user->email ?>
                                </td>
                            <tr>
                                <td>
                                    <?= $details->cellphone ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    Admin information
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    <h3><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Sponsorships</h3>
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <tbody>
                            <?php $total_amount = 0; ?>
                            <?php foreach ($sponsorlist as $sponsorlist) : ?>
                            <?php $total_amount = $total_amount + $sponsorlist->sponsored_item->amount; ?>
                            <tr>
                                <td>
                                    <?= $sponsorlist->has('sponsored_item') ? $sponsorlist->sponsored_item->name : ''; ?>
                                </td>
                                <td style="text-align:right;">
                                    <?php if ($sponsorlist->sponsored_item->amount == 0) {
                                        echo '--';
                                    } else {
                                        echo $this->Number->currency($sponsorlist->sponsored_item->amount, 'USD');
                                    } ?>


                                </td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsorlist->id], ['confirm' => __('Are you sure you want to delete this item?', $sponsorlist->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td style="text-align:right;">
                                    <?= "<strong>" . $this->Number->currency(
                                        $total_amount,
                                        'USD'
                                    ) . "</strong>"; ?>
                                </td>
                                <td>
                                    <i class="fas fa-info-circle fa-lg" title="This amount is an estimate and is subject to approval"></i>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align:center">
                                    <?= $this->Html->link(__('Submit to Treasurer'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'thanks', $total_amount, $this->UserAuth->getUserId()], ['class' => 'btn btn-default btn-sm']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>




    </div>
</div>