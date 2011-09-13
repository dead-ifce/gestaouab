<?php
class ConveniosController extends AppController {

	var $name = 'Convenios';

	function index() {
		$this->Convenio->recursive = 0;
		$this->set('convenios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid convenio', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('convenio', $this->Convenio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Convenio->create();
			if ($this->Convenio->save($this->data)) {
				$this->Session->setFlash(__('The convenio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The convenio could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid convenio', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Convenio->save($this->data)) {
				$this->Session->setFlash(__('The convenio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The convenio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Convenio->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for convenio', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Convenio->delete($id)) {
			$this->Session->setFlash(__('Convenio deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Convenio was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>