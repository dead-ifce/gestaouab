<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	
	$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getPolos/" + $("#InscricaoEditalId").val(), function(data) {
        $("#InscricaoPoloId").empty().append(data);
		
		//PEGA OS CURSOS ASSIM Q ABRE A PAGINA
		$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getCursos/" + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val(), function(data) {
	        $("#InscricaoCursoId").empty().append(data);

			$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getDisciplinas/" + + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val()+ "/" + $("#InscricaoCursoId").val(), function(data) {
		        $("#InscricaoDisciplinaId").empty().append(data);
		    }, 'html');

	    }, 'html');
		
    }, 'html');
	
	
	$("#InscricaoEditalId").bind('change', function() {
		$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getPolos/" + $(this).val(), function(data) {
	        $("#InscricaoPoloId").empty().append(data);
				
				//PEGA OS CURSOS ASSIM Q ABRE A PAGINA
				$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getCursos/" + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val(), function(data) {
			        $("#InscricaoCursoId").empty().append(data);

					$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getDisciplinas/" + + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val()+ "/" + $("#InscricaoCursoId").val(), function(data) {
				        $("#InscricaoDisciplinaId").empty().append(data);
				    }, 'html');

			    }, 'html');
				
	    }, 'html');
	});
	
	
	

	//PEGA OS CURSOS AO SELECIONAR O POLO
	$("#InscricaoPoloId").bind('change', function() {
		$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getCursos/" + $("#InscricaoEditalId").val() + "/" + $(this).val(), function(data) {
	        $("#InscricaoCursoId").empty().append(data);
	
			$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getDisciplinas/" + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val()+ "/" + $("#InscricaoCursoId").val(), function(data) {
		        $("#InscricaoDisciplinaId").empty().append(data);
		    }, 'html');
	    }, 'html');
	});
	
	
	//PEGA AS DISCIPLINAS AO SELECIONAR O CURSO
	$("#InscricaoCursoId").bind('change', function() {
		$.post("<?php echo Dispatcher::baseUrl();?>/pessoas/getDisciplinas/" + $("#InscricaoEditalId").val()+ "/" + $("#InscricaoPoloId").val()+ "/" + $("#InscricaoCursoId").val(), function(data) {
	        $("#InscricaoDisciplinaId").empty().append(data);
	    }, 'html');
	});
	
	
	
});
</script>

<style>
#pessoas_table{
	width: 100%;
	border-collapse:collapse;
	
}
#info{
	padding: 15px;
	text-align: center;
}

#InscricaoVagaForm{
	width: 200px;
	margin: 0 auto;
}
</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Inscrições</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<div class="row">
	    	
			<div id="info">
				<h3>Por favor, selecione abaixo o campus, curso e disciplina que deseja se candidatar</h3>
	    	</div>
			
			<?php echo $this->Form->create('Inscricao', array("class" => "form-stacked", 'url' => array('controller' => 'pessoas', 'action' => 'vaga'))); ?>
			<?php echo $this->Form->input('edital_id',array('options' => $list_editais)); ?>
			<?php echo $this->Form->input('polo_id',array("type" => 'select')); ?>
			<?php echo $this->Form->input('curso_id',array("type" => 'select')); ?>
			<?php echo $this->Form->input('disciplina_id',array("type" => 'select')); ?>
			
			
			<p>
				<div class="submit">
					<input class="btn success" type="submit" value="Continuar">
				</div>
			</p>
	   
	    </div>
		
		
	
	</div>		<!-- .block_content ends -->

	 <div class="bendl"></div>
	 <div class="bendr"></div>

</div>		<!-- .block.small.left ends -->