<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#AtuacaoAddForm").validationEngine();
    	
		$("#atuacoesTable").tablesorter({ sortList: [[2,0]] });
		
		$( "#nova-atuacao" ).dialog({
					autoOpen: false,
					show: "blind",
					hide: "explode",

				});
		
		
		$("#add-btn").click(function(){
			//alert("sdd");
			$("#nova-atuacao").dialog("open");
			return false;
		});
		
		$.post("<?php echo Dispatcher::baseUrl();?>/atuacoes/getDisciplinasByCurso/" + $("#AtuacaoCursoId").val(), function(data) {
	        $("#AtuacaoDisciplinaId").empty().append(data);
	    }, 'html');
	
		$("#AtuacaoCursoId").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/atuacoes/getDisciplinasByCurso/" + $(this).val(), function(data) {
		        $("#AtuacaoDisciplinaId").empty().append(data);
		    }, 'html');
		});
		
		
	});
</script>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar Atuações</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<div class="page-header">
			<h1>Atuações de <?php echo $pessoa["Pessoa"]["nome"] ?></h1>
		</div>
		
		<?php if (!empty($atuacoes)): ?>	
		<div class="row">
			<div class="span15 columns">
				<table id="atuacoesTable" class="zebra-striped">
					<thead>
						<tr>
							<th class="yellow header">Curso</th>
							<th class="blue header">Disciplina</th>
							<th class="green header">Ano</th>
							<th class="red header">Semestre</th>
							<th class="orange header">Função</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($atuacoes as $atuacao): ?>
						<tr>
							<td><?php echo $atuacao["Curso"]["nome"]; ?></td>
							<td><?php echo $atuacao["Disciplina"]["nome"]; ?></td>
							<td><?php echo $atuacao["Atuacao"]["ano"]; ?></td>
							<td><?php echo $atuacao["Atuacao"]["semestre"]; ?></td>
							<td><?php echo $atuacao["Funcao"]["funcao"] ?></td>
						</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>	
			</div>
		</div>
		<?php else: ?>
	   		<div class="alert-message">
	   			Não há atuações cadastradas. Caso você já tenha atuado na UAB, por favor adicione estas atuações.
	   		</div>
	   	<?php endif; ?>
		
		<p><input id="add-btn" class="btn primary" type="submit" value="Adicionar Atuação"></p>
		<p>
				<?php echo $this->Html->link("Continuar cadastro", array("controller" => "formacoes", "action" => "add",$pessoa["Pessoa"]["id"]),array("class" => "btn success")); ?>
		</p>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div title="Nova Atuação" id="nova-atuacao" style="display: none">
	<?php echo $this->Form->create('Atuacao', array("class" => "form-stacked"));?>
	<?php echo $this->Form->input('Atuacao.curso_id',array("options" => $cursos,'empty' => 'Selecione...')); ?>
	<?php echo $this->Form->input('Atuacao.disciplina_id',array("options" => $disciplinas,'empty' => 'Selecione...')); ?>
	<?php echo $this->Form->input('Atuacao.ano', array("type" => "text","class" => "validate[required,custom[onlyNumberSp]]")); ?>
	<?php echo $this->Form->input('Atuacao.semestre', array("type" => "select", "options" => array('1' => '1', '2' => '2'))); ?>
	<?php echo $this->Form->input('Atuacao.funcao_id',array("options" => $funcoes)); ?>
	<?php echo $this->Form->hidden('Atuacao.pessoa_id', array("value" => $pessoa["Pessoa"]["id"])); ?>
	
	<p>
		<div class="submit">
			<input class="btn" type="submit" value="Adicionar">
		</div>
	</p>
</div>