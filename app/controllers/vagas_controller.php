<?php
class VagasController extends AppController {

	var $name = 'Vagas';
	
	var $helpers = array('Javascript');
	
	
	function index() {
		debug($this->Vaga->findById(1));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid vaga', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('vaga', $this->Vaga->read(null, $id));
	}

	function add($edital_id = null) {
		
		if (!empty($this->data)) {
			$this->Vaga->create();
			if ($this->Vaga->saveAll($this->data)) {
				$this->Session->setFlash(__('The vaga has been saved', true));
				$this->redirect(array('action' => 'add',$this->data['Vaga']['edital_id']));
			} else {
				$this->Session->setFlash(__('The vaga could not be saved. Please, try again.', true));
			}
		}
		
		$vagas = $this->Vaga->findAllByEditalId($edital_id);
		$edital = $this->Vaga->Edital->findById($edital_id);
		$polos = $this->Vaga->Polo->find('list', array('fields' => array('id','nome')));
		$cursos = $this->Vaga->Curso->find('list', array('fields' => array('id','nome')));
		$disciplinas = $this->Vaga->Disciplina->find('list', array('fields' => array('id','nome')));
		$this->set(compact('edital', 'polos', 'cursos', 'disciplinas','vagas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid vaga', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Vaga->save($this->data)) {
				$this->Session->setFlash(__('The vaga has been saved', true));
				$this->redirect(array('action' => 'add',$this->data['Vaga']['edital_id']));
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
		
		$edital_id = $this->Vaga->read('edital_id', $id);
		if ($this->Vaga->delete($id)) {
			$this->Session->setFlash(__('Vaga deleted', true));
			$this->redirect(array('action'=>'add', $edital_id['Vaga']['edital_id']));
		}
		$this->Session->setFlash(__('Vaga was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getDisciplinasByCurso($curso_id = null) {
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$curso = $this->Vaga->Curso->findById($curso_id);
		$disciplinas = $curso['Disciplina'];

		foreach($disciplinas as $disciplina){
			$id = $disciplina['id'];
			$nome = $disciplina['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}
	
}
?>