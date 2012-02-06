<?php echo $this->Form->create("Formacao",array("class" => "form-stacked"));?>

<?php echo $this->Form->input('Formacao.tipo',array("options" => array("1" => "Graduação","2" => 'Especialização','3' => 'Mestrado', '4' => 'Doutorado'))); ?>
<?php echo $this->Form->input('Formacao.curso', array("class" => "xlarge validate[required]", "type" => "text")); ?>
<?php echo $this->Form->input('Formacao.conclusao', array("class" => "xlarge validate[required,custom[onlyNumberSp]]", "type" => "text")); ?>
<?php echo $this->Form->input('Formacao.instituicao', array("class" => "xlarge validate[required]", "type" => "text")); ?>
<?php echo $this->Form->hidden('Formacao.pessoa_id', array("value" => $pessoa)); ?>

<p>
	<div class="submit">
		<input class="btn" type="submit" value="Adicionar">
	</div>
</p>