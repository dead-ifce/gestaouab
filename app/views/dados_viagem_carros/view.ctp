<div class="dadosViagemCarros view">
<h2><?php  __('Dados Viagem Carro');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viagem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($dadosViagemCarro['Viagem']['id'], array('controller' => 'viagens', 'action' => 'view', $dadosViagemCarro['Viagem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Placa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemCarro['DadosViagemCarro']['placa']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ValorCombustivel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemCarro['DadosViagemCarro']['valorCombustivel']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemCarro['DadosViagemCarro']['id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dados Viagem Carro', true), array('action' => 'edit', $dadosViagemCarro['DadosViagemCarro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Dados Viagem Carro', true), array('action' => 'delete', $dadosViagemCarro['DadosViagemCarro']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemCarro['DadosViagemCarro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Carros', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Carro', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
