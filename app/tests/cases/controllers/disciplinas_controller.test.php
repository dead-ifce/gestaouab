<?php
/* Disciplinas Test cases generated on: 2011-03-21 13:33:12 : 1300714392*/
App::import('Controller', 'Disciplinas');

class TestDisciplinasController extends DisciplinasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class DisciplinasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.disciplina', 'app.curso', 'app.cursos_disciplina', 'app.turma', 'app.polo', 'app.cursos_polo', 'app.disciplinas_turma');

	function startTest() {
		$this->Disciplinas =& new TestDisciplinasController();
		$this->Disciplinas->constructClasses();
	}

	function endTest() {
		unset($this->Disciplinas);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>