<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('My Memberships') ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Renew Membership'), ['action' => 'my'], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <div class="alert alert-info" style="text-align: left;">
            <span><strong>Membership questions should be directed to</strong>
                <?= $questions['signature']; ?></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Items</h4>
                    <?php if (!empty($sponsorship)) : ?>
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <tr>
                            <th scope="col">
                                <?= __('Name') ?>
                            </th>
                            <th scope="col">
                                <?= __('Amount') ?>
                            </th>
                            <th scope="col">
                                <?= __('Description') ?>
                            </th>
                            <th scope="col">
                                <?= __('Sponsorship Id') ?>
                            </th>
                            <th scope="col">
                                <?= __('Level Id') ?>
                            </th>
                            <th scope="col">
                                <?= __('User Id') ?>
                            </th>
                            <th scope="col">
                                <?= __('Created') ?>
                            </th>
                            <th scope="col">
                                <?= __('Available') ?>
                            </th>
                            <th scope="col" class="actions">
                                <?= __('Actions') ?>
                            </th>
                        </tr>
                        <?php foreach ($sponsorship as $sponsoredItems) : ?>
                        <tr>
                            <td>
                                <?= h($sponsoredItems->name) ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->amount) ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->description) ?>
                            </td>
                            <td>
                                <?= $this->Form->create($sponsor) ?>
                                <fieldset>
                                    <legend>
                                        <?= __('Add Sponsor') ?>
                                    </legend>
                                    <?php
                                    echo $this->Form->hidden('user_id', ['value' => $var['User']['id']]);
                                    echo $this->Form->hidden('sponsored_item_id', ['value' => $sponsoredItems->id]);
                                    echo $this->Form->hidden('sponsorships_id', ['value' => $sponsoredItems->sponsorship_id]);
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Submit')) ?>
                                <?= $this->Form->end() ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->sponsored_level_id) ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->user_id) ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->created) ?>
                            </td>
                            <td>
                                <?= h($sponsoredItems->unavailable) ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SponsoredItems', 'action' => 'view', $sponsoredItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SponsoredItems', 'action' => 'edit', $sponsoredItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SponsoredItems', 'action' => 'delete', $sponsoredItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsoredItems->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
                <div class="col-md-4">
                    <h3>Cart</h3>
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                </th>
                                <th scope="col">
                                    <?= h(77) ?>
                                </th>
                                <th scope="col">
                                    <?= h(77) ?>
                                </th>
                                <th scope="col" class="actions">
                                    <?= __('Actions') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount = 0; ?>
                            <?php foreach ($sponsorlist as $sponsorlist) : ?>
                            <?php $total_amount = $total_amount + $sponsorlist->sponsored_item->amount; ?>
                            <tr>
                                <td>
                                    <?= $sponsorlist->has('sponsored_item') ? $this->Html->link($sponsorlist->sponsored_item->name, ['controller' => 'SponsoredItems', 'action' => 'view', $sponsorlist->sponsored_item->id]) : '' ?>
                                </td>
                                <td>
                                    <?= $sponsorlist->has('sponsored_item') ? $this->Number->currency($sponsorlist->sponsored_item->amount, 'USD') : '' ?>
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