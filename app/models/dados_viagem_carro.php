<?php
class DadosViagemCarro extends AppModel {
	var $name = 'DadosViagemCarro';
	var $useTable = 'dados_viagem_carro';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Viagem' => array(
			'className' => 'Viagem',
			'foreignKey' => 'viagem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>