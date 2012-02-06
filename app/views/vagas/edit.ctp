<div class="vagas form">
<?php echo $this->Form->create('Vaga');?>
	<fieldset>
 		<legend><?php __('Edit Vaga'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('edital_id');
		echo $this->Form->input('polo_id');
		echo $this->Form->input('curso_id');
		echo $this->Form->input('disciplina_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Vaga.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Vaga.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vagas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Editais', true), array('controller' => 'editais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edital', true), array('controller' => 'editais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
	</ul>
</div>