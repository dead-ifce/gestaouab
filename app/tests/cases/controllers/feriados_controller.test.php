<?php
/* Feriados Test cases generated on: 2011-03-21 12:07:34 : 1300709254*/
App::import('Controller', 'Feriados');

class TestFeriadosController extends FeriadosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FeriadosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.feriado');

	function startTest() {
		$this->Feriados =& new TestFeriadosController();
		$this->Feriados->constructClasses();
	}

	function endTest() {
		unset($this->Feriados);
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