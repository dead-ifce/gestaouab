<div class="disciplinas form">
<?php echo $this->Form->create('Disciplina');?>
	<fieldset>
 		<legend><?php __('Add Disciplina'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('carga');
		echo $this->Form->input('semestre');
		echo $this->Form->input('numsemanas');
		echo $this->Form->input('Curso');
		echo $this->Form->input('Turma');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
	</ul>
</div>