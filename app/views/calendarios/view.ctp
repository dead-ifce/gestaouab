<?php 
			echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.13.custom.min',
																	 'fullcalendar/fullcalendar')); 
			echo $html->css(array('blueprint/screen','fullcalendar','custom','jquery-ui-1.8.13.custom'
												));	
?>


<div class="container">
	<div class="span-24">
		<h1>Calendarios</h1>
	</div>
	<div id="conflitos" class="span-6">
		<h2>Dias com conflitos</h2>
		<ul>
			<?php foreach($conflitos as $conflito): ?>
				<li><?php echo $conflito['Conflito']['dia'] ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	
	<div id="calendar" class="span-17 last"></div>
</div>

<div id="edit-dialog" title='Editar'>
	<form>
	  <label>Name</label><br/>
	  <input type="text" class="title" name="name" id="name"/><br/>
	 </form>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
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
				//open("<?php echo Dispatcher::baseUrl();?>/eventos/edit/"+calEvent.id);
				console.log(calEvent.start.toString());
				$( '#edit-dialog' ).
						dialog(
							 { 
									modal: true,
					 				width: 330,
									buttons: [
									    {
									        text: "Editar",
									        click: function() { 
								 						var dia = $('#name').val();
								 						$.post("<?php echo Dispatcher::baseUrl();?>/calendarios/edit_evento/"+calEvent.id,
								 						{novaData: dia, velhaData: calEvent.start.toString()}); 
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
				$.get("<?php echo Dispatcher::baseUrl();?>/calendarios/move/"+event.id+"/"+dayDelta+"/"+minuteDelta+"/"+allDay);

			}
			
			
	    })
	});
</script>