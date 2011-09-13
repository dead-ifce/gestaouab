<?php
class Curso extends AppModel {
	var $name = 'Curso';
	var $useDbConfig = 'schema_uab';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Disciplina' => array(
			'className' => 'Disciplina',
			'joinTable' => 'cursos_disciplinas',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'disciplina_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>