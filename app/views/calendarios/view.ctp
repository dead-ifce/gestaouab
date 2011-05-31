<?php 
	echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.11.custom.min','fullcalendar/fullcalendar')); 
	echo $html->css(array('fullcalendar','custom'));	
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {

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
				open("<?php echo Dispatcher::baseUrl();?>/eventos/edit/"+calEvent.id);

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

<div id="conflitos">
	<h2>Dias com conflitos</h2>
	<ul>
		<?php foreach($conflitos as $conflito): ?>
			<li><?php echo $conflito['Conflito']['dia'] ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<div id="calendar"></div>


