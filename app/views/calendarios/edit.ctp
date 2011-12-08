<div class="calendarios form">
<?php echo $this->Form->create('Calendario');?>
	<fieldset>
 		<legend><?php __('Edit Calendario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('curso_id');
		echo $this->Form->input('ano');
		echo $this->Form->input('semestre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Calendario.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Calendario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calendarios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>