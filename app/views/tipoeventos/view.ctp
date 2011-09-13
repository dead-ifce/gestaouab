<div class="tipoeventos view">
<h2><?php  __('Tipoevento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tipoevento['Tipoevento']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tipoevento['Tipoevento']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipoevento', true), array('action' => 'edit', $tipoevento['Tipoevento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tipoevento', true), array('action' => 'delete', $tipoevento['Tipoevento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tipoevento['Tipoevento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoeventos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventos', true), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento', true), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Eventos');?></h3>
	<?php if (!empty($tipoevento['Evento'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tipoevento Id'); ?></th>
		<th><?php __('Polo Id'); ?></th>
		<th><?php __('Disciplina Id'); ?></th>
		<th><?php __('Turma Id'); ?></th>
		<th><?php __('Inicio'); ?></th>
		<th><?php __('Fim'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipoevento['Evento'] as $evento):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $evento['id'];?></td>
			<td><?php echo $evento['tipoevento_id'];?></td>
			<td><?php echo $evento['polo_id'];?></td>
			<td><?php echo $evento['disciplina_id'];?></td>
			<td><?php echo $evento['turma_id'];?></td>
			<td><?php echo $evento['inicio'];?></td>
			<td><?php echo $evento['fim'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'eventos', 'action' => 'view', $evento['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'eventos', 'action' => 'edit', $evento['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'eventos', 'action' => 'delete', $evento['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evento', true), array('controller' => 'eventos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
