
<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/jquery/jquery-ui-1.8.16.custom.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap")); ?>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Login</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<?php

		    echo $this->Form->create(array('action'=>'login'));

		    echo $this->Form->inputs(array(
		     'legend' => 'Login',
		     'username',
		     'password'
		     ));

		    echo $this->Form->end('Login');

		?>
		
	</div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

