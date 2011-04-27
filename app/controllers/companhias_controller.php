<?php
class CompanhiasController extends AppController {

	var $name = 'Companhias';

	function index() {
		$this->Companhia->recursive = 0;
		$this->set('companhias', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid companhia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('companhia', $this->Companhia->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Companhia->create();
			if ($this->Companhia->save($this->data)) {
				$this->Session->setFlash(__('The companhia has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companhia could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid companhia', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Companhia->save($this->data)) {
				$this->Session->setFlash(__('The companhia has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The companhia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Companhia->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for companhia', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Companhia->delete($id)) {
			$this->Session->setFlash(__('Companhia deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Companhia was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>