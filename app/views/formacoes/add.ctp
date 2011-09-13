<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
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
			<h1>Formações de <?php echo $formacoes[0]["Pessoa"]["nome"] ?></h1>
		</div>
		<?php foreach($formacoes as $formacao): ?>
		
		Tipo:<?php echo $this->Estudo->showTipo($formacao["Formacao"]["tipo"]); ?><br />
		Curso: <?php echo $formacao["Formacao"]["curso"] ?><br />
		Conclusao: <?php echo $formacao["Formacao"]["conclusao"] ?><br />
		Instituição: <?php echo $formacao["Formacao"]["instituicao"] ?><br /><br />
		
		<?php endforeach; ?>
		<button type="button" id="add-btn">Adicionar formação</button>
		<?php echo $this->Html->link("Adicionar atuações",array('action' => 'add',"controller" => "atuacoes", $pessoa_id)) ?>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div id="nova-formacao" style="display: none">
		<?php echo $this->Form->create("Formacao",array("class" => "form-stacked"));?>

		<?php echo $this->Form->input('Formacao.tipo',array("options" => array("1" => "Graduação","2" => 'Especialização','3' => 'Mestrado', '4' => 'Doutorado'))); ?>
		<?php echo $this->Form->input('Formacao.curso', array("class" => "xlarge", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.conclusao', array("class" => "xlarge", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.instituicao', array("class" => "xlarge", "type" => "text")); ?>
		<?php echo $this->Form->hidden('Formacao.pessoa_id', array("value" => $pessoa_id)); ?>
		
<?php echo $this->Form->end(__('Submit', true));?>
</div>

