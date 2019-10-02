<?php

/**
 * @var \App\View\AppView $this
 */
?>

<div class="usrs form panel panel-success content" id="top">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Sponsorship Contact Information <small>[ step 1 of 2 ]</small>') ?>
            <div class="panel-title-right">
                <?= $this->Html->link(__('Return Home'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'dashboard'], ['class' => 'btn btn-primary btn-sm']) ?>

            </div>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->Form->create($usr) ?>
        <fieldset style="border:none;">
            <div class="form-group col-xs-4">
                <?= $this->Form->input('first_name', ['class' => 'form-control']); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $this->Form->input('last_name', ['class' => 'form-control']); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $this->Form->input('organization', ['class' => 'form-control']); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $this->Form->input('phone', ['class' => 'form-control']); ?>
            </div>
            <div class="form-group col-xs-4">
                <?= $this->Form->input('email', ['class' => 'form-control']); ?>
            </div>
        </fieldset>
        <div class="form-group col-xs-4">

            <?= $this->Form->button(__('Enter Contact Info')) ?>
            <?= $this->Form->end() ?>
        </div>
        <hr />
        <div class="col-md-12">

            <?php if (!empty($sponsorship)) : ?>
            <table class="table table-bordered table-condensed table-hover">
                <?php $previous = ''; ?>
                <?php foreach ($sponsorship as $sponsoredItems) : ?>
                <?php if ($previous == $sponsoredItems->sponsored_level->name) {
                    echo '<tr>';
                } else { ?>
                <tr>
                    <td colspan="5" style="
                    ; color:white;">
                        <strong>
                            <?= h($sponsoredItems->sponsored_level->name) ?></strong>
                        <div class="pull-right text-primary">[&nbsp;<a href="#top">Back to the
                                top </a>&nbsp;]</div>

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

        [&nbsp;<a href="#top">Back to the top </a>&nbsp;]

    </div>


</div>