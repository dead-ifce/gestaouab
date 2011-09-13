<div class="cursos view">
<h2><?php  __('Curso');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curso['Curso']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curso['Curso']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Curso', true), array('action' => 'edit', $curso['Curso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Curso', true), array('action' => 'delete', $curso['Curso']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $curso['Curso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Disciplinas');?></h3>
	<?php if (!empty($curso['Disciplina'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Numsemana'); ?></th>
		<th><?php __('Semestre'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($curso['Disciplina'] as $disciplina):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $disciplina['id'];?></td>
			<td><?php echo $disciplina['nome'];?></td>
			<td><?php echo $disciplina['numsemana'];?></td>
			<td><?php echo $disciplina['semestre'];?></td>
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
