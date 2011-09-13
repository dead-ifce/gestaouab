<?php

class EstudoHelper extends AppHelper {
	
	
	function showTipo($tipo){
		
		switch ($tipo) {
			case 1:
				return "Graduação";
				break;
			case 2:
				return "Especialização";
				break;
			case 3:
				return "Mestrado";
				break;
			case 4:
				return "Doutorado";
				break;
		}
		
	}
	
	
}




?>