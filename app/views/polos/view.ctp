<div class="polos view">
<h2><?php  __('Polo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $polo['Polo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $polo['Polo']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Polo', true), array('action' => 'edit', $polo['Polo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Polo', true), array('action' => 'delete', $polo['Polo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $polo['Polo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Turmas');?></h3>
	<?php if (!empty($polo['Turma'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Polo Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($polo['Turma'] as $turma):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $turma['id'];?></td>
			<td><?php echo $turma['nome'];?></td>
			<td><?php echo $turma['polo_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'turmas', 'action' => 'view', $turma['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'turmas', 'action' => 'edit', $turma['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'turmas', 'action' => 'delete', $turma['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $turma['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Cursos');?></h3>
	<?php if (!empty($polo['Curso'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($polo['Curso'] as $curso):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $curso['id'];?></td>
			<td><?php echo $curso['nome'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'cursos', 'action' => 'view', $curso['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'cursos', 'action' => 'edit', $curso['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'cursos', 'action' => 'delete', $curso['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $curso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
