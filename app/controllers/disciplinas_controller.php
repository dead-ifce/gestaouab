<?php
class DisciplinasController extends AppController {

	var $name = 'Disciplinas';
	var $helpers = array("Html","Javascript");
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
			$this->Disciplina->create();
			
		 if ($this->Disciplina->save($this->data)) {
		 				$this->Session->setFlash(__('The disciplina has been saved', true));
		 				$this->redirect(array('action' => 'index'));
		 			} else {
		 				$this->Session->setFlash(__('The disciplina could not be saved. Please, try again.', true));
		 			}
		}
		$cursos = $this->Disciplina->Curso->find('list', array("fields" => array("Curso.id", "Curso.nome")));
		$turmas = $this->Disciplina->Turma->find('list', array("fields" => array("Turma.id", "Turma.nome")));
		$this->set(compact('cursos','turmas'));
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
		$cursos = $this->Disciplina->Curso->find('list',array("fields" => array("Curso.id","Curso.nome")));
		$turmas = $this->Disciplina->Turma->find('list',array("fields" => array("Turma.id","Turma.nome")));
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
	
	function getTurmasByCurso($curso_id){
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$turmas = $this->Turma->find("list",array('conditions' => array('Turma.curso_id' => $curso_id),
												  'fields' => array('Turma.id','Turma.nome')));
	  echo "<option value=0>Selecione...</option>";
		  foreach($turmas as $key => $val) {
			echo "<option value=$key>$val</option>";
		  }						
	}
	
	
}
?>