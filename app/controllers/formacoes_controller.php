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
				$this->Session->setFlash(__('TFormação salva corretamente', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('controller' => 'pessoas', 'action' => 'view', $this->data["Formacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('Formação não pode ser salva. Por favor, tente novamente', true),"default",array("class" => "alert-message error"));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Formacao->read(null, $id);
		}
	}
	
	function add($pessoa_id = null){
		

		if (!empty($this->data)) {
			
			if($this->Session->check('Formacao')){
				$formacoes = $this->Session->read('Formacao');
				$this->Session->delete('Formacao');
				$formacoes[] = $this->data['Formacao'];
				$this->Session->write('Formacao', $formacoes);
				
			}else{
				$formacoes[] = $this->data['Formacao'];
				$this->Session->write('Formacao', $formacoes);
			}
		
		}
		
		//debug($this->Session->read());
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
				$this->Session->setFlash(__('Formação salva corretamente', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('controller'=> 'pessoas','action' => 'view', $this->data["Formacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('Formação não pode ser salva. Por favor, tente novamente', true),"default",array("class" => "alert-message error"));
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
			$this->Session->setFlash(__('Formação apagada', true),"default",array("class" => "alert-message success"));
			$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
		}
		$this->Session->setFlash(__('Formação não foi apagada', true));
		$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id),"default",array("class" => "alert-message error"));
	}
	
}	
	
?>