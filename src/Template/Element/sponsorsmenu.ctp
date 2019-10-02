<span class="panel-title" style="font-size: 22px;">
    <div class="panel-title-right btn-group" role="group" aria-label="...">
        <?= $this->Html->link(__('Sponsors List'), ['controller' => 'usrs', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>

        <?= $this->Html->link(__('Add Sponsor'), ['controller' => 'usrs', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= $this->Html->link(__('Sponsorship List'), ['controller' => 'Sponsors', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>

        <?= $this->Html->link(__('View Form'), ['plugin' => false, 'controller' => 'usrs', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
</span>