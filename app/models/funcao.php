<?php
class Funcao extends AppModel {
	var $name = 'Funcao';
	var $useDbConfig = 'schema_uab';
	
	
	var $hasMany = "Atuacao";
	
	var $hasAndBelongsToMany = "Pessoa";
	 
}
?>