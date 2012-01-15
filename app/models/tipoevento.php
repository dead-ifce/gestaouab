<?php
class Tipoevento extends AppModel {
	var $useDbConfig = 'schema_uab';
	var $name = 'Tipoevento';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'tipoevento_id',
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