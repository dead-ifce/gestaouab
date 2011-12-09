<?php echo $javascript->link(array('jquery/jquery-1.5.2.min.js','jquery/jquery-ui-1.8.13.custom.min.js'),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom','bootstrap','custom')); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$("#curso").val(0);
		
		$("#curso").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/getTurmasByCurso/" + $(this).val(), function(data) {
		        $("#turma_id").empty().append(data);
		    }, 'html');
		});
		
		$("#button").click(function(){
			var value = $('#turma_id :selected').val();
			window.location = "<?php echo Dispatcher::baseUrl();?>/calendarios/view/"+value;
		});
		
	});
</script>

<div class="block small left">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Selecionar turma</h2>	
	</div>		<!-- .block_head ends -->
	
	<div class="block_content">
		
		<form id="form" method="post" class="form-stacked">
			<?php echo $this->Form->input('curso',array('options' => $cursos,'empty' => 'Selecione...','class' => "styled"));?>
			<p><?php echo $this->Form->input('turma_id',array('type' => "select",'empty' => 'Selecione...','class' => "styled")); ?></p>
			
			
		</form>
		<p style="margin-left: 20px">
			<input type="submit" class="btn primary" value="Ver calendários" id="button"/>
		</p>

</div>		<!-- .block_content ends -->
<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block.small.left ends -->