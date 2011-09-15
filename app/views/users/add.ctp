<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){

		$("#UserAddForm").validationEngine();

   	});
</script>
<div class="block small">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2 style="text-align: center;float: none">Adicionar Usuário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<?php
		     echo $this->Form->create(array('class' => "form-stacked"));
			 echo $this->Form->input('nome', array("type" => "text","class" => "validate[required]"));
		     echo $this->Form->input('email', array("type" => "text","label" => "Email","class" => "validate[required,custom[email]]"));
		     echo $this->Form->input('password', array("label" => "Senha","class" => "validate[required,minSize[6]]"));
			 echo $this->Form->input('password_confirm', array("type"=> "password", "label" => "Confirmar senha","class" => "validate[required,minSize[6]]"));
		?>
		<p>
			<div class="submit">
				<input class="btn success" type="submit" value="Cadastrar">
			</div>
		</p>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

