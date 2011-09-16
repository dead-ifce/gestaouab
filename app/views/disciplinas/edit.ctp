<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){

		
		$.post("<?php echo Dispatcher::baseUrl();?>/disciplinas/getTurmasByCurso/" + $("#CursoCurso").val(), function(data) {
	        $("#TurmaTurma").empty().append(data);
	    }, 'html');
		
		$("#CursoCurso").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/disciplinas/getTurmasByCurso/" + $(this).val(), function(data) {
		        $("#TurmaTurma").empty().append(data);
		    }, 'html');
		});

   	});
</script>

<style type="text/css" media="screen">
	.xlarge { 
		height: 100px;
	}
	
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Turmas</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<div class="row">
	    	<div class="span8 columns">
				<div class="disciplinas form">
					<?php echo $this->Form->create('Disciplina', array("class" => "form-stacked"));?>
						<?php
							echo $this->Form->input('id');
							echo $this->Form->input('nome');
							echo $this->Form->input('carga',array("type" => "select", "options" => array('40' => '40h', '60' => '60h',"80" => "80h","100" => "100h","120" => "120h")));
							echo $this->Form->input('semestre',array("type" => "select", "options" => array('1' => '1', '2' => '2')));
							echo $this->Form->input('numsemanas',array("label" => "Numero de semanas","type" => "select", "options" => array('4' => '4', '6' => '6', '8' => '8', '10' => '10', '12' => '12')));
							echo $this->Form->input('Curso', array("class" => "xlarge"));
							echo $this->Form->input('Turma', array("class" => "xlarge"));
						?>
					<p><?php echo $this->Form->end(__('Editar', true));?></p>
				
				</div>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->







