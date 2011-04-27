<div class="feriados form">
<?php echo $this->Form->create('Feriado');?>
	<fieldset>
 		<legend><?php __('Add Feriado'); ?></legend>
	<?php
		echo $this->Form->input('data');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Feriados', true), array('action' => 'index'));?></li>
	</ul>
</div>