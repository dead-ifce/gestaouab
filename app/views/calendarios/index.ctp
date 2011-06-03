<?php $javascript->link(array('jquery/jquery-1.5.2.min.js','jquery/jquery-ui-1.8.13.custom.min.js'),false); ?>
<?php echo $this->Html->css('jquery-ui-1.8.13.custom'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$("#curso").val(0);
		
		$("#curso").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/getTurmasByCurso/" + $(this).val(), function(data) {
		        $("#turma_id").empty().append(data);
		    }, 'html');
		});
		
		$("#button").button();
		$("#button").click(function(){
			var value = $('#turma_id :selected').val();
			window.location = "<?php echo Dispatcher::baseUrl();?>/calendarios/view/"+value;
			
		});
		
	});
</script>

<?php
	echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...'));
	echo $this->Form->input('turma_id',array('type' => "select",'empty' => 'Selecione...'));
	echo "<br />";
	echo $form->button('Ver calendário',array('id' => "button"));
?>
