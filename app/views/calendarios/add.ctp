<?php echo $this->Form->create('Calendario');?>


	<?php
		echo $this->Form->input('curso', $cursos);
		echo $this->Form->input('disciplina_id', $disciplinas);
		echo $this->Form->input('turma_id');
		echo $this->Form->input('inicio',array('type'=>'date'));
		echo $this->Form->input('fim',array('type'=>'date'));
	?>
	

<?php echo $this->Form->end('Adicionar'); ?>