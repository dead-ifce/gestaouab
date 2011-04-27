<div class="eventos form">
<?php echo $this->Form->create('Evento');?>
	<fieldset>
 		<legend><?php __('Edit Evento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipoevento_id');
		echo $this->Form->input('disciplina_id');
		echo $this->Form->input('turma_id');
		echo $this->Form->input('inicio');
		echo $this->Form->input('fim');
		echo $this->Form->input('carga_horaria');
		echo $this->Form->input('turno');
		echo $this->Form->input('Polo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Evento.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Evento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Eventos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tipoeventos', true), array('controller' => 'tipoeventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento', true), array('controller' => 'tipoeventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
	</ul>
</div>