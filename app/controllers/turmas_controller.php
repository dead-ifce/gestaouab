<?php
class TurmasController extends AppController {

	var $name = 'Turmas';

	function index() {
		//$this->Turma->recursive = 1;
		$this->set('turmas', $this->paginate());
		
		debug($this->Turma->find('all'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid turma', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('turma', $this->Turma->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Turma->create();
			if ($this->Turma->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true));
			}
		}
		$polos = $this->Turma->Polo->find('list');
		$disciplinas = $this->Turma->Disciplina->find('list');
		$this->set(compact('polos', 'disciplinas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid turma', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Turma->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Turma->read(null, $id);
		}
		$polos = $this->Turma->Polo->find('list');
		$disciplinas = $this->Turma->Disciplina->find('list');
		$this->set(compact('polos', 'disciplinas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for turma', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Turma->delete($id)) {
			$this->Session->setFlash(__('Turma deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Turma was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>