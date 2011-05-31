<div class="dadosViagemCarros index">
	<h2><?php __('Dados Viagem Carros');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('viagem_id');?></th>
			<th><?php echo $this->Paginator->sort('placa');?></th>
			<th><?php echo $this->Paginator->sort('valorCombustivel');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($dadosViagemCarros as $dadosViagemCarro):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($dadosViagemCarro['Viagem']['id'], array('controller' => 'viagens', 'action' => 'view', $dadosViagemCarro['Viagem']['id'])); ?>
		</td>
		<td><?php echo $dadosViagemCarro['DadosViagemCarro']['placa']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemCarro['DadosViagemCarro']['valorCombustivel']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemCarro['DadosViagemCarro']['id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $dadosViagemCarro['DadosViagemCarro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dadosViagemCarro['DadosViagemCarro']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $dadosViagemCarro['DadosViagemCarro']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemCarro['DadosViagemCarro']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dados Viagem Carro', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>