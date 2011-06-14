<?php

class DateComponent extends Object {
    /**
	 * Criado com o intuito de facilitar a visualização do código
	 * */
	function format($acao = null, $data = null ){
		return date('Y-m-d', strtotime($acao, strtotime($data)));
	}
	
	function turno($turno_raw){
		if($turno_raw == 0){
			$turno["inicio"] = "08:00:00";
			$turno["fim"] = "12:00:00";
			return $turno;
		}else{
			$turno["inicio"] = "14:00:00";
			$turno["fim"] = "18:00:00";
			return $turno;
		}
	}
	
}

?>
