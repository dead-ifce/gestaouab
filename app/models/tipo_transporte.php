<?php
class TipoTransporte extends AppModel {
	var $name = 'TipoTransporte';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Viagem' => array(
			'className' => 'Viagem',
			'foreignKey' => 'tipo_transporte_id',
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