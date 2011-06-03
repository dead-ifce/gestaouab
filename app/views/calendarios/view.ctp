<?php echo $this->Html->charset(); ?>
<?php 
			echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.13.custom.min',
																	 'fullcalendar/fullcalendar')); 
			echo $html->css(array('blueprint/screen','fullcalendar','custom','jquery-ui-1.8.13.custom'
												));	
?>


<div class="container">
	<?php echo $this->Session->flash(); ?>
	<div class="span-24">
		<h1>Calend&#225;rio: <?php echo $detalhes_turma["Curso"]["nome"]." - ".$detalhes_turma["Turma"]["nome"] ?> </h1>
	</div>
	<div class="column span-6">
		<h2>Dias com conflitos</h2>
		<ul id="conflitos">
			<?php foreach($conflitos as $conflito): ?>
				<li><?php echo $conflito["Conflito"]["dia"]; ?> </li>
			<?php endforeach;  ?>
		</ul>
	</div>
	
	<div id="calendar" class="column span-17 last"></div>
	<div id="imprimir-button" class="span-24">
		<?php echo $form->input('Disciplina',array('options' => $disciplinas,'empty' => 'Selecione...')); ?>
		<?php echo $form->button('Imprimir Calendario',array('id' => "button")); ?>
	</div>
</div>

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
								$('#conflitos').html(data);
							}
				  		
						}
				);

			}
			
			
	    })
	});
</script>