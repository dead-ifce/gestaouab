<div class="companhias form">
<?php echo $this->Form->create('Companhia');?>
	<fieldset>
 		<legend><?php __('Add Companhia'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Companhias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>