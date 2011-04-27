<?php
/* Evento Fixture generated on: 2011-04-13 19:22:59 : 1302722579 */
class EventoFixture extends CakeTestFixture {
	var $name = 'Evento';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
		'tipoevento_id' => array('type' => 'integer', 'null' => false),
		'disciplina_id' => array('type' => 'integer', 'null' => false),
		'turma_id' => array('type' => 'integer', 'null' => false),
		'inicio' => array('type' => 'date', 'null' => false),
		'fim' => array('type' => 'date', 'null' => false),
		'carga_horaria' => array('type' => 'integer', 'null' => true),
		'turno' => array('type' => 'integer', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'tipoevento_id' => 1,
			'disciplina_id' => 1,
			'turma_id' => 1,
			'inicio' => '2011-04-13',
			'fim' => '2011-04-13',
			'carga_horaria' => 1,
			'turno' => 1
		),
	);
}
?>