<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
        $( ".datepicker" ).datepicker();
		$("#EditalEditForm").validationEngine();
		
   	});
</script>

<style type="text/css" media="screen">
	#EditalDescricao { 
		width: 500px;
	}
	
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Visualizar edital</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<div class="row">
	    	<div class="span15 columns">
				<b>Número</b>:
				<?php echo $edital['Edital']['numero'] ?><br />
				<b>Ano</b>:
				<?php echo $edital['Edital']['ano'] ?><br />
				<b>Descrição</b>:
				<?php echo $edital['Edital']['descricao'] ?><br />
				<b>Curso</b>:
				<?php echo $edital['Curso']['nome'] ?><br />
				<b>Disciplina</b>:
				<?php echo $edital['Disciplina']['nome'] ?><br />
				<b>Inicio</b>:
				<?php echo date('d/m/Y', strtotime($edital['Edital']['inicio']))  ?><br />
				<b>Fim</b>:
				<?php echo date('d/m/Y', strtotime($edital['Edital']['fim']))  ?><br />
				
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->





