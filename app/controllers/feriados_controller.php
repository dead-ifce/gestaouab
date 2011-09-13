<?php
class FeriadosController extends AppController {

	var $name = 'Feriados';

	function index() {
		$this->Feriado->recursive = 0;
		$this->set('feriados', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid feriado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('feriado', $this->Feriado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Feriado->create();
			if ($this->Feriado->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid feriado', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Feriado->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Feriado->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for feriado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Feriado->delete($id)) {
			$this->Session->setFlash(__('Feriado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Feriado was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>