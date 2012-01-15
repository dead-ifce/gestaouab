<?php
class Evento extends AppModel {
	var $useDbConfig = 'schema_uab';
	var $name = 'Evento';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    var $AULA = 5;
    var $belongsTo = array('Tipoevento', 'Disciplina', 'Turma', 'Calendario');
    
    
	
	

}
?>