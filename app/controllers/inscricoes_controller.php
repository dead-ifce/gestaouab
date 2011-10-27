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
		
		// debug($inscricoes);
		// 	$this->set('inscricoes', $inscricoes);
	}
	
	function show_inscricoes(){
		App::import('Helper', 'Html');
		$html = new HtmlHelper();
		
		$this->header('Content-Type: application/json'); 
		Configure::write('debug', 0); 
		$this->autoRender = false;
		
		$this->Inscricao->recursive = 2;
		$inscricoes = $this->Inscricao->find("all", array(
				'contain' => array(
					'Pessoa' => array(
						'fields' => array('nome','cpf','email')
					 ),
					'Vaga' => array(
					 	'Polo' => array(
					 		'fields' => array('nome')
					 	),
						'Curso' => array(
							'fields' => array('nome')
						),
						'Disciplina' => array(
							'fields' => array('nome')
						),
					
					 )
				),
				'limit' =>  $_GET['iDisplayLength'],
				'offset' => $_GET['iDisplayStart']
			)
		);
		
		$iTotalRecords = $this->Inscricao->find('count');
		$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotalRecords,
				"iTotalDisplayRecords" => $iTotalRecords,
				"aaData" => array()
		);
		
		$row = array();
		foreach($inscricoes as $inscricao){
			$row[] = "<span class=\"del\">".$html->link( "<img src=\"/sisgest/img/del_btn.png\"/>" , array('action' => 'delete', $inscricao['Inscricao']['id']), array('escape' => false), "Tem certeza que deseja APAGAR está inscrição?")."</span>".$inscricao['Pessoa']['nome'];
			$row[] = $inscricao['Pessoa']['cpf'];
			$row[] = $inscricao['Pessoa']['email'];
			$row[] = $inscricao['Vaga']['Polo']['nome']."/"
					.$inscricao['Vaga']['Curso']['nome']."/"
					.$inscricao['Vaga']['Disciplina']['nome'];
			$row[] = $inscricao['Inscricao']['created'];
			$output['aaData'][] = $row;
			$row = array();
		}
		
		// debug($output);
		// 	debug($inscricoes);
		echo json_encode( $output );
		
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