<style type="text/css" media="screen">
	.scroll_checkboxes {
	    height: 100px;
	    padding: 5px;
	    overflow: auto;
	    border: 1px solid #ccc
	}
	.input{
		padding-bottom: 15px;
	}
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Turmas</h2>
	</div>		<!-- .block_head ends -->
	
	
	
	<div class="block_content">

<div class="turmas form">
	<?php echo $this->Form->create('Turma');?>

	<?php echo $this->Form->input('nome', array("type" => "text","class" => "text small"));	?>
	<?php echo $this->Form->input('curso_id', array("class" => "styled"));   ?>	
	<label>Disciplina</label>
	<div class="scroll_checkboxes">
		<?php echo $this->Form->input('Disciplina',array('multiple'=>'checkbox', "label" => false)); ?>
	</div>
	<p><?php echo $this->Form->input('Polo');       ?></p>	

<?php echo $this->Form->end(__('Submit', true));?>
</div>


</div>		<!-- .block_content ends -->

<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block ends -->