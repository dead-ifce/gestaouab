<style type="text/css" media="screen">
	.block {
		background: none;
		margin-bottom: 5px;
	}
</style>
<div class="block">
<?php echo $this->Form->create('Evento');?>

	<?php
		echo $this->Form->input('tipoevento_id',array("class" => "styled"));
		echo $this->Form->input('disciplina_id',array("class" => "styled"));
		echo $this->Form->input('turno', array("type" => "select",
																					 "options" => array(
																												"0" => "Manhã",
																												"1" => "Tarde"),
																						"class" => "styled"));
	?>
<?php echo $this->Form->end();?>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	    $("#EventoTipoeventoId").select_skin();	
	    $("#EventoDisciplinaId").select_skin();	
	    $("#EventoTurno").select_skin();	
	
	});
</script>