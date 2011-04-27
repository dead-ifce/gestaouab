<div class="dadosViagemOnibuses form">
<?php echo $this->Form->create('DadosViagemOnibus');?>
	<fieldset>
 		<legend><?php __('Add Dados Viagem Onibus'); ?></legend>
	<?php
		echo $this->Form->input('viagem_id');
		echo $this->Form->input('codigoBilhete');
		echo $this->Form->input('companhia_id');
		echo $this->Form->input('tarifa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companhias', true), array('controller' => 'companhias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companhia', true), array('controller' => 'companhias', 'action' => 'add')); ?> </li>
	</ul>
</div>