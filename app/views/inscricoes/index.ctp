<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Inscrições</h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			<div class="span16 columns">
				<table cellpadding="0" cellspacing="0">
				<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Vaga</th>
						<th>Dia</th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
				<?php foreach ($inscricoes as $inscricao):?>
				<tr>
					<td><?php echo $inscricao['Inscricao']['id']; ?></td>
					<td>
						<?php echo $inscricao['Pessoa']['nome']; ?>
					</td>
					<td><?php echo $inscricao['Vaga']['Polo']['nome']."/".$inscricao['Vaga']['Curso']['nome']."/".$inscricao['Vaga']['Disciplina']['nome'] ?></td>
					<td><?php echo $inscricao['Inscricao']['created']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Apagar', true), array('action' => 'delete', $inscricao['Inscricao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inscricao['Inscricao']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
				</table>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->



	
