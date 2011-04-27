<?php
class Companhia extends AppModel {
	var $name = 'Companhia';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'DadosViagemOnibus' => array(
			'className' => 'DadosViagemOnibus',
			'foreignKey' => 'companhia_id',
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