<?php
class DadosViagemAviaosController extends AppController {

	var $name = 'DadosViagemAviaos';

	function index() {
		$this->DadosViagemAviao->recursive = 0;
		$this->set('dadosViagemAviaos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dados viagem aviao', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dadosViagemAviao', $this->DadosViagemAviao->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DadosViagemAviao->create();
			if ($this->DadosViagemAviao->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem aviao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem aviao could not be saved. Please, try again.', true));
			}
		}
		$viagens = $this->DadosViagemAviao->Viagem->find('list');
		$this->set(compact('viagens'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dados viagem aviao', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DadosViagemAviao->save($this->data)) {
				$this->Session->setFlash(__('The dados viagem aviao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dados viagem aviao could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DadosViagemAviao->read(null, $id);
		}
		$viagens = $this->DadosViagemAviao->Viagem->find('list');
		$this->set(compact('viagens'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dados viagem aviao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DadosViagemAviao->delete($id)) {
			$this->Session->setFlash(__('Dados viagem aviao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dados viagem aviao was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>