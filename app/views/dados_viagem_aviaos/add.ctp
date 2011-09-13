<div class="dadosViagemAviaos form">
<?php echo $this->Form->create('DadosViagemAviao');?>
	<fieldset>
 		<legend><?php __('Add Dados Viagem Aviao'); ?></legend>
	<?php
		echo $this->Form->input('viagem_id');
		echo $this->Form->input('voo');
		echo $this->Form->input('ticket');
		echo $this->Form->input('companhiaida');
		echo $this->Form->input('companhiavolta');
		echo $this->Form->input('horaida');
		echo $this->Form->input('horavolta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dados Viagem Aviaos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>