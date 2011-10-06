<?php
class VagasController extends AppController {

	var $name = 'Vagas';

	function index() {
		$this->Vaga->recursive = 0;
		$this->set('vagas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid vaga', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('vaga', $this->Vaga->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Vaga->create();
			if ($this->Vaga->save($this->data)) {
				$this->Session->setFlash(__('The vaga has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vaga could not be saved. Please, try again.', true));
			}
		}
		$editais = $this->Vaga->Edital->find('list');
		$polos = $this->Vaga->Polo->find('list');
		$cursos = $this->Vaga->Curso->find('list');
		$disciplinas = $this->Vaga->Disciplina->find('list');
		$this->set(compact('editais', 'polos', 'cursos', 'disciplinas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid vaga', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Vaga->save($this->data)) {
				$this->Session->setFlash(__('The vaga has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vaga could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Vaga->read(null, $id);
		}
		$editais = $this->Vaga->Edital->find('list');
		$polos = $this->Vaga->Polo->find('list');
		$cursos = $this->Vaga->Curso->find('list');
		$disciplinas = $this->Vaga->Disciplina->find('list');
		$this->set(compact('editais', 'polos', 'cursos', 'disciplinas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for vaga', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Vaga->delete($id)) {
			$this->Session->setFlash(__('Vaga deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Vaga was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>