<div class="dadosViagemCarros form">
<?php echo $this->Form->create('DadosViagemCarro');?>
	<fieldset>
 		<legend><?php __('Edit Dados Viagem Carro'); ?></legend>
	<?php
		echo $this->Form->input('viagem_id');
		echo $this->Form->input('placa');
		echo $this->Form->input('valorCombustivel');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('DadosViagemCarro.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('DadosViagemCarro.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Carros', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>