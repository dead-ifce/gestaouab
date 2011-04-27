<div class="convenios form">
<?php echo $this->Form->create('Convenio');?>
	<fieldset>
 		<legend><?php __('Edit Convenio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Convenio.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Convenio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Convenios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>