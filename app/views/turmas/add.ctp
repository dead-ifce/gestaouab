<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){

		$("#TurmaAddForm").validationEngine();

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
	    <div class="span15 columns">
			<div class="turmas form">
				<?php echo $this->Form->create('Turma', array("class" => "form-stacked"));?>
				<?php echo $this->Form->input('nome', array("type" => "text","class" => "text small validate[required]"));	?>
				<?php echo $this->Form->input('curso_id', array("class" => "styled"));   ?>	
				<?php echo $this->Form->input('Disciplina', array("class" => "xlarge")); ?>
				<?php echo $this->Form->input('Polo', array("class" => "xlarge"));       ?>
				<p><?php echo $this->Form->end(__('Adicionar', true));?></p>
			</div>
		</div>
	</div>

</div>		<!-- .block_content ends -->

<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block ends -->