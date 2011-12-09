<?php
class CalendariosController extends AppController {

	var $name = 'Calendarios';
	var $uses = array('Curso','Disciplina','Turma','Polo','Tipoevento','Evento','Conflito','Calendario');
	var $helpers = array('Javascript','Date');
	var $components = array('Date','RequestHandler','Aula', 'EventosHelper');
	
	
	function beforeRender(){
	   // prevent useless warnings for Ajax
	   if($this->RequestHandler->isAjax()){
	       Configure::write('debug', 0);
	   }
	}
	
	function index(){
		//$this->layout = "teste";
		$cursos = $this->Curso->find('list',array('fields' => array('Curso.id','Curso.nome')));
		$this->set('cursos', $cursos);
		//file_put_contents("/Users/luiz/tes/teste","adashdada");
	}
	
	function add(){
		$cursos = $this->Curso->find('list',array('fields' => array('Curso.id','Curso.nome')));
		$this->set('cursos', $cursos);
		
		if(!empty($this->data)){
		    //$this->Calendario->criarCalendario($this->data);
			$this->Evento->saveAll($this->EventosHelper->gerar_aulas($this->data));
			$this->Evento->saveAll($this->EventosHelper->gerar_encontros($this->data));

			//$this->Session->setFlash(__('The evento has been saved', true));
			$this->redirect(array('action' => 'view',$this->data['Calendario']['turma_id']));
			
		}
		
	}
	
	function view($turma_id = null){
		
		$this->Evento->recursive = -1;
		//$this->layout = "ajax";
		
		$this->set('turma_id', $turma_id);
		
		$conflitos = $this->Conflito->find('all',array('conditions' => array('Conflito.turma_id' => $turma_id)));
		$this->set('conflitos', $conflitos);
		
		$detalhes_turma = $this->Turma->findById($turma_id);
		$this->set("detalhes_turma",$detalhes_turma);
		
		$disciplinas = array();
		foreach($detalhes_turma['Disciplina'] as $disciplina){
			$disciplinas[$disciplina['id']] = $disciplina['nome'];
		}
    
		$this->set("disciplinas",$disciplinas);
		
		
	}
	
	function imprimir($turma_id = null, $disc_id = null){
		$this->Evento->recursive= -1;
		$conditions = array('Evento.turma_id' => $turma_id,'Evento.disciplina_id' => $disc_id);	
		$eventos = $this->Evento->find('all', array('conditions' => $conditions,'order' => array('Evento.inicio asc')));
		$this->set("eventos",$eventos);

	}
	
	
	/**
	*
	*AJAX REQUESTS
	*/
	
	function feed($turma_id=null){
		$start = date( 'Y-m-d H:i:s', $this->params['url']['start']);
		$end = date( 'Y-m-d H:i:s', $this->params['url']['end']);
		
		// $start = "2011-04-01";
		// $end = "2011-04-30";
		
		$this->Evento->recursive = 0;
		$conditions = array('Evento.inicio BETWEEN ? AND ?' => array($start,$end),
							'Evento.tipoevento_id NOT' => "5",
							'Evento.turma_id' => $turma_id);
		
		
		
		$events = $this->Evento->find('all',array('conditions' =>$conditions));
		
		//debug($events);
		
		//3. Create the json array
		$rows = array();
		for ($a=0; count($events)> $a; $a++) {

			//Is it an all day event?
			$all = ($events[$a]['Evento']['diatodo'] == 1);

			//Create an event entry
			$rows[] = array('id' => $events[$a]['Evento']['id'],
			'title' => $events[$a]['Tipoevento']['descricao']." - ".$events[$a]['Disciplina']['nome'],
			'start' => date('Y-m-d H:i', strtotime($events[$a]['Evento']['inicio'])),
			'end' => date('Y-m-d H:i',strtotime($events[$a]['Evento']['fim'])),
			'allDay' => $all,
			);
		}

		//4. Return as a json array
		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
		$this->header('Content-Type: application/json');
		echo json_encode($rows);
		
	}
	
	function move($id=null, $dayDelta, $minDelta, $allDay){
		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
		$this->Evento->recursive = -1;
		
		if ($id!=null) {
			$ev = $this->Evento->findById($id);  //1 - locate the event in the DB
			if ($allDay=='true') { //2- handle all day events
				$ev['Evento']['diatodo'] = 1;
			} else {
				$ev['Evento']['diatodo'] = 0;
			}
		$dia_conflito = $ev['Evento']['inicio'];
		
		//3 - Start
		$ev['Evento']['fim']=date('Y-m-d H:i:s',strtotime(''.$dayDelta.' days '.$minDelta.' minutes',strtotime($ev['Evento']['fim'])));
		$ev['Evento']['inicio']=date('Y-m-d H:i:s',strtotime(''.$dayDelta.' days '.$minDelta.' minutes',strtotime($ev['Evento']['inicio'])));
		$this->Evento->create();
		
		$this->Evento->save($ev); //4 - Save the event with the new data
		
		
		if($response = $this->EventosHelper->remover_conflito($dia_conflito, $ev['Evento']['turma_id'])){
			echo $response;
		}
		
		//$this->redirect(array('action'=>'index'));
		//5 - redirect and reload
		//$this->redirect(array('controller' => "calendarios", 'action' => "view",substr($ev['Evento']['inicio'],0,4),substr($ev['Evento']['inicio'],5,2),substr($ev['Evento']['inicio'],8,2)));
		
		}
	}
	
	function edit_evento($evento_id = null){
		
		$this->autoRender = false;
		
		
		$hora = date('H:i:s', strtotime($_REQUEST['velhaData']));
		
		$inicio = $_REQUEST['novaData']." ".$hora;
		$fim = date('Y-m-d H:i:s', strtotime('+4 hours', strtotime($inicio)));
		
		
		$this->data['Evento']['id'] = $evento_id;
		$this->data['Evento']['inicio'] = $inicio;
		$this->data['Evento']['fim'] = $fim;
		
		// $this->log("Inicio: ".$inicio." Fim: ".$fim,'date');
		
		$this->Evento->create();
		
		if($this->Evento->save($this->data)){
			$this->Session->setFlash('Evento editado corretamente','default',array("class" => "success"));
		}
		
	}
	
	function getTurmasByCurso($curso_id){
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$turmas = $this->Turma->find("list",array('conditions' => array('Turma.curso_id' => $curso_id),
												  'fields' => array('Turma.id','Turma.nome')));
		echo "<option value=0>Selecione...</option>";
	    foreach($turmas as $key => $val) {
			echo "<option value=$key>$val</option>";
	    }									
	}  
	
	function getDisciplinasByTurma($turma_id){
		$this->layout = 'ajax';
		$this->beforeRender();
		$this->autoRender = false;
		$turma = $this->Turma->findById($turma_id);
		$disciplinas = $turma['Disciplina'];

		echo "<option value=0>Selecione...</option>";
		foreach($disciplinas as $disciplina){
			$id = $disciplina['id'];
			$nome = $disciplina['nome'];
			echo "<option value=$id>$nome</option>";
		}
	}
	
	
}

?>