<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
    	$("#turmasTable").tablesorter({ sortList: [[0,1]] });
		
		$("#pessoas-header").mouseover(function(){
			$(".edit-btn").show();
		}).mouseout(function(){
			$(".edit-btn").hide();
		});
		
		
		$( "#nova-formacao" ).dialog({
					autoOpen: false,
					show: "blind",
					hide: "explode",
					width: "350px"
				});
		
		$("#formacao-add-btn").click(function(){
			//alert("sdd");
			$("#nova-formacao").dialog("open");
			$("#nova-formacao").load('<?php echo Dispatcher::baseUrl();?>/formacoes/add_by_admin/<?php echo $pessoa["Pessoa"]["id"]; ?>');
			return false;
		});
		
		$( "#nova-atuacao" ).dialog({
					autoOpen: false,
					show: "blind",
					hide: "explode",
					width: "350px"
				});
		
		$("#atuacao-add-btn").click(function(){
			//alert("sdd");
			$("#nova-atuacao").dialog("open");
			$("#nova-atuacao").load('<?php echo Dispatcher::baseUrl();?>/atuacoes/add_by_admin/<?php echo $pessoa["Pessoa"]["id"]; ?>');
			return false;
		});
		
		
	});
</script>


<style type="text/css" media="screen">
	dl {
		padding: 0.5em; 
	} 
	dt { 
		float: left; 
		clear: left; 
		
		text-align: right; 
		font-weight: bold; 
		padding-right: 10px;
	} 
	dt:after { 
		content: ":"; 
	} 
	dd { 
		margin: 0 0 0 auto; 
		padding: 0 0 0.1em 0; 
	}
	.page-header h1 {
		display: inline-block;
	}
	.edit-btn{
		margin-left:10px;
		display: none;
	}
	.voltar-btn{
		float:right;
		margin-top: 13px;
	}
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2><?php echo $pessoa["Pessoa"]["nome"] ?></h2><span class="voltar-btn"><?php echo $this->Html->link('Voltar', array('controller' => 'pessoas', 'action' => 'index'),array("class" => "btn")); ?></span>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			<div id="pessoas-header" style="margin-left: 20px" class="page-header">
				<h1>Pessoais</h1><span class="edit-btn"><?php echo $this->Html->link('Editar', array('controller' => 'pessoas', 'action' => 'edit',$pessoa["Pessoa"]["id"])); ?></span>
			</div>
	    	<div class="span5 columns">
				
				<dl>
					<dt>Nome</dt><dd><?php echo $pessoa["Pessoa"]["nome"] ?></dd>
					<dt>Nascimento</dt><dd><?php echo $pessoa["Pessoa"]["nascimento"] ?></dd>
					<dt>Estado Civil</dt><dd><?php echo $pessoa["Pessoa"]["estadocivil"] ?></dd>
					<dt>Sexo</dt><dd><?php echo $pessoa["Pessoa"]["sexo"] ?></dd>
					<dt>CPF</dt><dd><?php echo $pessoa["Pessoa"]["cpf"] ?></dd>
					<dt>RG</dt><dd><?php echo $pessoa["Pessoa"]["rg"] ?></dd>
					<dt>Naturalidade</dt><dd><?php echo $pessoa["Pessoa"]["naturalidade"] ?></dd>
					<dt>Pai</dt><dd><?php echo $pessoa["Pessoa"]["pai"] ?></dd>
					<dt>Mae</dt><dd><?php echo $pessoa["Pessoa"]["mae"] ?></dd>
					
				</dl>
	    	</div>
	    <div class="span10 columns">
			<dl>
				<dt>Endereço</dt><dd><?php echo $pessoa["Pessoa"]["endereco"] ?></dd>
				<dt>Email</dt><dd><?php echo $pessoa["Pessoa"]["email"] ?></dd>
				<dt>Cel</dt><dd><?php echo $pessoa["Pessoa"]["cel"] == null? "-":$pessoa["Pessoa"]["cel"] ?></dd>
				<dt>Tel</dt><dd><?php echo $pessoa["Pessoa"]["cel"] == null? "-":$pessoa["Pessoa"]["tel"]?></dd>
				<dt>Fax</dt><dd><?php echo $pessoa["Pessoa"]["fax"] == null? "-":$pessoa["Pessoa"]["fax"] ?></dd>
			</dl>
	   		
	    </div>
	    </div>
		
		<div class="row">
			<div style="margin-left: 20px" class="page-header">
				<h1>Formação</h1>
			</div>
	    	<div class="span16 columns">
				<?php if (!empty($pessoa["Formacao"])): ?>	
				<div class="row">
					<div class="span15 columns">
						<table id="formacoesTable" class="zebra-striped">
							<thead>
								<tr>
									<th style="width: 100px" class="yellow header">Tipo</th>
									<th class="blue header">Curso</th>
									<th class="green header">Conclusão</th>
									<th class="red header">Instituição</th>
									<th class="purple header">Ações</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($pessoa["Formacao"] as $formacao): ?>
								<tr>
									<td><?php echo $this->Estudo->showTipo($formacao["tipo"]); ?></td>
									<td><?php echo $formacao["curso"] ?></td>
									<td><?php echo $formacao["conclusao"] ?></td>
									<td><?php echo $formacao["instituicao"] ?></td>
									<td>
										<?php echo $this->Html->link('Editar', array('controller' => 'formacoes', 'action' => 'edit',$formacao["id"], $pessoa["Pessoa"]["id"])); ?> 
										<?php echo $this->Html->link(__('Apagar', true), array('controller' => 'formacoes','action' => 'delete', $formacao['id'], $pessoa["Pessoa"]["id"]), null, sprintf(__('Você tem certeza que deseja apagar essa formaçao?', true), $pessoa['Pessoa']['id'])); ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>	
					</div>
				</div>
				<?php else: ?>
					<div class="alert-message">
						Não há formações cadastradas. Por favor, adicione-as.
					</div>
				<?php endif; ?>
				<p><input id="formacao-add-btn" class="btn primary" type="submit" value="Adicionar Formação"></p>
	    	</div>
	    </div>
	
		<?php if (!empty($pessoa["Atuacao"])): ?>	
		<div class="row">
			<div style="margin-left: 20px" class="page-header">
				<h1>Atuação</h1>
			</div>
			<div class="span15 columns">
				<table id="atuacoesTable" class="zebra-striped">
					<thead>
						<tr>
							<th class="yellow header">Curso</th>
							<th class="blue header">Disciplina</th>
							<th class="green header">Ano</th>
							<th class="red header">Semestre</th>
							<th class="orange header">Função</th>
							<th class="purple header">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pessoa["Atuacao"] as $atuacao): ?>
						<tr>
							<td><?php echo $atuacao["Curso"]["nome"]; ?></td>
							<td><?php echo $atuacao["Disciplina"]["nome"]; ?></td>
							<td><?php echo $atuacao["ano"]; ?></td>
							<td><?php echo $atuacao["semestre"]; ?></td>
							<td><?php echo $atuacao["Funcao"]["funcao"] ?></td>
							<td>
								<?php echo $this->Html->link('Editar', array('controller' => 'atuacoes', 'action' => 'edit',$atuacao["id"], $pessoa["Pessoa"]["id"])); ?> 
								<?php echo $this->Html->link(__('Apagar', true), array('controller' => 'atuacoes','action' => 'delete', $atuacao['id'], $pessoa["Pessoa"]["id"]), null, sprintf(__('Você tem certeza que deseja apagar essa atuacao?', true), $pessoa['Pessoa']['id'])); ?>
							</td>
						</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>	
			</div>
		</div>
		<?php else: ?>
	   		<div class="alert-message">
	   			Não há atuações cadastradas. Caso você já tenha atuado na UAB, por favor adicione estas atuações.
	   		</div>
	   	<?php endif; ?>
		<p><input id="atuacao-add-btn" class="btn primary" type="submit" value="Adicionar Atuação"></p>
		
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->

<div title="Adicionar Formação" id="nova-formacao"></div>
<div title="Adicionar Atuação" id="nova-atuacao"></div>

