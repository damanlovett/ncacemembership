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
            <?= __($sponsorships->name) ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($sponsor) ?>

        <?php
        echo $this->Form->hidden('user_id', ['value' => $userId]);
        echo $this->Form->input('sponsored_item_id', ['options' => $sponsoredItems]);
        echo $this->Form->hidden('sponsorship_id', ['value' => $sponsorships->id]);
        echo $this->Form->hidden('processed');
        ?>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
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
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $sponsoredItems->description ?>&nbsp;&nbsp;
                                <?php if ($sponsoredItems->unavailable == 1) {
                                    echo "<span style='padding-left:20px; color:grey;' >unavailable</span>";
                                } ?>
                            </td>
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
                                <td>
                                    <?php if ($sponsorlist->sponsored_item->amount == 0) {
                                        echo '--';
                                    } else {
                                        echo $this->Number->currency($sponsorlist->sponsored_item->amount, 'USD');
                                    } ?>


                                </td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponsorlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsorlist->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $this->Number->currency($total_amount, 'USD'); ?>


                </div>
            </div>
        </div>




    </div>
</div>