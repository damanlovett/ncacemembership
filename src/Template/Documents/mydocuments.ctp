<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title">
			<?php echo __('My Documents'); ?>
		</span>
		<span class="panel-title-right">
			<?php echo $this->Html->link(__('Add Document', true), ['action'=>'add'], ['class'=>'btn btn-default']); ?>
		</span>
		<span class="panel-title-right">
			<?php echo $this->Html->link(__('All Documents', true), ['action'=>'index'], ['class'=>'btn btn-default']); ?>
		</span>
	</div>
	<div class="panel-body">
		<?php echo $this->element('../Documents/all_mydocuments'); ?>
	</div>
</div>