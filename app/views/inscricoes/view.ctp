<div class="inscricoes view">
<h2><?php  __('Inscricao');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inscricao['Inscricao']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pessoa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inscricao['Pessoa']['id'], array('controller' => 'pessoas', 'action' => 'view', $inscricao['Pessoa']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Vaga'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inscricao['Vaga']['id'], array('controller' => 'vagas', 'action' => 'view', $inscricao['Vaga']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inscricao['Inscricao']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inscricao', true), array('action' => 'edit', $inscricao['Inscricao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Inscricao', true), array('action' => 'delete', $inscricao['Inscricao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inscricao['Inscricao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Inscricoes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inscricao', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pessoas', true), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa', true), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vagas', true), array('controller' => 'vagas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaga', true), array('controller' => 'vagas', 'action' => 'add')); ?> </li>
	</ul>
</div>
