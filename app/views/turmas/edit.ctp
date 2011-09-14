<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

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
	    	<div class="span8 columns">
				<div class="turmas form">
				<?php echo $this->Form->create('Turma', array("class" => "form-stacked"));?>
					<?php echo $this->Form->input('id');?>
					<?php echo $this->Form->input('nome');?>
					<?php echo $this->Form->input('curso_id',array('options' => $cursos)); ?>
					<?php echo $this->Form->input('Disciplina', array("class" => "xlarge")); ?>
					<?php echo $this->Form->input('Polo', array("class" => "xlarge")); ?>
					<p><?php echo $this->Form->end(__('Editar', true));?></p>
				</div>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->


