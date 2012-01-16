<?php //echo $this->Html->charset(); ?>
<?php 
			echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.13.custom.min',
																	 'fullcalendar/fullcalendar')); 
			echo $html->css(array("bootstrap",'jquery-ui-1.8.13.custom','fullcalendar',"reset",'custom'
												));	
?>
	
<style type="text/css" media="screen">
	.block form .cmf-skinned-select {
		margin-right:auto;
		margin-left:auto;
		text-align: center;
	}
	
	#edit-dialog .block {
		background: none;
		margin-bottom: 5px;
	}
	.btn{
	    margin-left: 55px;
	    margin-bottom: 15px
	}
</style>	

		
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Edição de calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
		<?php if($conflitos!=null):?>
		<div id="avisos" class="message warning"><p>Este calendário possui algum conflito. Por favor, verifique as datas logo abaixo.</p></div>
		<?php endif; ?>
		
		<div id="calendar"  class="reset_fc"></div>
		<a style="" class="btn primary" href="/sisgest/calendarios/ver/<?php echo $this->params['turma_id']."/".$this->params['ano']."/".$this->params['semestre'] ?>">Visualizar</a>
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
			
			
<div id="edit-dialog" title='Você deseja...'>
			<div class="block" >
				<div style="text-align: center; margin-top:20px;">
						<p><input type="submit" class="submit long" value="Editar" id="edit-button"/></p>	
						<p><input type="submit" class="submit long" value="Apagar" id="del-button"/></p>
				</div>
				
			</div>
</div>

<div style="display: none" id="edit-event">
	
	 <b>Evento:</b>
	<span id="evento-title"></span>
	<form>
	  <b>Dia</b>
	  <input type="text" focus="remove" class="small input_date" name="dia" id="dia"/><br/>
	 </form>
</div>

<div id="new-event-dialog" title="Novo evento">

</div>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
			
			
			$("#button").click(function(){
				var value = $('#Disciplina :selected').val();
				window.location = "<?php echo Dispatcher::baseUrl();?>/calendarios/imprimir/<?php echo $turma_id;?>/"+value;

			});
			
			$( ".input_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
			
			$("#edit-dialog").hide();
	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	        editable: true,
	        header: {
						left: 'prev,next today ',
						center: 'title',
						right:'month,agendaWeek,agendaDay'
					},
	        events: "<?php echo Dispatcher::baseUrl();?>/calendarios/feed/<?php echo $this->params['turma_id']?>/<?php echo $this->params['ano']?>/<?php echo $this->params['semestre']?>",
			eventClick: function(calEvent, jsEvent, view) {
				
				$("#evento-title").html(calEvent.title);
				
				$( '#edit-dialog' ).dialog();//FIM DO EDIT-DIALOG
		  	
		
				$("#edit-button").click(function(){
					
					$( '#edit-event' ).
					dialog(
						{
							modal: true,
							width: 330,
							buttons: [
							{
								text: "Ok",
								click: function() {
									var dia = $('#dia').val();
									$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/edit_evento/"+ calEvent.id,
									{novaData: dia, velhaData: calEvent.start.toString()},
									function(data) {
										$('#edit-event').dialog("close");
										$('#edit-dialog').dialog("close")
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
				
					
				});
				
				$("#del-button").click(function(){
						
						decisao = confirm("Você deseja realmente apagar este evento?");
						
						if (decisao){
							
							$.get("<?php echo Dispatcher::baseUrl();?>/eventos/ajax_delete/"+calEvent.id,function(data) {
							  	$('#edit-dialog').dialog("close")
									$('#calendar').fullCalendar( 'refetchEvents' );
							});
							
						}

				});
				
		  },//FIM DO EVENT-CLICK
			dayClick: function(date, allDay, jsEvent, view) {
				   $( '#new-event-dialog' ).
							dialog(
								{
									modal: true,
									buttons: [
									    {
									        text: "Ok",
									        click: function() { 
															
															var tipo_de_evento = $('#EventoTipoeventoId :selected').val();
															var disciplina = $('#EventoDisciplinaId :selected').val();
															var turno_raw = $('#EventoTurno :selected').val();
															
									 						$.post("<?php echo Dispatcher::baseUrl();?>/eventos/ajax_add/"+"<?php echo $turma_id; ?>"+"/"+$.fullCalendar.formatDate( date, "dd/MM/yyyy/"),
									 					   		{
																		tipoEvento: tipo_de_evento, 
																		disciplina_id: disciplina,
																		turno: turno_raw
																	},
															   	function(data) {
																		$('#new-event-dialog').dialog("close");
																		$('#calendar').fullCalendar( 'refetchEvents' );
															   	});//FIM DO POST
														
						
								 						}//FIM DO CLICK
												
									    },
											{
										       text: "Cancelar",
										       click: function() { $(this).dialog("close"); }
										  }
									]
								}
						
					 );//FIM DO NEW EVENT DIALOG
					
					 $( '#new-event-dialog' ).load("<?php echo Dispatcher::baseUrl();?>/eventos/add/<?php echo $turma_id ?>");
				    
				},//FIM DO DAYCLICK
			eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
				if (dayDelta>=0) {
					dayDelta = "+"+dayDelta;
				}
				if (minuteDelta>=0) {
					minuteDelta="+"+minuteDelta;
				}
				
				$.get("<?php echo Dispatcher::baseUrl();?>/calendarios/move/"+event.id+"/"+dayDelta+"/"+minuteDelta+"/"+allDay, 
						function(data) {
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
						});//FIM DO GET
			}//FIM DO EVENT-DROP
			
	    });//FIM DO CALENDAR
	
			
	});
</script>