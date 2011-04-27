<div class="eventos index">
	<h2><?php __('Eventos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tipoevento_id');?></th>
			<th><?php echo $this->Paginator->sort('disciplina_id');?></th>
			<th><?php echo $this->Paginator->sort('turma_id');?></th>
			<th><?php echo $this->Paginator->sort('inicio');?></th>
			<th><?php echo $this->Paginator->sort('fim');?></th>
			<th><?php echo $this->Paginator->sort('carga_horaria');?></th>
			<th><?php echo $this->Paginator->sort('turno');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eventos as $evento):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $evento['Evento']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evento['Tipoevento']['id'], array('controller' => 'tipoeventos', 'action' => 'view', $evento['Tipoevento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evento['Disciplina']['id'], array('controller' => 'disciplinas', 'action' => 'view', $evento['Disciplina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evento['Turma']['id'], array('controller' => 'turmas', 'action' => 'view', $evento['Turma']['id'])); ?>
		</td>
		<td><?php echo $evento['Evento']['inicio']; ?>&nbsp;</td>
		<td><?php echo $evento['Evento']['fim']; ?>&nbsp;</td>
		<td><?php echo $evento['Evento']['carga_horaria']; ?>&nbsp;</td>
		<td><?php echo $evento['Evento']['turno']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evento['Evento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evento['Evento']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evento['Evento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evento['Evento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evento', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoeventos', true), array('controller' => 'tipoeventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento', true), array('controller' => 'tipoeventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('controller' => 'disciplinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('controller' => 'disciplinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polos', true), array('controller' => 'polos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Polo', true), array('controller' => 'polos', 'action' => 'add')); ?> </li>
	</ul>
</div>