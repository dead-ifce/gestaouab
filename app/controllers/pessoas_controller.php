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
			$this->data["Pessoa"]["nascimento"] = date('Y-m-d', strtotime($this->data["Pessoa"]["nascimento"]));
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('controller' => 'atuacoes','action' => 'add', $this->Pessoa->getLastInsertID()));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
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
			$this->data["Pessoa"]["nascimento"] = date('Y-m-d', strtotime($this->data["Pessoa"]["nascimento"]));
			if ($this->Pessoa->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true));
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Pessoa->read(null, $id);
		}
		
		// $cursos = $this->Turma->Curso->find('list',array("fields" => array("Curso.id","Curso.nome")));
		// 		$polos = $this->Turma->Polo->find('list',array("fields" => array("Polo.id","Polo.nome")));
		// 		$disciplinas = $this->Turma->Disciplina->find('list',array("fields" => array("Disciplina.id","Disciplina.nome")));
		// 		$this->set(compact('polos', 'disciplinas','cursos'));
	}
	
}	
	
?>