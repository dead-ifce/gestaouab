<div class="dadosViagemAviaos view">
<h2><?php  __('Dados Viagem Aviao');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viagem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($dadosViagemAviao['Viagem']['id'], array('controller' => 'viagens', 'action' => 'view', $dadosViagemAviao['Viagem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Voo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['voo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ticket'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['ticket']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Companhiaida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['companhiaida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Companhiavolta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['companhiavolta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horaida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['horaida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horavolta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['horavolta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dadosViagemAviao['DadosViagemAviao']['id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dados Viagem Aviao', true), array('action' => 'edit', $dadosViagemAviao['DadosViagemAviao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Dados Viagem Aviao', true), array('action' => 'delete', $dadosViagemAviao['DadosViagemAviao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemAviao['DadosViagemAviao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Aviaos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Aviao', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
