<div class="calendarios view">
<h2><?php  __('Calendario');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $calendario['Calendario']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Curso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($calendario['Curso']['id'], array('controller' => 'cursos', 'action' => 'view', $calendario['Curso']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ano'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $calendario['Calendario']['ano']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Semestre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $calendario['Calendario']['semestre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendario', true), array('action' => 'edit', $calendario['Calendario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Calendario', true), array('action' => 'delete', $calendario['Calendario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calendario['Calendario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendarios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendario', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>
