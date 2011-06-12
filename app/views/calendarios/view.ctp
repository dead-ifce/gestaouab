<?php //echo $this->Html->charset(); ?>
<?php 
			echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.13.custom.min',
																	 'fullcalendar/fullcalendar')); 
			echo $html->css(array('jquery-ui-1.8.13.custom','fullcalendar',"reset",'custom'
												));	
?>
	
<style type="text/css" media="screen">
	.block form .cmf-skinned-select {
		margin-right:auto;
		margin-left:auto;
		text-align: center;
	}
</style>	

		
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Calendário: <?php echo $detalhes_turma["Curso"]["nome"]." - ".$detalhes_turma["Turma"]["nome"] ?></h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php if($conflitos!=null):?>
		<div id="avisos" class="message warning"><p>Este calendário possui algum conflito. Por favor, verifique as datas logo abaixo.</p></div>
		<?php endif; ?>
		
		<div id="calendar"  class="reset_fc"></div>
	
		<div id="imprimir-button">
			<form method="post">
					<p><?php echo $form->input('Disciplina',array('options' => $disciplinas,
																										 'empty' => 'Selecione...',
																										 'class' => "styled")); ?></p>
																									
			</form>
				<p><input type="submit" class="submit long" value="Imprimir calendário" id="button"/></p>	
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
	
</div>		<!-- .block.small.left ends -->		
<?php if($conflitos!=null):?>
	
	<div id="block_conflitos" class="block small left">
	
		<div class="block_head">
			<div class="bheadl"></div>
			<div class="bheadr"></div>
			
			<h2>Conflitos</h2>	
		</div>		<!-- .block_head ends -->
		
		<div class="block_content">
		
		<div id="list_wrapper">
			
			<ul class="multiple_columns" id="conflitos">
	        <?php foreach ($conflitos as $conflito): ?>
	        	<li class="message_cft"><?php echo $conflito['Conflito']["dia"] ?></li>
	        <?php endforeach ?>
	    </ul>
			</div>
			
		</div>		<!-- .block_content ends -->
		
		<div class="bendl"></div>
		<div class="bendr"></div>
		
	</div>		<!-- .block.small.left ends -->
<?php endif; ?>		
			
			
<div id="edit-dialog" title='Editar'>
	<label>Turma:</label><br />
	<span id="turma"><?php echo $detalhes_turma["Curso"]["nome"]." - ".$detalhes_turma["Turma"]["nome"] ?></span><br />
	<label>Evento:</label><br />
	<span id="evento-title"></span>
	<form>
	  <label>Dia</label><br/>
	  <input type="text" focus="remove" class="title" name="dia" id="dia"/><br/>
	 </form>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
			$("#button").button();
			
			$("#button").click(function(){
				var value = $('#Disciplina :selected').val();
				window.location = "<?php echo Dispatcher::baseUrl();?>/calendarios/imprimir/<?php echo $turma_id;?>/"+value;

			});
			
			$( "#dia" ).datepicker({ dateFormat: 'yy-mm-dd' });
			$("#edit-dialog").hide();
	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	        editable: true,
	        header: {
						left: 'prev,next today ',
						center: 'title',
						right:'month,agendaWeek,agendaDay'
					},
	        events: "<?php echo Dispatcher::baseUrl();?>/calendarios/feed/<?php echo $turma_id?>",
			eventClick: function(calEvent, jsEvent, view) {
				
				$("#evento-title").html(calEvent.title);
				
				$( '#edit-dialog' ).
						dialog(
							 { 
									modal: true,
					 				width: 330,
									buttons: [
									    {
									        text: "Ok",
									        click: function() { 
								 						var dia = $('#dia').val();
								 						$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/edit_evento/"+calEvent.id,
								 					   {novaData: dia, velhaData: calEvent.start.toString()},
														   function(data) {
																	$('#edit-dialog').dialog("close");
																	$('#calendar').fullCalendar( 'refetchEvents' );
														   }); 
								
								 				}
									    },
											{
										       text: "Cancelar",
										       click: function() { $(this).dialog("close"); }
										  }
									]
								}
					
					);
				
		    },
			eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
				if (dayDelta>=0) {
					dayDelta = "+"+dayDelta;
				}
				if (minuteDelta>=0) {
					minuteDelta="+"+minuteDelta;
				}
				$.get("<?php echo Dispatcher::baseUrl();?>/calendarios/move/"+event.id+"/"+dayDelta+"/"+minuteDelta+"/"+allDay, 
						function(data) {
				  		//$('.result').html(data);
							if(data){
								if(data == "-"){
									var aviso = $("#avisos");
									aviso.removeClass("warning");
									aviso.addClass("success");
									aviso.html("<p>Todos os conflitos foram removidos com sucesso</p><span class='close' title='Dismiss'></span>");
									
									$("#block_conflitos").fadeOut('slow');
									
									$('.block .message .close').click(function () {
								        $(this).parent().fadeOut('slow', function () {
								            $(this).remove();
								        });
								    });
								
								}else{
									$('#conflitos').html(data);
								}
								
							}
				  		
				
				
						}
				);

			}
			
			
	    })
	});
</script>