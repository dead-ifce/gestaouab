<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/datatable/jquery.dataTables.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"style_white","/css/white_label/jquery.datatables")); ?>
<script>
	$(document).ready(function(){
    	oTable = $('#pessoas_table').dataTable({
		        "sPaginationType": "full_numbers",
				"oLanguage": {
				            "sUrl": "js/datatable/pt_BR.txt"
				        }
		    });
		

   	});
</script>
<style>

#pessoas_table{
	width: 100%;
	border-collapse:collapse;
	
}

</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Pessoas</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		
		<div class="row">
	    <div class="span14 columns">
	    	<table id="pessoas_table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Cel</th>
						<th>Atuações</th>
						<th>Formacao</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pessoas as $pessoa): ?>
						<tr>
							<td><?php echo $pessoa['Pessoa']['nome']; ?></td>
							<td><?php echo $pessoa['Pessoa']['email']; ?></td>
							<td><?php echo $pessoa['Pessoa']['cel']; ?></td>
							<td>
								<?php foreach ($pessoa["Atuacao"] as $atuacao): ?>
									<?php echo $atuacao['Funcao']['funcao']." - ".$atuacao["ano"].".".$atuacao["semestre"]; ?><br />
								<?php endforeach; ?>
							</td>
							<td>
								<?php foreach ($pessoa["Formacao"] as $formacao): ?>
									<?php echo $formacao["curso"]." - ".$formacao["instituicao"]."/".$formacao["conclusao"] ?><br />
								<?php endforeach; ?>
							</td>
							<td>
								<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $pessoa['Pessoa']['id'])); ?>
								<?php echo $this->Html->link(__('Apagar', true), array('action' => 'delete', $pessoa['Pessoa']['id']), null, sprintf(__('Você tem certeza que deseja apagar essa pessoa?', true), $pessoa['Pessoa']['id'])); ?>
							</td>
						</tr>	  	 
					<?php endforeach; ?>
				</tbody>
			</table>
			
	    </div>
	   
	    </div>
		
		
	
	</div>		<!-- .block_content ends -->

	 <div class="bendl"></div>
	 <div class="bendr"></div>

</div>		<!-- .block.small.left ends -->