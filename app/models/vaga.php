<?php
class Vaga extends AppModel {
	var $name = 'Vaga';
	var $useDbConfig = 'schema_uab';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $belongsTo = array(
				'Edital' => array(
					'className' => 'Edital',
					'foreignKey' => 'edital_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
				),
				'Polo' => array(
					'className' => 'Polo',
					'foreignKey' => 'polo_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
				),
				'Curso' => array(
					'className' => 'Curso',
					'foreignKey' => 'curso_id',
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
				)
			);
}
?>