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
			var turma = $('#turma_id :selected').val();
			var ano = $('#anoYear :selected').val();
			var semestre = $('#semestre :selected').val();
			
			window.location = "<?php echo Dispatcher::baseUrl();?>/calendarios/ver/"+ turma + "/" + ano + "/" + semestre;
			
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
			<div class="input select">
			    <label for="curso">Ano</label>
			<?php echo $this->Form->year('ano', 2008, date('Y'),null, array('empty' => 'Selecione...','class' => "styled", "label" => 'Ano')); ?>
			</div>
			<?php echo $this->Form->input('semestre',array('type' => "select",
			                                               'empty' => 'Selecione...',
			                                               'class' => "styled",
			                                               'options' => array("1" => "1", "2" => "2"))); ?></p>
			
		</form>
		<p style="margin-left: 20px">
			<input type="submit" class="btn primary" value="Ver calendários" id="button"/>
		</p>

</div>		<!-- .block_content ends -->
<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block.small.left ends -->