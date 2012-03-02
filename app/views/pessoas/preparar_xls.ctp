<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>


<style type="text/css" media="screen">
	.xlarge { 
		height: 100px;
	}
	
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>GERAR PLANILHA</h2>
	</div>		<!-- .block_head ends -->
	
	
	
	<div class="block_content">
	<div class="row">
	    <div class="span15 columns">
			<div class="turmas form">
				<?php echo $this->Form->create('Pessoa', array("class" => "form-stacked"));?>
					

				<?php echo $this->Form->input('fields', array("class" => "xlarge validate[required]", 
														"type" => "select", 
														"label" => "Campos",
														"multiple" =>"multiple",

														"options" => array('nome' => 'Nome ', 
																		   'nascimento' => 'Nascimento ',
																		   'estadocivil' => 'Estado Civil ',
																		   'sexo' => 'Sexo ',
																		   'cpf' => 'CPF',
																		   'rg' => 'RG',
																		   'rg_orgao' => 'Orgão Emissor',
																		   'nacionalidade' => 'Nacionalidade',
																		   'naturalidade' => 'Naturalidade',
																		   'pai' => 'Pai',
																		   'mae' => 'Mãe')));
			?>
		
				<p><?php echo $this->Form->end(__('Adicionar', true));?></p>
			</div>
		</div>
	</div>

</div>		<!-- .block_content ends -->

<div class="bendl"></div>
<div class="bendr"></div>
</div>		<!-- .block ends -->