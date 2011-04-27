<?php
class DadosViagemCarrosController extends AppController {

	var $name = 'DadosViagemCarros';

	function index() {
		$this->DadosViagemCarro->recursive = 0;
		$this->set('dadosViagemCarros', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dados viagem carro', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dadosViagemCarro', $this->DadosViagemCarro->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DadosViagemCarro->create();
			if ($this->DadosViagemCarro->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem carro has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem carro could not be saved. Please, try again.', true));
			}
		}
		$viagens = $this->DadosViagemCarro->Viagem->find('list');
		$this->set(compact('viagens'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dados viagem carro', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DadosViagemCarro->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem carro has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem carro could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DadosViagemCarro->read(null, $id);
		}
		$viagens = $this->DadosViagemCarro->Viagem->find('list');
		$this->set(compact('viagens'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dados viagem carro', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DadosViagemCarro->delete($id)) {
			$this->Session->setFlash(__('Dados viagem carro deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dados viagem carro was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>