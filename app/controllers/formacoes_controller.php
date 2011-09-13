<?php
class FormacoesController extends AppController {

	var $name = 'Formacoes';
	var $helpers = array('Javascript',"Estudo");
	
	var $uses = array('Pessoa', "Atuacao", "Curso", "Disciplina", "Funcao","Formacao");
	
	function index() {
		
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
}	
	
?>