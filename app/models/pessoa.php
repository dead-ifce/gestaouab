<?php
class Pessoa extends AppModel {
	var $name = 'Pessoa';
	var $useDbConfig = 'schema_uab';
	
	
	var $hasMany = array("Atuacao","Formacao"); 
	
	//var $hasAndBelongsToMany = "Funcao";
	var $hasAndBelongsToMany = array('Funcao', "Calendario");
	
	function ajustarData(){
		if (preg_match('/\d{1,2}\/\d{1,2}\/\d{2,4}/', $this->data["Pessoa"]["nascimento"])){	
			list($dia, $mes, $ano) = explode('/', $this->data["Pessoa"]["nascimento"]);
			if (strlen($ano) == 2) {
				if ($ano > 50) {
					$ano += 1900;
				} else {
					$ano += 2000;
				}
			}
		
			$this->data["Pessoa"]["nascimento"] = "$ano-$mes-$dia";
		}
		return true;
	}
	function beforeSave($options) {
		$this->data["Pessoa"]["nome"] = ucwords(strtolower($this->data["Pessoa"]["nome"]));
		$this->ajustarData();
		return true;
	}
}
?>