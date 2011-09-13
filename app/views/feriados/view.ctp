<div class="feriados view">
<h2><?php  __('Feriado');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feriado['Feriado']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feriado['Feriado']['data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feriado['Feriado']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feriado', true), array('action' => 'edit', $feriado['Feriado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Feriado', true), array('action' => 'delete', $feriado['Feriado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $feriado['Feriado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feriados', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feriado', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
