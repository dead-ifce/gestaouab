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

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#CursoCurso").bind('change', function() {
			$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/getTurmasByCurso/" + $(this).val(), function(data) {
		        $("#TurmaTurma").empty().append(data);
		    }, 'html');
		});
	
	});
</script>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Disciplinas</h2>
	</div>		<!-- .block_head ends -->
	
	
	
	<div class="block_content">

<div class="disciplinas form">
<?php echo $this->Form->create('Disciplina');?>

	<?php
		echo $this->Form->input('nome', array("class" => "text small"));
		echo $this->Form->input('carga', array("class" => "text small"));
		echo $this->Form->input('semestre', array("class" => "text small"));
		echo $this->Form->input('numsemanas', array("class" => "text small"));
	?>
	
 <?php echo $this->Form->input('Curso', array("type" => "select",
																						 	"options" => $cursos,
																						  "empty" => 'Selecione...',
																						  "class" => "styled")); ?>
 
 <?php echo $this->Form->input('Turma', array("type" => "select",
																							"empty" => 'Selecione...',
																							"class" => "styled")); ?>

<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Disciplinas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cursos', true), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso', true), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Turmas', true), array('controller' => 'turmas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Turma', true), array('controller' => 'turmas', 'action' => 'add')); ?> </li>
	</ul>
</div>

</div>		<!-- .block_content ends -->

<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block ends -->
