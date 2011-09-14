<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/mask/jquery.maskedinput-1.3.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>
<script>
	$(document).ready(function(){

		$("#PessoaAddForm").validationEngine();
		$("#PessoaNascimento").mask("99/99/9999")
		$("#PessoaCpf").mask("999.999.999-99");
		$("#PessoaCel").mask("(99) 9999-9999")
		$("#PessoaTel").mask("(99) 9999-9999")
		$("#PessoaFax").mask("(99) 9999-9999")
		

   	});
</script>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar pessoa</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php echo $this->Form->create('Pessoa', array("class" => "form-stacked"));?>
		<div class="row">
	    <div class="span8 columns">
			<div class="page-header">
				<h1>Pessoais</h1>
			</div>
			<?php echo $this->Form->input('nome', array("class" => "xlarge validate[required]")); ?>
			<?php echo $this->Form->input('nascimento', array("class" => "xlarge validate[required]", "type" => "text")); ?>
			
			<?php echo $this->Form->input('estadocivil', array("class" => "xlarge validate[required]", 
														"type" => "text", 
														"label" => "Estado civil",
														"type" => "select", 
														"options" => array('Solteiro(a)' => 'Solteiro(a)', 
																		   'Casado(a)' => 'Casado(a)',
																		   'Divorciado(a)' => 'Divorciado(a)',
																		   'Viúvo(a)' => 'Viúvo(a)')));
			?>
			<?php echo $this->Form->input('sexo', array("class" => "xlarge", "type" => "select", "options" => array('Masculino' => 'Masculino', 'Feminino' => 'Feminino')));?>
			<?php echo $this->Form->input('cpf', array("class" => "xlarge validate[required]", "type" => "text", "label" => "CPF"));?>
			<?php echo $this->Form->input('rg', array("class" => "xlarge validate[required,custom[onlyNumberSp]]", "type" => "text", "label" => "RG")); ?>
			<?php echo $this->Form->input('rg_orgao', array("class" => "xlarge validate[required]", "type" => "text", "label" => "Orgão emissor")); ?>
			<?php echo $this->Form->input('nacionalidade', array("class" => "xlarge validate[required]", "type" => "text")); ?>
			<?php echo $this->Form->input('naturalidade', array("class" => "xlarge validate[required]", "type" => "text")); ?>
			<?php echo $this->Form->input('pai', array("class" => "xlarge validate[required]", "type" => "text")); ?>
			<?php echo $this->Form->input('mae', array("class" => "xlarge validate[required]", "type" => "text")); ?>
	    </div>
	    <div class="span8 columns">
	    	<div class="page-header">
				<h1>Contato</h1>
			</div>
			<?php echo $this->Form->input('endereco', array("class" => "xlarge validate[required]", "type" => "text", "label" => "Endereço")); ?>
			<?php echo $this->Form->input('email', array("class" => "xlarge validate[required,custom[email]]", "type" => "text")); ?>
			<?php echo $this->Form->input('cel', array("class" => "xlarge validate[required]", "type" => "text"));?>
			<?php echo $this->Form->input('tel', array("class" => "xlarge validate[required]", "type" => "text"));?>
			<?php echo $this->Form->input('fax', array("class" => "xlarge validate[required]", "type" => "text")); ?>
			<p>
				<div class="submit">
					<input class="btn success" type="submit" value="Continuar cadastro">
				</div>
			</p>

	    </div>
	    </div>
	
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<div id="nova-atuacao">
	
</div>
