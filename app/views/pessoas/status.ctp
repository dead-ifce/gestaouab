<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Mudar status</h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			<div class="span8 columns">
			
			<?php echo $this->Form->create("Pessoa", array("class" => "form-stacked")); ?>
			<?php echo $this->Form->hidden('id',array('value' => $pessoa['Pessoa']['id'])); ?>
			<?php
			 	$options = array("1" => "Conferido", "2" => "Pendente", "3" => "Indeferido");
				echo $this->Form->input('status', array('options' => $options, 'empty' => 'Selecione...')); ?>
			<p></p><?php echo $this->Form->end("Atualizar"); ?>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->



	
