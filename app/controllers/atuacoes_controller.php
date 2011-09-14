<?php
class AtuacoesController extends AppController {

	var $name = 'Atuacoes';
	var $helpers = array('Javascript');
	var $uses = array('Pessoa', "Atuacao", "Curso", "Disciplina", "Funcao");
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('add');
	}
	
	function index() {
	}
	
	
	function add($pessoa_id = null){
		
		if (!empty($this->data)) {
			$this->Atuacao->create();
			if ($this->Atuacao->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('action' => 'add', $this->data["Atuacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
		
		$pessoa = $this->Pessoa->findById($pessoa_id);
		$this->set("pessoa", $pessoa);
		
		$atuacoes = $this->Atuacao->findAllByPessoaId($pessoa_id);
		$this->set("atuacoes",$atuacoes);
		
		$cursos = $this->Curso->find("list",array("fields" => array("Curso.id","Curso.nome")));
		$this->set("cursos", $cursos);
		
		$disciplinas = $this->Disciplina->find("list",array("fields" => array("Disciplina.id","Disciplina.nome")));
		$this->set("disciplinas", $disciplinas);
		
		$funcoes = $this->Funcao->find("list",array("fields" => array("Funcao.id","Funcao.funcao")));
		$this->set("funcoes", $funcoes);
	
		
	}
}	
	
?>