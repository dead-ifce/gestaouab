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
		
		
	});
</script>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar Atuações</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<?php echo $this->Form->create('Atuacao', array("class" => "form-stacked"));?>
		<?php echo $this->Form->input('Atuacao.id'); ?>
		<?php echo $this->Form->input('Atuacao.curso_id',array("options" => $cursos)); ?>
		<?php echo $this->Form->input('Atuacao.disciplina_id',array("options" => $disciplinas)); ?>
		<?php echo $this->Form->input('Atuacao.ano', array("type" => "text","class" => "validate[required,custom[onlyNumberSp]]")); ?>
		<?php echo $this->Form->input('Atuacao.semestre', array("type" => "select", "options" => array('1' => '1', '2' => '2'))); ?>
		<?php echo $this->Form->input('Atuacao.funcao_id',array("options" => $funcoes)); ?>
		<?php echo $this->Form->hidden('Atuacao.pessoa_id', array("value" => $pessoa)); ?>

		<p>
			<div class="submit">
				<input class="btn" type="submit" value="Atualizar">
			</div>
		</p>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->
