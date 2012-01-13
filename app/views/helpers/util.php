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
	
	function filterEvento($eventos, $disciplina){
	    $eventos_filtered = array();
	    foreach($eventos as $evento){
	        if($evento['Disciplina']['nome'] == $disciplina){
	            array_push($eventos_filtered, $evento );
	        }
	    }
	    return $eventos_filtered;
	}
	function printAula($inicio = null, $fim = null,$aula){
		return "<b>AULA $aula:</b> ".date('d-m-Y', strtotime($inicio)). " a ".date('d-m-Y', strtotime($fim));
	}
	
	function printEncontro($inicio = null, $fim = null){
		return "<b>Encontro Presencial:</b> ".date('d-m-Y', strtotime($inicio)). " (".
									date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
	}
	
	function printExame($inicio = null, $fim = null){
		return "<b>Encontro Exame:</b> ".date('d-m-Y', strtotime($inicio)). " (".
									date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
	}
	
	function printSegundaChamada($inicio = null, $fim = null){
		return "<b>Segunda Chamada:</b> ".date('d-m-Y', strtotime($inicio)). " (".
									date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
	}
	function printExameFinal($inicio = null, $fim = null){
		return "<b>Exame Final:</b> ".date('d-m-Y', strtotime($inicio)). " (".
									date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
	}
	
	function printEventos($eventos){
		$aula = 1;
		
		foreach($eventos as $evento){

			switch ($evento['tipoevento_id']) {
				case 5:
					echo $this->printAula($evento['inicio'],$evento['fim'],$aula)."<br />";
					$aula +=1;
		 			break;    
				case 1:       
					echo $this->printEncontro($evento['inicio'],$evento['fim'])."<br />";
					break;    
			    case 2:       
			 	    echo $this->printExame($evento['inicio'],$evento['fim'])."<br />";
			 	    break;    
				case 3:       
			 	    echo $this->printSegundaChamada($evento['inicio'],$evento['fim'])."<br />";
			 	    break;    
				case 4:       
			 	    echo $this->printExameFinal($evento['inicio'],$evento['fim'])."<br />";
			 	    break;
				default:

					break;
			}
		}
	}
	
}

?>
