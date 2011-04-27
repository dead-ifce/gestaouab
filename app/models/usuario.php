<?php
class Usuario extends AppModel {
	var $name = 'Usuario';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Viagem' => array(
			'className' => 'Viagem',
			'foreignKey' => 'usuario_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>