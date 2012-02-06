<?php echo $this->Form->create('Atuacao', array("class" => "form-stacked"));?>
<?php echo $this->Form->input('Atuacao.curso_id',array("options" => $cursos)); ?>
<?php echo $this->Form->input('Atuacao.disciplina_id',array("options" => $disciplinas)); ?>
<?php echo $this->Form->input('Atuacao.ano', array("type" => "text","class" => "validate[required,custom[onlyNumberSp]]")); ?>
<?php echo $this->Form->input('Atuacao.semestre', array("type" => "select", "options" => array('1' => '1', '2' => '2'))); ?>
<?php echo $this->Form->input('Atuacao.funcao_id',array("options" => $funcoes)); ?>
<?php echo $this->Form->hidden('Atuacao.pessoa_id', array("value" => $pessoa)); ?>
<p>
	<div class="submit">
		<input class="btn" type="submit" value="Adicionar">
	</div>
</p>