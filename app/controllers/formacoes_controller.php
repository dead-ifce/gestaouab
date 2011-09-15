<?php
class FormacoesController extends AppController {

	var $name = 'Formacoes';
	var $helpers = array('Javascript',"Estudo");
	
	var $uses = array('Pessoa', "Atuacao", "Curso", "Disciplina", "Funcao","Formacao");
	
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('add');
	}
	
	function index() {
		
	}
	
	function edit($id = null, $pessoa_id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Atuação Inválida', true));
			$this->redirect(array('controller' => 'pessoas','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Formacao->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true));
				$this->redirect(array('controller' => 'pessoas', 'action' => 'view', $this->data["Formacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Formacao->read(null, $id);
		}
	}
	
	function add($pessoa_id = null){
		
		if (!empty($this->data)) {
			$this->Formacao->create();
			if ($this->Formacao->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('action' => 'add', $this->data["Formacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
		
		$pessoa = $this->Pessoa->findById($pessoa_id);
		$this->set("pessoa", $pessoa);
		
		$formacoes = $this->Formacao->findAllByPessoaId($pessoa_id);
		//debug($formacoes);
		$this->set("formacoes", $formacoes);
		
	}
	
	function add_by_admin($pessoa_id = null){
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->Formacao->create();
			if ($this->Formacao->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('controller'=> 'pessoas','action' => 'view', $this->data["Formacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
		
		$this->set("pessoa",$pessoa_id);
	}
	
	
	function delete($id = null,$pessoa_id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for turma', true));
			$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
		}
		if ($this->Formacao->delete($id)) {
			$this->Session->setFlash(__('Turma deleted', true));
			$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
		}
		$this->Session->setFlash(__('Turma was not deleted', true));
		$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
	}
	
}	
	
?>