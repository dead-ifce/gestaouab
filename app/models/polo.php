<?php
class Polo extends AppModel {
	var $name = 'Polo';
	var $useDbConfig = 'schema_uab';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	// var $hasMany = array('Vaga');
	
	var $hasAndBelongsToMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'joinTable' => 'cursos_polos',
			'foreignKey' => 'polo_id',
			'associationForeignKey' => 'curso_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Turma' => array(
			'className' => 'Turma',
			'joinTable' => 'polos_turmas',
			'foreignKey' => 'polo_id',
			'associationForeignKey' => 'turma_id',
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