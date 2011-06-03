<?php
$aula = 1;

foreach($eventos as $evento){
	
	switch ($evento['Evento']['tipoevento_id']) {
		case 5:
			echo $this->Date->printAula($evento['Evento']['inicio'],$evento['Evento']['fim'],$aula)."<br />";
			$aula +=1;
 			break;
		case 1:
			echo $this->Date->printEncontro($evento['Evento']['inicio'],$evento['Evento']['fim'])."<br />";
			break;
	  case 2:
	 	 echo $this->Date->printExame($evento['Evento']['inicio'],$evento['Evento']['fim'])."<br />";
	 	 break;
		case 3:
	 	 echo $this->Date->printSegundaChamada($evento['Evento']['inicio'],$evento['Evento']['fim'])."<br />";
	 	 break;
		case 4:
	 	 echo $this->Date->printExameFinal($evento['Evento']['inicio'],$evento['Evento']['fim'])."<br />";
	 	 break;
		default:
			
			break;
	}
	
}
?>
