<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$( ".datepicker" ).datepicker();
		
		$("#CalendarioCurso").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/getTurmasByCurso/" + $(this).val(), function(data) {
		        $("#CalendarioTurmaId").empty().append(data);
		    }, 'html');
		});
		
		$("#CalendarioTurmaId").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/getDisciplinasByTurma/" + $(this).val(), function(data) {
		        $("#CalendarioDisciplinaId").empty().append(data);
		    }, 'html');
		});
		
	//
		
	});
</script>


<style type="text/css" media="screen">
	.block form input.text.datepicker{
		width: 100px;
	}
	
</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php echo $this->Form->create('Calendario', array("class" => "form-stacked"));?>
		
			<label for="CalendarioCurso">Curso:</label> 
			<?php echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...','class' => "normalSelect", "label" => false));
			?>
		
			<label>Turma:</label> 
			<?php echo $this->Form->input('turma_id',array('class' => "styled","label" => false)); ?>
		
			<label>Disciplina:</label> 
			<?php echo $this->Form->input('disciplina_id',array('class' => "styled","label" => false)); ?>
		
			<label>Inicio:</label> 
			<input type="text" class="text datepicker" name="data[Calendario][inicio]" />

			<label>Fim:</label> 
			<input type="text" class="text datepicker" name="data[Calendario][fim]" />

			<p style="margin-top: 20px">
				<input type="submit" style="" class="btn primary" value="Adicionar" id="button"/>
			</p>

		
	</form>
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->




