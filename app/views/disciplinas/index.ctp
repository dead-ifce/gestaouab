<div class="disciplinas index">
	<h2><?php __('Disciplinas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nome');?></th>
			<th><?php echo $this->Paginator->sort('carga');?></th>
			<th><?php echo $this->Paginator->sort('semestre');?></th>
			<th><?php echo $this->Paginator->sort('numsemanas');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($disciplinas as $disciplina):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $disciplina['Disciplina']['id']; ?>&nbsp;</td>
		<td><?php echo $disciplina['Disciplina']['nome']; ?>&nbsp;</td>
		<td><?php echo $disciplina['Disciplina']['carga']; ?>&nbsp;</td>
		<td><?php echo $disciplina['Disciplina']['semestre']; ?>&nbsp;</td>
		<td><?php echo $disciplina['Disciplina']['numsemanas']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $disciplina['Disciplina']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $disciplina['Disciplina']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $disciplina['Disciplina']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disciplina['Disciplina']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Disciplina', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
	</ul>
</div>