<?php
class InscricoesController extends AppController {

	var $name = 'Inscricoes';
	var $uses = array('Inscricao','Pessoa');
	var $helpers = array('Javascript');
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('finalizada');
	}
	
	function sendEmail($id){
		
		
	}
	
	function finalizada(){
		
	}
	
	function index() {
		$this->Inscricao->recursive = 2;
		$this->set('inscricoes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inscricao', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inscricao', $this->Inscricao->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Inscricao->create();
			if ($this->Inscricao->save($this->data)) {
				$this->Session->setFlash(__('The inscricao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inscricao could not be saved. Please, try again.', true));
			}
		}
		$pessoas = $this->Inscricao->Pessoa->find('list');
		$vagas = $this->Inscricao->Vaga->find('list');
		$this->set(compact('pessoas', 'vagas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inscricao', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Inscricao->save($this->data)) {
				$this->Session->setFlash(__('The inscricao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inscricao could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Inscricao->read(null, $id);
		}
		$pessoas = $this->Inscricao->Pessoa->find('list');
		$vagas = $this->Inscricao->Vaga->find('list');
		$this->set(compact('pessoas', 'vagas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inscricao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Inscricao->delete($id)) {
			$this->Session->setFlash(__('Inscricao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inscricao was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>