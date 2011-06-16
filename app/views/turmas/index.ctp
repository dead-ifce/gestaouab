<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Turmas</h2>
	</div>		<!-- .block_head ends -->
	
	
	
	<div class="block_content">
	
		<div class="turmas index">
			<table cellpadding="0" cellspacing="0">
			<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('nome');?></th>
					<th><?php echo $this->Paginator->sort('curso_id');?></th>
					<th class="actions"><?php __('Ações');?></th>
			</tr>
			<?php
			$i = 0;
			foreach ($turmas as $turma):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $turma['Turma']['id']; ?>&nbsp;</td>
				<td><?php echo $turma['Turma']['nome']; ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($turma['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $turma['Curso']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View', true), array('action' => 'view', $turma['Turma']['id'])); ?>
					<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $turma['Turma']['id'])); ?>
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $turma['Turma']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $turma['Turma']['id'])); ?>
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


