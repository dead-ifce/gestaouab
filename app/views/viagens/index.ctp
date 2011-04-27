<div class="viagens index">
	<h2><?php __('Viagens');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tipo_transporte_id');?></th>
			<th><?php echo $this->Paginator->sort('dataSaida');?></th>
			<th><?php echo $this->Paginator->sort('dataRetorno');?></th>
			<th><?php echo $this->Paginator->sort('objetivo');?></th>
			<th><?php echo $this->Paginator->sort('origem');?></th>
			<th><?php echo $this->Paginator->sort('destino');?></th>
			<th><?php echo $this->Paginator->sort('diaria');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id');?></th>
			<th><?php echo $this->Paginator->sort('convenio_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($viagens as $viagem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $viagem['Viagem']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($viagem['TipoTransporte']['id'], array('controller' => 'tipo_transportes', 'action' => 'view', $viagem['TipoTransporte']['id'])); ?>
		</td>
		<td><?php echo $viagem['Viagem']['dataSaida']; ?>&nbsp;</td>
		<td><?php echo $viagem['Viagem']['dataRetorno']; ?>&nbsp;</td>
		<td><?php echo $viagem['Viagem']['objetivo']; ?>&nbsp;</td>
		<td><?php echo $viagem['Viagem']['origem']; ?>&nbsp;</td>
		<td><?php echo $viagem['Viagem']['destino']; ?>&nbsp;</td>
		<td><?php echo $viagem['Viagem']['diaria']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($viagem['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $viagem['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viagem['Convenio']['id'], array('controller' => 'convenios', 'action' => 'view', $viagem['Convenio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $viagem['Viagem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $viagem['Viagem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $viagem['Viagem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $viagem['Viagem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Viagem', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Transportes', true), array('controller' => 'tipo_transportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Transporte', true), array('controller' => 'tipo_transportes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios', true), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario', true), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios', true), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio', true), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Aviaos', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Aviao', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Carros', true), array('controller' => 'dados_viagem_carros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Carro', true), array('controller' => 'dados_viagem_carros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>