<div class="companhias view">
<h2><?php  __('Companhia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $companhia['Companhia']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $companhia['Companhia']['nome']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $companhia['Companhia']['tipo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Companhia', true), array('action' => 'edit', $companhia['Companhia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Companhia', true), array('action' => 'delete', $companhia['Companhia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $companhia['Companhia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companhias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companhia', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dados Viagem Onibuses', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Dados Viagem Onibuses');?></h3>
	<?php if (!empty($companhia['DadosViagemOnibus'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Viagem Id'); ?></th>
		<th><?php __('CodigoBilhete'); ?></th>
		<th><?php __('Companhia Id'); ?></th>
		<th><?php __('Tarifa'); ?></th>
		<th><?php __('Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($companhia['DadosViagemOnibus'] as $dadosViagemOnibus):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $dadosViagemOnibus['viagem_id'];?></td>
			<td><?php echo $dadosViagemOnibus['codigoBilhete'];?></td>
			<td><?php echo $dadosViagemOnibus['companhia_id'];?></td>
			<td><?php echo $dadosViagemOnibus['tarifa'];?></td>
			<td><?php echo $dadosViagemOnibus['id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'view', $dadosViagemOnibus['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'edit', $dadosViagemOnibus['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'delete', $dadosViagemOnibus['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemOnibus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dados Viagem Onibus', true), array('controller' => 'dados_viagem_onibuses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
