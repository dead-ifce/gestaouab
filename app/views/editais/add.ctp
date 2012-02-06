<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
        $( ".datepicker" ).datepicker();
		$("#EditalAddForm").validationEngine();
		
   	});
</script>

<style type="text/css" media="screen">
	#EditalDescricao { 
		width: 500px;
	}
	
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar edital</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<div class="row">
	    	<div class="span15 columns">
				<div class="turmas form">
					<?php echo $this->Form->create('Edital', array("class" => "form-stacked"));?>
						<?php
							echo $this->Form->input('numero',array("class" => "validate[required]"));
							echo $this->Form->input('ano',array("class" => "validate[required]"));
							echo $this->Form->input('descricao', array('rows'=> 3,"class" => "validate[required]"));
							echo $this->Form->input('inicio',array('type' => 'text', "class" => "validate[required] datepicker"));
							echo $this->Form->input('fim',array('type' => 'text', "class" => "validate[required] datepicker"));
						?>
					<p><?php echo $this->Form->end(__('Adicionar', true));?></p>
				</div>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->





