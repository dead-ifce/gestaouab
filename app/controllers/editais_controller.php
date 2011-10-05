<?php
class EditaisController extends AppController {

	var $name = 'Editais';
	var $helpers = array('Javascript');
	var $uses = array("Edital", "Curso", "Disciplina");
	
	function index() {
		$this->Edital->recursive = 0;
		$this->set('editais', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid edital', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('edital', $this->Edital->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Edital->create();
			if ($this->Edital->save($this->data)) {
				$this->Session->setFlash(__('The edital has been saved', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edital could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
		}
		
		$cursos = $this->Edital->Curso->find('list', array("fields" => array("Curso.id", "Curso.nome")));
		$this->set(compact('cursos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid edital', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Edital->save($this->data)) {
				$this->Session->setFlash(__('The edital has been saved', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edital could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Edital->read(null, $id);
			$cursos = $this->Edital->Curso->find('list', array("fields" => array("Curso.id", "Curso.nome")));
			$this->set(compact('cursos'));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for edital', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Edital->delete($id)) {
			$this->Session->setFlash(__('Edital deleted', true),"default",array("class" => "alert-message success"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Edital was not deleted', true),"default",array("class" => "alert-message error"));
		$this->redirect(array('action' => 'index'));
	}
	
	function getDisciplinasByCurso($curso_id = null) {
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$curso = $this->Curso->findById($curso_id);
		$disciplinas = $curso['Disciplina'];

		foreach($disciplinas as $disciplina){
			$id = $disciplina['id'];
			$nome = $disciplina['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}

}
?>