<?php
class Calendario extends AppModel {
	var $name = 'Calendario';
	var $useDbConfig = 'schema_uab';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasAndBelongsToMany = array('Polo', "Pessoa");
	
	var $hasMany = array('Evento' => array('dependent' => true));
	
	var $belongsTo = array('Curso','Disciplina','Turma');
}
?>