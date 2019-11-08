<?php

/**
 * @var \App\View\AppView $this
 */
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('Pending Membership Accounts') ?>
            <div class="panel-title-right">
                <?= $this->Html->link('All Memberships', ['controller' => 'memberships',    'action' => 'all'], ['class' => 'btn btn-primary btn-sm']) ?>
                <div class='btn-group'>
                    <button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>Export Reports <span
                            class='caret'></span></button>
                    <ul class='dropdown-menu'>
                        <li><?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;Processed", ['plugin' => false, 'controller' => 'memberships', 'action' => 'members_accounts', '1'], ['escape' => false]) ?>
                        </li>
                        <li><?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;Unprocessed", ['controller' => 'memberships',    'action' => 'members_accounts', '0'], ['escape' => false]) ?>
                        </li>
                        <li><?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;Mentors", ['plugin' => false, 'controller' => 'memberships', 'action' => 'mentor_accounts', $current->title], ['escape' => false]) ?>
                        </li>

                        <li><?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;All Memberships", ['controller' => 'memberships',    'action' => 'all_accounts'], ['escape' => false]) ?>
                        </li>
                        <li>
                            <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;Active Members", ['controller' => 'users', 'action' => 'members_status', '1'], ['escape' => false]) ?>
                        </li>






                    </ul>
                </div>
                <?= $this->Html->link(__('Set All Member to Pending*'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'reset_membership', 0], ['class' => 'btn btn-success btn-sm']) ?>
            </div>
        </span>
    </div>
    <div class="panel-body">
        <?php echo $this->element('membership'); ?>



    </div>
</div>