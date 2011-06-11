<?php //$javascript->link(array('jquery/jquery-1.5.2.min.js','jquery/jquery-ui-1.8.13.custom.min.js'),false); ?>
<?php //echo $this->Html->css('jquery-ui-1.8.13.custom'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
	    $( "#CalendarioInicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#CalendarioFim" ).datepicker({ dateFormat: 'yy-mm-dd' });
	    
		
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

<?php echo $this->Form->create('Calendario');?>


	<?php
		echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...'));
		echo $this->Form->input('turma_id');
		echo $this->Form->input('disciplina_id');
		echo $this->Form->input('inicio');
		echo $this->Form->input('fim');
	?>
	

<?php echo $this->Form->end('Adicionar'); ?>