<?php
class Turma extends AppModel {
	var $name = 'Turma';
	var $useDbConfig = 'schema_uab';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Disciplina' => array(
			'className' => 'Disciplina',
			'joinTable' => 'disciplinas_turmas',
			'foreignKey' => 'turma_id',
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
		),
		'Polo' => array(
			'className' => 'Polo',
			'joinTable' => 'polos_turmas',
			'foreignKey' => 'turma_id',
			'associationForeignKey' => 'polo_id',
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