<ul class="list-inline">
<li><?= $this->Html->link('Announcements', ['plugin' => false, 'controller' => 'announcements']);?> | </li>
<li><?= $this->Html->link('Awards', ['plugin' => false, 'controller' => 'awards']);?> | </li>
<li><?= $this->Html->link('* Votes', ['plugin' => false, 'controller' => 'votes']);?> | </li>
<li><?= $this->Html->link('* Lists', ['plugin' => false, 'controller' => 'dropdowns']);?> | </li>
<li><?= $this->Html->link('* Nominations', ['plugin' => false, 'controller' => 'dropdowns']);?> | </li>
<li><?= $this->Html->link('* Document Library', ['plugin' => false, 'controller' => 'dropdowns']);?> | </li>
<!--
<li><?= $this->Html->link(__("Current"), array('plugin'=>'usermgmt', 'controller'=>'users', 'action'=>'reset_membership', 1)) ?> | </li>
<li><?= $this->Html->link(__("Pending"), array('plugin'=>'usermgmt', 'controller'=>'users', 'action'=>'reset_membership', 0)) ?> | </li>
<li><?= $this->Html->link(__("Membership"), ['plugin'=>'usermgmt', 'controller'=>'users', 'action'=>'membership']) ?> | </li>
-->
<li><?= $this->Html->link(__("Conferences"), ['plugin'=> false, 'controller'=>'conferences', 'action'=>'index']) ?> | </li>
<li><?= $this->Html->link(__("Fees"), ['plugin'=> false, 'controller'=>'fees', 'action'=>'index']) ?> | </li>
<li><?= $this->Html->link(__("Registrations"), ['plugin'=> false, 'controller'=>'registrations', 'action'=>'index']) ?> | </li>
<li><?= $this->Html->link(__("Transactions"), ['plugin'=> false, 'controller'=>'transactions', 'action'=>'index']) ?> | </li>
<li><?= $this->Html->link(__("My Transactions"), ['plugin'=> false, 'controller'=>'transactions', 'action'=>'myTransactions']) ?> | </li>
</ul>
