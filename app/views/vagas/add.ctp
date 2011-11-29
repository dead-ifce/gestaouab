<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script >
$(function() {
});
$(document).ready(function() {
	$("table#table_vagas").tablesorter({ sortList: [[0,1]] });
	
		$.post("<?php echo Dispatcher::baseUrl();?>/vagas/getDisciplinasByCurso/" + $("#VagaCursoId").val(), function(data) {
	        $("#VagaDisciplinaId").empty().append(data);
	    }, 'html');
	
		$("#VagaCursoId").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/vagas/getDisciplinasByCurso/" + $(this).val(), function(data) {
		        $("#VagaDisciplinaId").empty().append(data);
		    }, 'html');
		});
	
	
	
});
</script>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar vaga para edital:  <?php echo $edital['Edital']['numero']."/".$edital['Edital']['ano']; ?></h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			<div class="span15 columns">
				
				<table id="table_vagas" class="zebra-striped">
					<thead>
						<tr>
							<th>Campus</th>
							<th>Curso</th>
							<th>Disciplina</th>
							<th>Ação</th>
						</tr>
				 	</thead>
					<tbody>
					<?php foreach($vagas as $vaga): ?>
						<tr>
							<td><?php echo $vaga['Polo']['nome'] ?></td>
							<td><?php echo $vaga['Curso']['nome'] ?></td>
							<td><?php echo $vaga['Disciplina']['nome'] ?></td>
							<!--
							<td><?php echo $this->Html->link(__('Apagar', true), array('action' => 'delete', $vaga['Vaga']['id']), null, sprintf(__('Você tem certeza que deseja apagar esta vaga?', true), $vaga['Vaga']['id'])); ?></td>
							-->
							<td>
							<?php echo $this->Html->link(
							$this->Html->image('del_btn.png',array('alt'=> __('Deletar pessoas', true), 'border' => '0')),array('action'=>'delete', $vaga['Vaga']['id']),array('target' => '_blank', 'escape' => false), sprintf(__('Você tem certeza que deseja apagar essa pessoa?', true), $vaga['Vaga']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				
				<?php echo $this->Form->create('Vaga', array('class' => 'form-stacked'));?>
					<?php
						echo $this->Form->input('edital_id', array('type' => "hidden", 'value' => $edital['Edital']['id']));
						echo $this->Form->input('polo_id');
						echo $this->Form->input('curso_id');
						echo $this->Form->input('disciplina_id');
					?>
				<p><?php echo $this->Form->end(__('Adicionar', true), array("class" => "btn"));?></p>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->



	
