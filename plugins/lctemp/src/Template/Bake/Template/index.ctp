<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>
<?php

/**
 * @var \<%= $namespace %>\View\AppView $this
 */
?>
<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= __('Actions') ?>
        </li>
        <li>
            <?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add']) ?>
        </li>
        <%
    $done = [];
    foreach ($associations as $type => $data):
        foreach ($data as $alias => $details):
            if (!empty($details['navLink']) && $details['controller'] !== $this->name && !in_array($details['controller'], $done)):
%>
        <li>
            <?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details[' controller '] %>', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details[' controller '] %>', 'action' => 'add']) ?>
        </li>
        <%
                $done[] = $details['controller'];
            endif;
        endforeach;
    endforeach;
%>
    </ul>
</nav>
<div class="<%= $pluralVar %> index panel panel-success">
    <div class="panel-heading">
        <span class="panel-title" style="font-size: 22px;">
            <?= __('<%= $pluralHumanName %>') ?>
            <div class="panel-title-right">
                <?= $this->Html->link('All Memberships', ['controller' => 'memberships', 'action' => 'all'], ['class' => 'btn btn-primary btn-sm']) ?>
                <div class='btn-group'>
                    <button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>Export Reports <span
                            class='caret'></span></button>
                    <ul class='dropdown-menu'>
                        <li>
                            <?= $this->Html->link('Processed', ['plugin' => false, 'controller' => 'memberships', 'action' => 'members_accounts', '1'], ['escape' => false]) ?>
                        </li>
                        <li>
                            <?= $this->Html->link('Unprocessed', ['controller' => 'memberships', 'action' => 'members_accounts', '0'], ['escape' => false]) ?>
                        </li>

                        <li>
                            <?= $this->Html->link('All', ['controller' => 'memberships', 'action' => 'all_accounts'], ['escape' => false]) ?>
                        </li>
                        <li>
                            <?= $this->Html->link('Mentors', ['plugin' => false, 'controller' => 'memberships', 'action' => 'mentor_accounts', $current->title], ['escape' => false]) ?>
                        </li>
                    </ul>
                </div>
                <?= $this->Html->link(__('Set All Member to Pending*'), ['plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'reset_membership', 0], ['class' => 'btn btn-success btn-sm']) ?>
            </div>
        </span>
    </div>
    <div class="panel-body">
        <?php $this->set('title', 'Index'); ?>
        <div class="alert alert-info" style="text-align: left;">
            <span>
                <p>
                    <strong>Pending membership accounts are waiting for processing. The following actions can be done
                        from
                        this sections.</strong>
                </p>
            </span>
            <ul>
                <li>Set all members to pending</li>
                <li>Process the membership</li>
                <li>Add transaction to the membership</li>
                <li>Delete membership</li>
                <li>Preview / Print Invoice</li>
            </ul>
            <p> The current year is
                <strong>
                    <?= $current->title; ?>
                </strong>
                <?= $this->Html->link('Change Current Year', ['controller' => 'blurbs', 'action' => 'change', '4'], ['class' => 'btn btn-primary btn-xs']) ?>
            </p>
        </div>



        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <% foreach ($fields as $field): %>
                    <th scope="col">
                        <?= $this->Paginator->sort('<%= $field %>') ?>
                    </th>
                    <% endforeach; %>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ < %= $pluralVar % > as $ < %= $singularVar % >) : ?>
                <tr>
                    <%        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
%>
                    <td>
                        <?= $ < %= $singularVar %> ->has('<%= $details[' property '] %>') ? $this->Html->link($ < %= $singularVar %>->< %= $details ['property'] % >->< %= $details ['displayField'] % > , ['controller' => '<%= $details[' controller '] %>', 'action' => 'view', $ < %= $singularVar %>->< %= $details ['property' ] %>->< %= $details ['primaryKey'] [0] % >] ) : '' ?>
                    </td>
                    <%
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
                    <td>
                        <?= h($ < %= $singularVar %>->< %= $field % > ) ?>
                    </td>
                    <%
                } else {
%>
                    <td>
                        <?= $this->Number->format($ < %= $singularVar %>->< %= $field % > ) ?>
                    </td>
                    <%
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', < %= $pk % >]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', < %= $pk % >]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', < %= $pk % >], ['confirm' => __('Are you sure you want to delete # {0}?', < %= $pk % >)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
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