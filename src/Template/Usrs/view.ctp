<?php

/**
 * @var \App\View\AppView $this
 */
?>

<div class="usrs view panel panel-success">

    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= h($usr->first_name . " " . $usr->last_name . " - " . $usr->organization) ?>
            <div class="panel-title-right">
                <?= $this->element('sponsorsmenu'); ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                <table class="vertical-table table-striped table-bordered table-condensed table-hover col-md-8">

                    <tr>
                        <th scope="row"><?= __('Phone') ?></th>
                        <td><?= h($usr->phone) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($usr->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($usr->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($usr->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr />
        <div class="related">
            <h4><?= __('Sponsorship') ?></h4>
            <?php if (!empty($sponsorlist)) : ?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                    <th scope="col"><?= __('Sponsored Item ') ?></th>
                    <th scope="col"><?= __('Amount') ?></th>
                    <th scope="col"><?= __('Submitted') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($sponsorlist as $sponsors) : ?>
                <tr>
                    <td><?= h($sponsors->sponsored_item->name) ?></td>
                    <td style="text-align:right;">
                        <?= $this->Number->currency($sponsors->sponsored_item->amount, 'USD') ?></td>
                    <td><?= h($sponsors->created) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sponsors', 'action' => 'delete', $sponsors->id], ['class' => 'btn btn-primary btn-xs', 'confirm' => __('Are you sure you want to delete this item?', $sponsors->sponsored_item->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>