<?php
class TipoTransportesController extends AppController {

	var $name = 'TipoTransportes';

	function index() {
		$this->TipoTransporte->recursive = 0;
		$this->set('tipoTransportes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tipo transporte', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tipoTransporte', $this->TipoTransporte->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TipoTransporte->create();
			if ($this->TipoTransporte->save($this->data)) {
				$this->Session->setFlash(__('The tipo transporte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo transporte could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tipo transporte', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TipoTransporte->save($this->data)) {
				$this->Session->setFlash(__('The tipo transporte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipo transporte could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TipoTransporte->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tipo transporte', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TipoTransporte->delete($id)) {
			$this->Session->setFlash(__('Tipo transporte deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tipo transporte was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>