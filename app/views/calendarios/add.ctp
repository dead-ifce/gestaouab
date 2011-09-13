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
		margin-left: 20px;
	}
	
	.clearfix{
		padding-bottom:10px;
	}
</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php echo $this->Form->create('Calendario');?>
		
		<div class="clearfix">
			<label for="CalendarioCurso">Curso:</label> 
			<?php echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...','class' => "normalSelect", "label" => false));
			?>
		</div>
		
		<div class="clearfix">
			<label>Turma:</label> 
			<?php echo $this->Form->input('turma_id',array('class' => "styled","label" => false)); ?>
		</div>
		
		<div class="clearfix">
			<label>Disciplina:</label> 
			<?php echo $this->Form->input('disciplina_id',array('class' => "styled","label" => false)); ?>
		</div>
		
		<div class="clearfix">
			<label>Inicio:</label> 
			<input type="text" class="text datepicker" name="data[Calendario][inicio]" />
		</div>

		<div class="clearfix">
			<label>Fim:</label> 
			<input type="text" class="text datepicker" name="data[Calendario][fim]" />
		</div>


		<input type="submit" style="margin-left: 150px" class="submit long" value="Adicionar" id="button"/>

		
	</form>
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->




