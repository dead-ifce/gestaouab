<div class="tipoeventos form">
<?php echo $this->Form->create('Tipoevento');?>
	<fieldset>
 		<legend><?php __('Add Tipoevento'); ?></legend>
	<?php
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipoeventos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Eventos', true), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento', true), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
	</ul>
</div>