<div class="dadosViagemAviaos index">
	<h2><?php __('Dados Viagem Aviaos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('viagem_id');?></th>
			<th><?php echo $this->Paginator->sort('voo');?></th>
			<th><?php echo $this->Paginator->sort('ticket');?></th>
			<th><?php echo $this->Paginator->sort('companhiaida');?></th>
			<th><?php echo $this->Paginator->sort('companhiavolta');?></th>
			<th><?php echo $this->Paginator->sort('horaida');?></th>
			<th><?php echo $this->Paginator->sort('horavolta');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($dadosViagemAviaos as $dadosViagemAviao):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($dadosViagemAviao['Viagem']['id'], array('controller' => 'viagens', 'action' => 'view', $dadosViagemAviao['Viagem']['id'])); ?>
		</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['voo']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['ticket']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['companhiaida']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['companhiavolta']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['horaida']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['horavolta']; ?>&nbsp;</td>
		<td><?php echo $dadosViagemAviao['DadosViagemAviao']['id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $dadosViagemAviao['DadosViagemAviao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dadosViagemAviao['DadosViagemAviao']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $dadosViagemAviao['DadosViagemAviao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemAviao['DadosViagemAviao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dados Viagem Aviao', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>