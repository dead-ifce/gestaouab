<?php
class DadosViagemOnibus extends AppModel {
	var $name = 'DadosViagemOnibus';
	var $useTable = 'dados_viagem_onibus';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Viagem' => array(
			'className' => 'Viagem',
			'foreignKey' => 'viagem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Companhia' => array(
			'className' => 'Companhia',
			'foreignKey' => 'companhia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>