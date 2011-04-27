<?php
class DadosViagemOnibusesController extends AppController {

	var $name = 'DadosViagemOnibuses';

	function index() {
		$this->DadosViagemOnibus->recursive = 0;
		$this->set('dadosViagemOnibuses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dados viagem onibus', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dadosViagemOnibus', $this->DadosViagemOnibus->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DadosViagemOnibus->create();
			if ($this->DadosViagemOnibus->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem onibus has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem onibus could not be saved. Please, try again.', true));
			}
		}
		$viagens = $this->DadosViagemOnibus->Viagem->find('list');
		$companhias = $this->DadosViagemOnibus->Companhium->find('list');
		$this->set(compact('viagens', 'companhias'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dados viagem onibus', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DadosViagemOnibus->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem onibus has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem onibus could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DadosViagemOnibus->read(null, $id);
		}
		$viagens = $this->DadosViagemOnibus->Viagem->find('list');
		$companhias = $this->DadosViagemOnibus->Companhium->find('list');
		$this->set(compact('viagens', 'companhias'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dados viagem onibus', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DadosViagemOnibus->delete($id)) {
			$this->Session->setFlash(__('Dados viagem onibus deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dados viagem onibus was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>