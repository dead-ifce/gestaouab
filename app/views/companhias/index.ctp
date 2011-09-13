<div class="companhias index">
	<h2><?php __('Companhias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nome');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($companhias as $companhia):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $companhia['Companhia']['id']; ?>&nbsp;</td>
		<td><?php echo $companhia['Companhia']['nome']; ?>&nbsp;</td>
		<td><?php echo $companhia['Companhia']['tipo']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $companhia['Companhia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $companhia['Companhia']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $companhia['Companhia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $companhia['Companhia']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Companhia', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>