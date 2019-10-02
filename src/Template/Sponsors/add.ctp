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
            <?= __('2020 Sponsorship Items <small>[ step 2 of 2 ]</small>') ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <h4>Contact Information</h4>
        <table class="vertical-table">
            <tr>
                <td><?= h($usr->first_name) ?>&nbsp;<?= h($usr->last_name) ?></td>
            </tr>
            <tr>
                <td><?= h($usr->organization) ?></td>
            </tr>
            <tr>
                <td><?= h($usr->phone) ?></td>
            </tr>
            <tr>
                <td><?= h($usr->email) ?></td>
            </tr>
        </table>
        <div>
            <h5 class="bg-success" style="padding:10px">Please add items to the cart that you would like to
                sponsor
                for
                the 2019
                Conference. Once you have added the items, submit your request and you will be taken to a confirmation
                page.</h5>
        </div>
        <hr />
        <fieldset style="border:none;">

            <?= $this->Form->create($sponsor) ?>

            <?= $this->Form->hidden('usr_id', ['value' => $userId]); ?>
            <div class="form-group col-xs-10">
                <?= $this->Form->input('sponsored_item_id', ['options' => $sponsoredItems, 'class' => 'form-control']); ?>
            </div>
            <?= $this->Form->hidden('sponsorship_id', ['value' => $sponsorships->id]); ?>
            <?= $this->Form->hidden('processed'); ?>
            <div class="form-group col-xs-4">
                <?= $this->Form->button(__('Add to Cart')) ?>
                <?= $this->Form->end() ?>
            </div>
        </fieldset>
        <hr />
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if (!empty($sponsorship)) : ?>
                    <table class="table table-bordered table-condensed table-hover">
                        <?php $previous = ''; ?>
                        <?php foreach ($sponsorship as $sponsoredItems) : ?>

                        <?php if ($previous == $sponsoredItems->sponsored_level->name) {
                                            echo '<tr>';
                                        } else { ?>
                        <tr>
                            <td colspan="5" style="background-color:grey; color:white;">
                                <strong>
                                    <?= h($sponsoredItems->sponsored_level->name) ?></strong>
                            </td>
                        </tr>
                        <?php
                                        } ?>
                        <td>
                            <?= h($sponsoredItems->name) ?>&nbsp;&nbsp;
                            <?php if ($sponsoredItems->amount == 0) {
                                                echo '&nbsp;';
                                            } else {
                                                echo $this->Number->currency($sponsoredItems->amount, 'USD');
                                            } ?>
                            <br />
                            <?= $sponsoredItems->description ?><br />
                            <?php if ($sponsoredItems->unavailable == 1) {
                                                echo "<span style='padding-left:20px; color:grey;' >unavailable</span>";
                                            } ?>

                        </td>
                        </tr>

                        <?php $previous = $sponsoredItems->sponsored_level->name;
                                endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
                <div class="col-md-4">
                    <h3><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Cart</h3>
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
                                    <i class="fas fa-info-circle fa-lg"
                                        title="This amount is an estimate and is subject to approval"></i>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align:center">
                                    <?= $this->Html->link(__('Submit Request'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'thanks', $total_amount, $userId], ['class' => 'btn btn-default btn-sm']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>




    </div>
</div>