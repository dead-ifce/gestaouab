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
	
	function add_by_admin($pessoa_id = null){
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->Atuacao->create();
			if ($this->Atuacao->save($this->data)) {
				$this->Session->setFlash(__('The feriado has been saved', true));
				$this->redirect(array('controller'=> 'pessoas','action' => 'view', $this->data["Atuacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The feriado could not be saved. Please, try again.', true));
			}
		}
		
		$this->set("pessoa",$pessoa_id);
		
		$atuacoes = $this->Atuacao->findAllByPessoaId($pessoa_id);
		$this->set("atuacoes",$atuacoes);
		
		$cursos = $this->Curso->find("list",array("fields" => array("Curso.id","Curso.nome")));
		$this->set("cursos", $cursos);
		
		$disciplinas = $this->Disciplina->find("list",array("fields" => array("Disciplina.id","Disciplina.nome")));
		$this->set("disciplinas", $disciplinas);
		
		$funcoes = $this->Funcao->find("list",array("fields" => array("Funcao.id","Funcao.funcao")));
		$this->set("funcoes", $funcoes);
	}
	
	
	function edit($id = null, $pessoa_id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Atuação Inválida', true));
			$this->redirect(array('controller' => 'pessoas','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Atuacao->save($this->data)) {
				$this->Session->setFlash(__('The turma has been saved', true));
				$this->redirect(array('controller' => 'pessoas', 'action' => 'view', $this->data["Atuacao"]["pessoa_id"]));
			} else {
				$this->Session->setFlash(__('The turma could not be saved. Please, try again.', true));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Atuacao->read(null, $id);
		}
		
		$this->set("pessoa",$pessoa_id);
		
		$atuacoes = $this->Atuacao->findAllByPessoaId($pessoa_id);
		$this->set("atuacoes",$atuacoes);
		
		$cursos = $this->Curso->find("list",array("fields" => array("Curso.id","Curso.nome")));
		$this->set("cursos", $cursos);
		
		$disciplinas = $this->Disciplina->find("list",array("fields" => array("Disciplina.id","Disciplina.nome")));
		$this->set("disciplinas", $disciplinas);
		
		$funcoes = $this->Funcao->find("list",array("fields" => array("Funcao.id","Funcao.funcao")));
		$this->set("funcoes", $funcoes);
	}

	function delete($id = null,$pessoa_id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for turma', true));
			$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
		}
		if ($this->Atuacao->delete($id)) {
			$this->Session->setFlash(__('Turma deleted', true));
			$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
		}
		$this->Session->setFlash(__('Turma was not deleted', true));
		$this->redirect(array('controller' => 'pessoas','action'=>'view', $pessoa_id));
	}
}	
	
?>