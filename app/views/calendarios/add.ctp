<?php $javascript->link(array(),false); ?>
<?php echo $this->Html->css('jquery-ui-1.8.13.custom'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
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
		
		
	});
</script>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php echo $this->Form->create('Calendario');?>

		<p><?php
			echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...','class' => "styled"));
		?></p>
			<p><?php echo $this->Form->input('turma_id',array('class' => "styled")); ?> </p>
			<p><?php echo $this->Form->input('disciplina_id',array('class' => "styled")); ?> </p>

		<p>
			<label>Inicio:</label> 
			<input type="text" class="text date_picker" name="data[Calendario][inicio]" />
			&nbsp;&nbsp;
			<label>Fim:</label> 
			<input type="text" class="text date_picker" name="data[Calendario][fim]" />
		</p>
		<p>
			<input type="submit" class="submit long" value="Adicionar" id="button"/>
		</p>
		
	</form>
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->




