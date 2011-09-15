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
		
		<?php echo $this->Form->create("Formacao",array("class" => "form-stacked"));?>
		<?php echo $this->Form->input("Formacao.id"); ?>
		<?php echo $this->Form->input('Formacao.tipo',array("options" => array("1" => "Graduação","2" => 'Especialização','3' => 'Mestrado', '4' => 'Doutorado'))); ?>
		<?php echo $this->Form->input('Formacao.curso', array("class" => "xlarge validate[required]", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.conclusao', array("class" => "xlarge validate[required,custom[onlyNumberSp]]", "type" => "text")); ?>
		<?php echo $this->Form->input('Formacao.instituicao', array("class" => "xlarge validate[required]", "type" => "text")); ?>
		<?php echo $this->Form->hidden('Formacao.pessoa_id'); ?>

		<p>
			<div class="submit">
				<input class="btn" type="submit" value="Atualizar">
			</div>
		</p>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div title="Nova Formação" id="nova-formacao" style="display: none">
		
</div>

