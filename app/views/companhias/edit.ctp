<div class="companhias form">
<?php echo $this->Form->create('Companhia');?>
	<fieldset>
 		<legend><?php __('Edit Companhia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Companhia.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Companhia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Companhias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>