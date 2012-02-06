<div class="vagas view">
<h2><?php  __('Vaga');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vaga['Vaga']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Edital'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($vaga['Edital']['id'], array('controller' => 'editais', 'action' => 'view', $vaga['Edital']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Polo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($vaga['Polo']['id'], array('controller' => 'polos', 'action' => 'view', $vaga['Polo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Curso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($vaga['Curso']['id'], array('controller' => 'cursos', 'action' => 'view', $vaga['Curso']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disciplina'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($vaga['Disciplina']['id'], array('controller' => 'disciplinas', 'action' => 'view', $vaga['Disciplina']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vaga', true), array('action' => 'edit', $vaga['Vaga']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Vaga', true), array('action' => 'delete', $vaga['Vaga']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $vaga['Vaga']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vagas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaga', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Editais', true), array('controller' => 'editais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edital', true), array('controller' => 'editais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
