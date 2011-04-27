<div class="dadosViagemCarros form">
<?php echo $this->Form->create('DadosViagemCarro');?>
	<fieldset>
 		<legend><?php __('Add Dados Viagem Carro'); ?></legend>
	<?php
		echo $this->Form->input('viagem_id');
		echo $this->Form->input('placa');
		echo $this->Form->input('valorCombustivel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dados Viagem Carros', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>