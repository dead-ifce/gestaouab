<div class="viagens form">
<?php echo $this->Form->create('Viagem');?>
	<fieldset>
 		<legend><?php __('Edit Viagem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo_transporte_id');
		echo $this->Form->input('dataSaida');
		echo $this->Form->input('dataRetorno');
		echo $this->Form->input('objetivo');
		echo $this->Form->input('origem');
		echo $this->Form->input('destino');
		echo $this->Form->input('diaria');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('convenio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Viagem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Viagem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tipo Transportes', true), array('controller' => 'tipo_transportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Transporte', true), array('controller' => 'tipo_transportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios', true), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario', true), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios', true), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio', true), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Aviaos', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Aviao', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Carros', true), array('controller' => 'dados_viagem_carros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Carro', true), array('controller' => 'dados_viagem_carros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>