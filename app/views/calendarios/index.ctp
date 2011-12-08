<div class="calendarios index">
	<h2><?php __('Calendarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('curso_id');?></th>
			<th><?php echo $this->Paginator->sort('ano');?></th>
			<th><?php echo $this->Paginator->sort('semestre');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calendarios as $calendario):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $calendario['Calendario']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calendario['Curso']['id'], array('controller' => 'cursos', 'action' => 'view', $calendario['Curso']['id'])); ?>
		</td>
		<td><?php echo $calendario['Calendario']['ano']; ?>&nbsp;</td>
		<td><?php echo $calendario['Calendario']['semestre']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $calendario['Calendario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $calendario['Calendario']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $calendario['Calendario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calendario['Calendario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calendario', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>