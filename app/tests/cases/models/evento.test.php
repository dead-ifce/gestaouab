<?php
/* Evento Test cases generated on: 2011-04-12 19:57:07 : 1302638227*/
App::import('Model', 'Evento');

class EventoTestCase extends CakeTestCase {
	var $fixtures = array('app.evento', 'app.tipoevento', 'app.disciplina', 'app.curso', 'app.cursos_disciplina', 'app.turma', 'app.disciplinas_turma', 'app.polo', 'app.cursos_polo', 'app.polos_turma', 'app.eventos_polo');

	function startTest() {
		$this->Evento =& ClassRegistry::init('Evento');
	}

	function endTest() {
		unset($this->Evento);
		ClassRegistry::flush();
	}

}
?>