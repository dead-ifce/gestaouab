<?php
class PessoasController extends AppController {

	var $name = 'Pessoas';
	var $helpers = array('Javascript',"Estudo");
	var $uses = array('Pessoa', "Atuacao", "Curso", "Disciplina", "Funcao");
	
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('add');
	}
	
	function index() {
		$this->Pessoa->recursive = 2;
		$pessoas = $this->Pessoa->find("all");
		$this->set("pessoas",$pessoas);	
		
	}
	
	function view($id = null){
		$this->Pessoa->recursive = 2;
		$pessoa = $this->Pessoa->findById($id);
		$this->set("pessoa",$pessoa);
		//debug($pessoa);
	}
	
	function add(){
	
		if (!empty($this->data)) {
			$this->data["Pessoa"]["endereco"] = $this->data["Pessoa"]["rua"].", ".$this->data["Pessoa"]["numero"]." ".$this->data["Pessoa"]["complemento"]." - ".$this->data["Pessoa"]["bairro"].", ".$this->data["Pessoa"]["cidade"]." - ".$this->data["Pessoa"]["estado"].", ".$this->data["Pessoa"]["cep"];
			
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->data)) {
				//$this->Session->setFlash(__('The feriado has been saved', true),"default",array("class" => "alert-message success"));		
				
				if ($this->Session->read('Auth.User')){
					$this->redirect(array('controller' => 'atuacoes','action' => 'add', $this->Pessoa->getLastInsertID()));
				}else{
					$this->redirect(array('controller' => 'formacoes','action' => 'add', $this->Pessoa->getLastInsertID()));
				}
			} else {
				$this->Session->setFlash(__('A pessoa não pode ser salva corretamente. Por favor, tente novamente.', true),"default",array("class" => "alert-message error"));
			}
		}
		
		$cursos = $this->Curso->find("list",array("fields" => array("Curso.id","Curso.nome")));
		$this->set("cursos", $cursos);
        
		$disciplinas = $this->Disciplina->find("list",array("fields" => array("Disciplina.id","Disciplina.nome")));
		$this->set("disciplinas", $disciplinas);
        
		$funcoes = $this->Funcao->find("list",array("fields" => array("Funcao.id","Funcao.funcao")));
		$this->set("funcoes", $funcoes);
		
	}
	
	function edit($id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Pessoa Inválida', true));
			$this->redirect(array('controller' => 'pessoas','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pessoa->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Pessoa->read(null, $id);
			$this->data["Pessoa"]['nascimento'] = date('d/m/Y', strtotime($this->data["Pessoa"]["nascimento"]));
		}
		
		
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for turma', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pessoa->delete($id)) {
			$this->Session->setFlash(__('Turma deleted', true),"default",array("class" => "alert-message success"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Turma was not deleted', true),"default",array("class" => "alert-message error"));
		$this->redirect(array('action' => 'index'));
	}
}	
	
?>