<div class="convenios view">
<h2><?php  __('Convenio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $convenio['Convenio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $convenio['Convenio']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Convenio', true), array('action' => 'edit', $convenio['Convenio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Convenio', true), array('action' => 'delete', $convenio['Convenio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $convenio['Convenio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('controller' => 'viagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Viagens');?></h3>
	<?php if (!empty($convenio['Viagem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tipo Transporte Id'); ?></th>
		<th><?php __('DataSaida'); ?></th>
		<th><?php __('DataRetorno'); ?></th>
		<th><?php __('Objetivo'); ?></th>
		<th><?php __('Origem'); ?></th>
		<th><?php __('Destino'); ?></th>
		<th><?php __('Diaria'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Convenio Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($convenio['Viagem'] as $viagem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $viagem['id'];?></td>
			<td><?php echo $viagem['tipo_transporte_id'];?></td>
			<td><?php echo $viagem['dataSaida'];?></td>
			<td><?php echo $viagem['dataRetorno'];?></td>
			<td><?php echo $viagem['objetivo'];?></td>
			<td><?php echo $viagem['origem'];?></td>
			<td><?php echo $viagem['destino'];?></td>
			<td><?php echo $viagem['diaria'];?></td>
			<td><?php echo $viagem['usuario_id'];?></td>
			<td><?php echo $viagem['convenio_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'viagens', 'action' => 'view', $viagem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'viagens', 'action' => 'edit', $viagem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'viagens', 'action' => 'delete', $viagem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $viagem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Viagem', true), array('controller' => 'viagens', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
