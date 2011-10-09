<?php
class PessoasController extends AppController {

	var $name = 'Pessoas';
	var $helpers = array('Javascript',"Estudo", "Util");
	var $uses = array('Pessoa', "Atuacao", "Curso", "Disciplina", "Funcao", 'Vaga','Inscricao','Edital');
	
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('add','vaga','getPolos','getCursos','getDisciplinas');
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
	
	
	function vaga($edital_id = null){
		if (!empty($this->data)) {
			
			$last_pessoa = $this->Pessoa->find('first', array("order" => "id DESC", 'fields' => array('id'), 'recursive' => 0));
			$this->data['Inscricao']['pessoa_id'] = $last_pessoa['Pessoa']['id'];
			
			$vaga = $this->Vaga->find('first', array('conditions' => array('edital_id' => $this->data['Inscricao']['edital_id'],
			 															   'polo_id' => $this->data['Inscricao']['polo_id'],
																		   'curso_id' => $this->data['Inscricao']['curso_id'],
																		   'disciplina_id' => $this->data['Inscricao']['disciplina_id'])));
			$this->data['Inscricao']['vaga_id'] = $vaga['Vaga']['id'];
			if($this->Inscricao->save($this->data)) {
				$this->Session->write('pessoa_id',$this->data['Inscricao']['pessoa_id']);
				$this->Session->setFlash(__('Inscricao salva', true),"default",array("class" => "alert-message success"));
				$this->redirect(array('action' => 'finalizada', 'controller' => 'inscricoes'));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true),"default",array("class" => "alert-message error"));
			}
			
		}
		
		$editais = $this->Edital->find('all', array('fields' => array('DISTINCT Edital.id','Edital.numero','Edital.ano')));
		
		foreach($editais as $edital){
			$nome = $edital['Edital']['numero']."/".$edital['Edital']['ano'];
			$list_editais[$edital['Edital']['id']] = $nome;
		}
		
		$this->set(compact('list_editais'));
	}
	
	
	
	//AJAX
	function getPolos($edital_id){
		$polos = $this->Vaga->find('all', array('conditions' => array("edital_id" => $edital_id),'fields' => array('DISTINCT Polo.id','Polo.nome'))); 
		
		foreach($polos as $polo){
			$id = $polo['Polo']['id'];
			$nome = $polo['Polo']['nome'];
			echo "<option value=$id>$nome</option>";
		}
		
	}
	function getCursos($edital_id, $polo_id){
		
		$cursos = $this->Vaga->find('all', array('conditions' => array("edital_id" => $edital_id, "polo_id" => $polo_id),'fields' => array('DISTINCT Curso.id','Curso.nome'))); 
		
		foreach($cursos as $curso){
			$id = $curso['Curso']['id'];
			$nome = $curso['Curso']['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}
	
	function getDisciplinas($edital_id, $polo_id, $curso_id){
		
		$disciplinas = $this->Vaga->find('all', array('conditions' => array("edital_id" => $edital_id, "polo_id" => $polo_id,'curso_id' => $curso_id),'fields' => array('DISTINCT Disciplina.id','Disciplina.nome')));
		
		foreach($disciplinas as $disciplina){
			$id = $disciplina['Disciplina']['id'];
			$nome = $disciplina['Disciplina']['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}
	
	function status($pessoa_id = null){
		
		if(!empty($this->data)){
			$this->Pessoa->read(null, $this->data["Pessoa"]['id']);
			$this->Pessoa->set(array(
				'status' => $this->data['Pessoa']['status']
			));
			
			if($this->Pessoa->save()){
				$this->redirect(array('action'=>'index'));
			}
		}
		
		$this->Pessoa->recursive = 0;
		$pessoa = $this->Pessoa->read(array("id"), $pessoa_id);
		$this->set("pessoa",$pessoa);
		
		
	}
}	
	
?>