<?php 
	echo $javascript->link(array('jquery/jquery-1.5.2.min','jquery/jquery-ui-1.8.11.custom.min','fullcalendar/fullcalendar')); 
	echo $html->css(array('fullcalendar','custom'));	
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {

	    // page is now ready, initialize the calendar...

	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	        events: <?php echo $eventos ?>
	    })
	});
</script>

<div id='calendar'></div>


