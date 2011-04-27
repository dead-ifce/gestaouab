<div class="turmas form">
<?php echo $this->Form->create('Turma');?>
	<fieldset>
 		<legend><?php __('Add Turma'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('curso_id');
		echo $this->Form->input('Disciplina');
		echo $this->Form->input('Polo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Turmas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
	</ul>
</div>