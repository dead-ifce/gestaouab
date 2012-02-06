<div class="inscricoes form">
<?php echo $this->Form->create('Inscricao');?>
	<fieldset>
 		<legend><?php __('Add Inscricao'); ?></legend>
	<?php
		echo $this->Form->input('pessoa_id');
		echo $this->Form->input('vaga_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Inscricoes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pessoas', true), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa', true), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vagas', true), array('controller' => 'vagas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaga', true), array('controller' => 'vagas', 'action' => 'add')); ?> </li>
	</ul>
</div>