<div class="feriados form">
<?php echo $this->Form->create('Feriado');?>
	<fieldset>
 		<legend><?php __('Edit Feriado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('data');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Feriado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Feriado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Feriados', true), array('action' => 'index'));?></li>
	</ul>
</div>