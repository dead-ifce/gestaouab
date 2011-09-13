<?php
class Pessoa extends AppModel {
	var $name = 'Pessoa';
	var $useDbConfig = 'schema_uab';
	
	
	var $hasMany = array("Atuacao","Formacao"); 
	
	var $hasAndBelongsToMany = "Funcao";

}
?>