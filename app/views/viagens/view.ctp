<div class="viagens view">
<h2><?php  __('Viagem');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo Transporte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($viagem['TipoTransporte']['id'], array('controller' => 'tipo_transportes', 'action' => 'view', $viagem['TipoTransporte']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DataSaida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['dataSaida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DataRetorno'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['dataRetorno']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Objetivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['objetivo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Origem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['origem']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Destino'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['destino']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diaria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $viagem['Viagem']['diaria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($viagem['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $viagem['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Convenio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($viagem['Convenio']['id'], array('controller' => 'convenios', 'action' => 'view', $viagem['Convenio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Viagem', true), array('action' => 'edit', $viagem['Viagem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Viagem', true), array('action' => 'delete', $viagem['Viagem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $viagem['Viagem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Viagens', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viagem', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Dados Viagem Aviaos');?></h3>
	<?php if (!empty($viagem['DadosViagemAviao'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Viagem Id'); ?></th>
		<th><?php __('Voo'); ?></th>
		<th><?php __('Ticket'); ?></th>
		<th><?php __('Companhiaida'); ?></th>
		<th><?php __('Companhiavolta'); ?></th>
		<th><?php __('Horaida'); ?></th>
		<th><?php __('Horavolta'); ?></th>
		<th><?php __('Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($viagem['DadosViagemAviao'] as $dadosViagemAviao):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $dadosViagemAviao['viagem_id'];?></td>
			<td><?php echo $dadosViagemAviao['voo'];?></td>
			<td><?php echo $dadosViagemAviao['ticket'];?></td>
			<td><?php echo $dadosViagemAviao['companhiaida'];?></td>
			<td><?php echo $dadosViagemAviao['companhiavolta'];?></td>
			<td><?php echo $dadosViagemAviao['horaida'];?></td>
			<td><?php echo $dadosViagemAviao['horavolta'];?></td>
			<td><?php echo $dadosViagemAviao['id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'view', $dadosViagemAviao['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'edit', $dadosViagemAviao['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'delete', $dadosViagemAviao['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemAviao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dados Viagem Aviao', true), array('controller' => 'dados_viagem_aviaos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Dados Viagem Carros');?></h3>
	<?php if (!empty($viagem['DadosViagemCarro'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Viagem Id'); ?></th>
		<th><?php __('Placa'); ?></th>
		<th><?php __('ValorCombustivel'); ?></th>
		<th><?php __('Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($viagem['DadosViagemCarro'] as $dadosViagemCarro):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $dadosViagemCarro['viagem_id'];?></td>
			<td><?php echo $dadosViagemCarro['placa'];?></td>
			<td><?php echo $dadosViagemCarro['valorCombustivel'];?></td>
			<td><?php echo $dadosViagemCarro['id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'dados_viagem_carros', 'action' => 'view', $dadosViagemCarro['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'dados_viagem_carros', 'action' => 'edit', $dadosViagemCarro['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'dados_viagem_carros', 'action' => 'delete', $dadosViagemCarro['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dadosViagemCarro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dados Viagem Carro', true), array('controller' => 'dados_viagem_carros', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Dados Viagem Onibuses');?></h3>
	<?php if (!empty($viagem['DadosViagemOnibus'])):?>
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
		foreach ($viagem['DadosViagemOnibus'] as $dadosViagemOnibus):
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
