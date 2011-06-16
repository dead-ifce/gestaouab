<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Disciplinas</h2>
	</div>		<!-- .block_head ends -->
	
	
	
	<div class="block_content">
		
<div class="disciplinas index">
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


	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->
