<?php
class Viagem extends AppModel {
	var $name = 'Viagem';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'TipoTransporte' => array(
			'className' => 'TipoTransporte',
			'foreignKey' => 'tipo_transporte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Convenio' => array(
			'className' => 'Convenio',
			'foreignKey' => 'convenio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'DadosViagemAviao' => array(
			'className' => 'DadosViagemAviao',
			'foreignKey' => 'viagem_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DadosViagemCarro' => array(
			'className' => 'DadosViagemCarro',
			'foreignKey' => 'viagem_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DadosViagemOnibus' => array(
			'className' => 'DadosViagemOnibus',
			'foreignKey' => 'viagem_id',
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