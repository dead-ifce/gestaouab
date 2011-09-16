<?php
class TurmasController extends AppController {

	var $name = 'Turmas';
	var $helpers = array("Html","Javascript");
	
	function index() {
		//$this->Turma->recursive = 1;
		$this->set('turmas', $this->paginate());
		
		//debug($this->Turma->find('all'));
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
				$this->Session->setFlash(__('The turma has been saved', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
		}
		$cursos = $this->Turma->Curso->find('list', array("fields" => array("Curso.id", "Curso.nome")));
		$polos = $this->Turma->Polo->find('list', array("fields" => array("Polo.id", "Polo.nome")));
		$disciplinas = array();
		$this->set(compact('polos', 'disciplinas',"cursos"));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid turma', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Turma->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Turma->read(null, $id);
		}
		$cursos = $this->Turma->Curso->find('list',array("fields" => array("Curso.id","Curso.nome")));
		$polos = $this->Turma->Polo->find('list',array("fields" => array("Polo.id","Polo.nome")));
		$disciplinas = $this->Turma->Disciplina->find('list',array("fields" => array("Disciplina.id","Disciplina.nome")));
		$this->set(compact('polos', 'disciplinas','cursos'));
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
	
	function getDisciplinasByCurso($curso_id = null) {
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$curso = $this->Curso->findById($curso_id);
		$disciplinas = $curso['Disciplina'];

		echo "<option value=0>Selecione...</option>";
		foreach($disciplinas as $disciplina){
			$id = $disciplina['id'];
			$nome = $disciplina['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}
	
	
}
?>