<div class="vagas index">
	<h2><?php __('Vagas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>#</th>
			<th>Edital</th>
			<th>Polo</th>
			<th>Curso</th>
			<th>Disciplina</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($vagas as $vaga):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $vaga['Vaga']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vaga['Edital']['id'], array('controller' => 'editais', 'action' => 'view', $vaga['Edital']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vaga['Polo']['id'], array('controller' => 'polos', 'action' => 'view', $vaga['Polo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vaga['Curso']['id'], array('controller' => 'cursos', 'action' => 'view', $vaga['Curso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vaga['Disciplina']['id'], array('controller' => 'disciplinas', 'action' => 'view', $vaga['Disciplina']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $vaga['Vaga']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $vaga['Vaga']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $vaga['Vaga']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $vaga['Vaga']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Vaga', true), array('action' => 'add')); ?></li>
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