<div class="turmas view">
<h2><?php  __('Turma');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $turma['Turma']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $turma['Turma']['nome']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Curso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($turma['Curso']['id'], array('controller' => 'cursos', 'action' => 'view', $turma['Curso']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Turma', true), array('action' => 'edit', $turma['Turma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Turma', true), array('action' => 'delete', $turma['Turma']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $turma['Turma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Disciplinas');?></h3>
	<?php if (!empty($turma['Disciplina'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Carga'); ?></th>
		<th><?php __('Semestre'); ?></th>
		<th><?php __('Numsemanas'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($turma['Disciplina'] as $disciplina):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $disciplina['id'];?></td>
			<td><?php echo $disciplina['nome'];?></td>
			<td><?php echo $disciplina['carga'];?></td>
			<td><?php echo $disciplina['semestre'];?></td>
			<td><?php echo $disciplina['numsemanas'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'disciplinas', 'action' => 'view', $disciplina['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'disciplinas', 'action' => 'edit', $disciplina['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'disciplinas', 'action' => 'delete', $disciplina['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disciplina['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Polos');?></h3>
	<?php if (!empty($turma['Polo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($turma['Polo'] as $polo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $polo['id'];?></td>
			<td><?php echo $polo['nome'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'polos', 'action' => 'view', $polo['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'polos', 'action' => 'edit', $polo['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'polos', 'action' => 'delete', $polo['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $polo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
