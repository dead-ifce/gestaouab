<div class="editais form">
<?php echo $this->Form->create('Edital');?>
	<fieldset>
 		<legend><?php __('Add Edital'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('ano');
		echo $this->Form->input('inicio');
		echo $this->Form->input('fim');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Editais', true), array('action' => 'index'));?></li>
	</ul>
</div>