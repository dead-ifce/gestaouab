<div class="dadosViagemOnibuses view">
<h2><?php  __('Dados Viagem Onibus');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viagem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($dadosViagemOnibus['Viagem']['id'], array('controller' => 'viagens', 'action' => 'view', $dadosViagemOnibus['Viagem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CodigoBilhete'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemOnibus['DadosViagemOnibus']['codigoBilhete']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Companhia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($dadosViagemOnibus['Companhia']['id'], array('controller' => 'companhias', 'action' => 'view', $dadosViagemOnibus['Companhia']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tarifa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemOnibus['DadosViagemOnibus']['tarifa']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemOnibus['DadosViagemOnibus']['id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dados Viagem Onibus', true), array('action' => 'edit', $dadosViagemOnibus['DadosViagemOnibus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Dados Viagem Onibus', true), array('action' => 'delete', $dadosViagemOnibus['DadosViagemOnibus']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemOnibus['DadosViagemOnibus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companhias', true), array('controller' => 'companhias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companhia', true), array('controller' => 'companhias', 'action' => 'add')); ?> </li>
	</ul>
</div>
