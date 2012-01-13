<?php
class Calendario extends AppModel {
	var $name = 'Calendario';
	var $useDbConfig = 'default';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    //var $hasAndBelongsToMany = array('Polo');
	
	var $hasMany = array('Evento');
	
	var $belongsTo = array('Curso','Disciplina');
}
?>