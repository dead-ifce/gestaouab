<?php
class DisciplinasController extends AppController {

	var $name = 'Disciplinas';

	function index() {
		$this->Disciplina->recursive = 0;
		$this->set('disciplinas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid disciplina', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disciplina', $this->Disciplina->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			debug($this->data);
			$this->Disciplina->create();
			
			// if ($this->Disciplina->save($this->data)) {
			// 				$this->Session->setFlash(__('The disciplina has been saved', true));
			// 				$this->redirect(array('action' => 'index'));
			// 			} else {
			// 				$this->Session->setFlash(__('The disciplina could not be saved. Please, try again.', true));
			// 			}
		}
		$cursos = $this->Disciplina->Curso->find('list');
		$turmas = $this->Disciplina->Turma->find('list');
		$this->set(compact('cursos', 'turmas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disciplina', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Disciplina->save($this->data)) {
				$this->Session->setFlash(__('The disciplina has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disciplina could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Disciplina->read(null, $id);
		}
		$cursos = $this->Disciplina->Curso->find('list');
		$turmas = $this->Disciplina->Turma->find('list');
		$this->set(compact('cursos', 'turmas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disciplina', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Disciplina->delete($id)) {
			$this->Session->setFlash(__('Disciplina deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disciplina was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>