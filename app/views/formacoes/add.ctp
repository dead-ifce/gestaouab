<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#FormacaoAddForm").validationEngine();
		
		$("#formacoesTable").tablesorter({ sortList: [[2,0]] });
		
		$( "#nova-formacao" ).dialog({
					autoOpen: false,
					show: "blind",
					hide: "explode",
					width: "350px"
				});
		
		
		$("#add-btn").click(function(){
			//alert("sdd");
			$("#nova-formacao").dialog("open");
			return false;
		});
		
	});
</script>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar Formações</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<div class="page-header">
			<h1>Formações de <?php echo $this->Session->read('Pessoa.nome') ?></h1>
		</div>
		<?php echo debug($this->Session->read('Formacao')); ?>
		<?php if ($this->Session->check('Formacao')): ?>	
		<div class="row">
			<div class="span15 columns">
				<table id="formacoesTable" class="zebra-striped">
					<thead>
						<tr>
							<th style="width: 100px" class="yellow header">Tipo</th>
							<th class="blue header">Curso</th>
							<th class="green header">Conclusão</th>
							<th class="red header">Instituição</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($this->Session->read('Formacao') as $formacao): ?>
						<tr>
							<td><?php echo $this->Estudo->showTipo($formacao["tipo"]); ?></td>
							<td><?php echo $formacao["curso"] ?></td>
							<td><?php echo $formacao["conclusao"] ?></td>
							<td><?php echo $formacao["instituicao"] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
			</div>
		</div>
		<?php else: ?>
			<div class="alert-message">
				Não há formações cadastradas. Por favor, adicione-as.
			</div>
		<?php endif; ?>
		<?php if(!$this->Session->check('Formacao') && !$this->Session->read('Auth.User')): ?>
				
			<p><input id="add-btn" class="btn primary" type="submit" value="Adicionar Formação"></p>
		<?php else: ?>
				<p><input id="add-btn" class="btn primary" type="submit" value="Adicionar Formação"></p>
				<p><?php echo $this->Html->link("Continuar",array('action' => 'vaga',"controller" => "pessoas"), array("class" => "btn success")) ?>
				</p>
		<?php endif; ?>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div title="Nova Formação" id="nova-formacao" style="display: none">
		<?php echo $this->Form->create("Formacao",array("class" => "form-stacked"));?>

		<?php echo $this->Form->input('Formacao.tipo',array("options" => array("1" => "Graduação","2" => 'Especialização','3' => 'Mestrado', '4' => 'Doutorado'))); ?>
		<?php echo $this->Form->input('Formacao.curso', array("class" => "xlarge validate[required]", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.conclusao', array("class" => "xlarge validate[required,custom[onlyNumberSp]]", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.instituicao', array("class" => "xlarge validate[required]", "type" => "text")); ?>
		<?php echo $this->Form->hidden('Formacao.pessoa_id', array("value" => $pessoa["Pessoa"]["id"])); ?>
		
		<p>
			<div class="submit">
				<input class="btn" type="submit" value="Adicionar">
			</div>
		</p>
</div>

