<?php
class ViagensController extends AppController {

	var $name = 'Viagens';

	function index() {
		$this->Viagem->recursive = 0;
		$this->set('viagens', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid viagem', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('viagem', $this->Viagem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Viagem->create();
			if ($this->Viagem->save($this->data)) {
				$this->Session->setFlash(__('The viagem has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The viagem could not be saved. Please, try again.', true));
			}
		}
		$tipoTransportes = $this->Viagem->TipoTransporte->find('list');
		$usuarios = $this->Viagem->Usuario->find('list');
		$convenios = $this->Viagem->Convenio->find('list');
		$this->set(compact('tipoTransportes', 'usuarios', 'convenios'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid viagem', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Viagem->save($this->data)) {
				$this->Session->setFlash(__('The viagem has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The viagem could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Viagem->read(null, $id);
		}
		$tipoTransportes = $this->Viagem->TipoTransporte->find('list');
		$usuarios = $this->Viagem->Usuario->find('list');
		$convenios = $this->Viagem->Convenio->find('list');
		$this->set(compact('tipoTransportes', 'usuarios', 'convenios'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for viagem', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Viagem->delete($id)) {
			$this->Session->setFlash(__('Viagem deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Viagem was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>