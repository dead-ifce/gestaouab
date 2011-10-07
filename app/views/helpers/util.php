<?php
/* /app/views/helpers/link.php */

class UtilHelper extends AppHelper {
    
	function showStatus($status){
		switch ($status) {
			case 1:
				return "Conferido";
				break;
			case 2:
				return "Pendente";
				break;
			case 3:
				return "Indeferida";
				break;
			
		}
	}	
}

?>
