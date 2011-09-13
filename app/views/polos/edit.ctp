<div class="polos form">
<?php echo $this->Form->create('Polo');?>
	<fieldset>
 		<legend><?php __('Edit Polo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('Curso');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Polo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Polo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>