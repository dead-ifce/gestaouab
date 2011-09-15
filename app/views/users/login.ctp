
<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

<div class="block small">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2 style="text-align: center;float: none">Login</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<?php

		    echo $this->Form->create(array('action'=>'login', 'class' => "form-stacked"));
			echo $this->Form->input('email', array("type" => "text"));
			echo $this->Form->input('password',array("label" => "Senha"));
		?>
		<p>
			<div class="submit">
				<input class="btn success" type="submit" value="Login">
			</div>
		</p>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

