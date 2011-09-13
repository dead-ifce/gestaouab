<?php
class Evento extends AppModel {
	var $name = 'Evento';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Tipoevento' => array(
			'className' => 'Tipoevento',
			'foreignKey' => 'tipoevento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Disciplina' => array(
			'className' => 'Disciplina',
			'foreignKey' => 'disciplina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Turma' => array(
			'className' => 'Turma',
			'foreignKey' => 'turma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Polo' => array(
			'className' => 'Polo',
			'joinTable' => 'eventos_polos',
			'foreignKey' => 'evento_id',
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