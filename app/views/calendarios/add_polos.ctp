<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min","/js/chosen.jquery.min")); ?>

<?php echo $this->Html->css(array("bootstrap","chosen")); ?>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Adicionar Pólos</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
        <div class="pessoas">
            <?php echo $this->Form->create('Calendario', array('action' => 'add_polos')); ?>
            <?php echo $this->Form->input("Calendario.id", array("type" => 'hidden')) ?>
            <?php echo $this->Form->input("Calendario.ano", array("type" => 'hidden')) ?>
            <?php echo $this->Form->input("Calendario.semestre", array("type" => 'hidden')) ?>
            <?php echo $this->Form->input("Calendario.curso_id", array("type" => 'hidden')) ?>
            <?php echo $this->Form->input("Polo", array("type" => 'select', "multiple" => true, "label" => false, "class" => "chzn-select xlarge")) ?>
            <p style="padding-top:10px">
    			<input type="submit" class="btn primary" value="Salvar" id="button"/>
    		</p>
    		<p style="padding-top:10px">
    			<a href="/sisgest/calendarios/ver/<?php echo $this->data['Calendario']['curso_id'].'/'.$this->data['Calendario']['ano']. '/'. $this->data['Calendario']['semestre'] ?>" class="btn">Voltar</a>
    		</p>
        </div>
    </div>		<!-- .block_content ends -->

	<div class="bendl"></div>
	<div class="bendr"></div>

</div>		<!-- .block.small.left ends -->

<script type="text/javascript" charset="utf-8">
    $(function() {
        
        $(".chzn-select").chosen();
       
    });
</script>