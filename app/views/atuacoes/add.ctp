<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$( "#nova-atuacao" ).dialog({
					autoOpen: false,
					show: "blind",
					hide: "explode",

				});
		
		
		$("#add-btn").click(function(){
			//alert("sdd");
			$("#nova-atuacao").dialog("open");
			return false;
		});
		
		
	});
</script>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<div class="page-header">
			<h1>Atuações de <?php echo $pessoa["Pessoa"]["nome"] ?></h1>
		</div>
		<?php if (!empty($atuacoes)): ?>	
			<?php foreach($atuacoes as $atuacao): ?>
		
			Curso:<?php echo $atuacao["Curso"]["nome"]; ?><br />
			Disciplina: <?php echo $atuacao["Disciplina"]["nome"]; ?><br />
			Ano: <?php echo $atuacao["Atuacao"]["ano"]; ?><br />
			Semestre: <?php echo $atuacao["Atuacao"]["semestre"]; ?><br />
			Função: <?php echo $atuacao["Funcao"]["funcao"] ?><br /><br />
			<?php endforeach; ?>
		<?php else: ?>
			<div class="alert-message">
				Não há atuações cadastradas. Caso você já tenha atuado na UAB, por favor adicione estas atuações.
			</div>
		<?php endif; ?>
		<p>
				<input id="add-btn" class="btn primary" type="submit" value="Adicionar Atuação">
		</p>
		<p>
				<?php echo $this->Html->link("Continuar cadastro", array("controller" => "formacoes", "action" => "add",$pessoa["Pessoa"]["id"]),array("class" => "btn success")); ?>
		</p>
		
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div title="Nova Atuação" id="nova-atuacao" style="display: none">
	<?php echo $this->Form->create('Atuacao', array("class" => "form-stacked"));?>
	<?php echo $this->Form->input('Atuacao.curso_id',array("options" => $cursos)); ?>
	<?php echo $this->Form->input('Atuacao.disciplina_id',array("options" => $disciplinas)); ?>
	<?php echo $this->Form->input('Atuacao.ano', array("type" => "text")); ?>
	<?php echo $this->Form->input('Atuacao.semestre', array("type" => "select", "options" => array('1' => '1', '2' => '2'))); ?>
	<?php echo $this->Form->input('Atuacao.funcao_id',array("options" => $funcoes)); ?>
	<?php echo $this->Form->hidden('Atuacao.pessoa_id', array("value" => $pessoa["Pessoa"]["id"])); ?>
	
	<p>
		<div class="submit">
			<input class="btn" type="submit" value="Adicionar">
		</div>
	</p>
</div>