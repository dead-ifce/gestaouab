<div class="cursos form">
<?php echo $this->Form->create('Curso');?>
	<fieldset>
 		<legend><?php __('Edit Curso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('Disciplina');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Curso.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Curso.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
	</ul>
</div>