<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
    	$("#turmasTable").tablesorter({ sortList: [[0,1]] });
		
	});
</script>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Turmas</h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			<div class="span15 columns">
			
			<table id="turmasTable" class="zebra-striped">			
			<thead>	
				<tr>
					<th>Turma</th>
					<th>Curso</th>
					<th>Ações</th>
				</tr>
			</thead>
				<tbody>
				<?php foreach ($turmas as $turma):?>
				<tr>
					<td><?php echo $turma['Turma']['nome']; ?></td>
					<td>
						<?php echo $this->Html->link($turma['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $turma['Curso']['id'])); ?>
					</td>
					<!--
					<td>
						<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $turma['Turma']['id'])); ?>
						<?php echo $this->Html->link(__('Apagar', true), array('action' => 'delete', $turma['Turma']['id']), null, sprintf(__('Você tem certeza que deseja apagar essa turma?', true), $turma['Turma']['id'])); ?>
					</td>
					-->
					<td>

					    <?php if($grupo == 1) : ?>

						<?php echo $this->Html->link(
							$this->Html->image('edit.ico',array('alt'=> __('Visualizar pessoas', true),'title'=>'editar', 'border' => '0')),array('action'=>'edit', $turma['Turma']['id']),array('target' => '_self', 'escape' => false)); ?>
                        
                      
						<?php echo $this->Html->link(
							$this->Html->image('del_btn.png',array('alt'=> __('Deletar pessoas', true),'title'=>'excluir', 'border' => '0')),array('action'=>'delete', $turma['Turma']['id']),array('target' => '_self', 'escape' => false), sprintf(__('Você tem certeza que deseja apagar essa pessoa?', true), $turma['Curso']['id'])); ?>
					    
					    <?php endif ; ?>

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
</div>		<!-- .block ends -->


