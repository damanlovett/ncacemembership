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
            <?= $this->Html->link(__('New Sponsor'), ['action' => 'add']) ?>
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
<div class="sponsors index content panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Sponsorships') ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">




        <table class="table table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <th scope="col" class="nowrap">
                        <?= h('Member') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('sponsored_item_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('sponsorships_id') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('processed') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('created', 'Submitted') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $previous = ''; ?>
                <?php foreach ($sponsors as $sponsor) : ?>

                <td>

                    <?php if ($previous == $sponsor->user->id) {
                        echo '';

                    } else { ?>
                    <?= $this->Html->link(
                        '<span class="fa fa-edit"></span><span class="sr-only">' . __('Process') . '</span>',
                        ['action' => 'mview', $sponsor->sponsorship->id, $sponsor->user->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-l']
                    ) ?>
                    <?= $sponsor->has('user') ? $sponsor->user->last_name . ", " . $sponsor->user->first_name : '' ?>
                    <?php

                } ?>
                </td>







                <td>
                    <?= $sponsor->has('sponsored_item') ? $sponsor->sponsored_item->name : '' ?>
                </td>
                <td style="text-align:center">
                    <?= $sponsor->has('sponsorship') ? $this->Text->truncate($sponsor->sponsorship->name, 4, [
                        'ellipsis' => '',
                        'exact' => true,
                        'html' => false
                    ]) : '' ?>
                </td>
                <td>
                    <?php if ($this->Number->format($sponsor->processed) == 1) {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    } ?>
                </td>
                <td>
                    <?= h($sponsor->created) ?>
                </td style="text-align:center">
                <td class="actions">
                    <?= $this->Form->postLink(
                        '<span class="fas fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                        ['action' => 'delete', $sponsor->id],
                        [
                            'confirm' => __('Are you sure you want to delete item?', $sponsor->id),
                            'escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-l'
                        ]
                    ) ?>
                </td>
                </tr>

                <?php $previous = $sponsor->user->id;
                endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p>
                <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    </div>
</div>