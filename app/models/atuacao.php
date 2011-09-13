<?php
class Atuacao extends AppModel {
	var $name = 'Atuacao';
	var $useDbConfig = 'schema_uab';
	
	
	var $belongsTo = array("Funcao", "Pessoa","Curso","Disciplina"); 
}
?>