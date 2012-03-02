<?php
class CalendariosController extends AppController {

	var $name = 'Calendarios';
	var $uses = array('Curso','Disciplina','Turma','Polo','Tipoevento','Evento','Conflito','Calendario', 'Pessoa');
	var $helpers = array('Javascript','Date','Util');
	var $components = array('Date','RequestHandler','Aula', 'EventosHelper', 'CalendarioHelper');
	
	function beforeFilter() {
    	parent::beforeFilter();
    	$this->Auth->allow('print_cal');
	}
	
	function beforeRender(){
	   // prevent useless warnings for Ajax
	
	   if($this->RequestHandler->isAjax()){
	       Configure::write('debug', 0);
	   }
	}
	
	function teste(){
	    debug($this->Turma->findById(4));
	}
	
	function index(){
		$cursos = $this->Curso->find('list',array('fields' => array('Curso.id','Curso.nome')));
		$this->set('cursos', $cursos);
	}
	
	function add(){
		$cursos = $this->Curso->find('list',array('fields' => array('Curso.id','Curso.nome')));
		$this->set('cursos', $cursos);
		
		if(!empty($this->data)){
		    $cal = $this->CalendarioHelper->criarCalendario($this->data);
			$this->Evento->saveAll($this->EventosHelper->gerar_aulas($this->data, $cal['Calendario']['id']));
			$this->Evento->saveAll($this->EventosHelper->gerar_encontros($this->data, $cal['Calendario']['id']));

			$this->redirect(array('action' => 'view', $cal['Calendario']['turma_id'], 
													  $cal['Calendario']['ano'],
													  $cal['Calendario']['semestre'] ));
			
		}
		
	}
	
	function filterDisciplinas($eventos){
	    $disciplina_atual = null;
	    $disciplinas = array();
	    foreach($eventos as $evento){
	        if($disciplina_atual != $evento['Disciplina']['nome']){
	            array_push($disciplinas, $evento['Disciplina']);
	            $disciplina_atual = $evento['Disciplina']['nome'];
	        }
	    }
	    
	    return $disciplinas;
	}
	
	function add_pessoas($calendario_id){
		if (!empty($this->data)) {
			if ($this->Calendario->save($this->data)) {
				$this->Session->setFlash(__('The companhia has been saved', true));
				$this->redirect(array('controller' => 'calendarios', 
									  'action' => 'ver',
									  $this->data['Calendario']['turma_id'],
									  $this->data['Calendario']['ano'],
									  $this->data['Calendario']['semestre']));
			} else {
				$this->Session->setFlash(__('The companhia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Calendario->read(null, $calendario_id);
			$pessoas = $this->Pessoa->find('list', array("fields" => array("id", "nome")));
			$this->set("pessoas", $pessoas);
		}
		
	}
	
	function add_polos($calendario_id){
		if (!empty($this->data)) {
			if ($this->Calendario->save($this->data)) {
				$this->Session->setFlash(__('The companhia has been saved', true));
				$this->redirect(array('controller' => 'calendarios', 
									  'action' => 'ver',
									  $this->data['Calendario']['turma_id'],
									  $this->data['Calendario']['ano'],
									  $this->data['Calendario']['semestre']));
			} else {
				$this->Session->setFlash(__('The companhia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Calendario->read(null, $calendario_id);
			$polos = $this->Polo->find('list', array("fields" => array("id", "nome")));
			$this->set("polos", $polos);
		}
		
	}
	
	function view(){

		$this->Evento->recursive = -1;
		//$this->layout = "ajax";

		$conflitos = $this->Conflito->find('all',array('conditions' => array('Conflito.turma_id' => $this->params['turma_id'])));

		$this->set('turma_id', $this->params['turma_id']);

		
		//debug($conflitos);
		$this->set('conflitos', $conflitos);

		$detalhes_turma = $this->Turma->findById($this->params['turma_id']);
		$this->set("detalhes_turma",$detalhes_turma);

		// $disciplinas = array();
		// 		foreach($detalhes_turma['Disciplina'] as $disciplina){
		// 		$disciplinas[$disciplina['id']] = $disciplina['nome'];
		// 		}

		// $this->set("disciplinas",$disciplinas);


	}

	
	
	function ver(){
		
		$this->Calendario->recursive = 1;
		$conditions = array("Calendario.turma_id" => $this->params['turma_id'], 
							"Calendario.ano" => $this->params['ano'], 
							"Calendario.semestre" => $this->params['semestre']);
		$calendarios = $this->Calendario->find('all', array("conditions" => $conditions, "order" => "Calendario.created ASC"));
		$eventos = array();
		//debug($calendarios);
		$disciplinas = $this->filterDisciplinas($eventos);
		$pessoas = $this->Pessoa->find('list', array("fields" => array("id", "nome")));
		$this->set('calendarios', $calendarios);
	}
	
	function print_cal($turma_id, $ano, $semestre){
		$this->layout = 'ajax';
		
		$this->Calendario->recursive = 1;
		$conditions = array("Calendario.turma_id" => $turma_id, "Calendario.ano" => $ano, "Calendario.semestre" => $semestre);
		$calendarios = $this->Calendario->find('all', array("conditions" => $conditions, "order" => "Calendario.created ASC"));
		$eventos = array();
		//debug($calendarios);
		$disciplinas = $this->filterDisciplinas($eventos);
		
		$this->set('calendarios', $calendarios);
		$this->set('disciplinas',$disciplinas );
	}
	
	//Conta quantos eventos de cada disciplina para que possa se montada a tabela corretamente usando o rowspan
	function analisaDisciplinas($eventos){
	    
	    $quantidades = array();
	    $disciplina_current = $eventos[0]['Disciplina']['nome'];
	    $count = 0;
	    $qtde_eventos = count($eventos);
	    
	    for($i = 0; $i <= $qtde_eventos ; $i++){
	        
	        if( $i!= $qtde_eventos && $disciplina_current == $eventos[$i]['Disciplina']['nome'] ){
                $count++;
               
	        }else{
	            array_push($quantidades, $count);
                $disciplina_current = $i != $qtde_eventos ? $eventos[$i]['Disciplina']['nome']: null;
                $count = 0;
	        }
	    }
	    
	    return $quantidades;
	}
	
	function imprimir($turma_id = null, $disc_id = null){
		$this->Evento->recursive= -1;
		$conditions = array('Evento.turma_id' => $turma_id,'Evento.disciplina_id' => $disc_id);	
		$eventos = $this->Evento->find('all', array('conditions' => $conditions,'order' => array('Evento.inicio asc')));
		$this->set("eventos",$eventos);

	}
	
	function delete($id = null, $turma_id, $ano, $semestre) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for companhia', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Calendario->delete($id)) {
			$this->Session->setFlash(__('Companhia deleted', true));
			$this->redirect(array('controller' => 'calendarios', 
								  'action' => 'ver',
								  $turma_id,
								  $ano,
								  $semestre));
		}
		//$this->Session->setFlash(__('Companhia was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	*
	*AJAX REQUESTS
	*/
	
	function feed($turma_id=null, $ano = null, $semestre = null){
		$start = date( 'Y-m-d H:i:s', $this->params['url']['start']);
		$end = date( 'Y-m-d H:i:s', $this->params['url']['end']);
		
		// $start = "2011-04-01";
		// $end = "2011-04-30";
		
		$conditions = array("Calendario.turma_id" => $turma_id, 
							"Calendario.ano" => $ano, 
							"Calendario.semestre" => $semestre);
		
		$calendarios = $this->Calendario->find('list', array("conditions" => $conditions));
		//debug($calendarios);
		$this->Evento->recursive = 0;
		$conditions = array('Evento.inicio BETWEEN ? AND ?' => array($start,$end),
							'Evento.tipoevento_id NOT' => "5",
							"Evento.calendario_id" => $calendarios);
							
		
		$events = $this->Evento->find('all',array('conditions' => $conditions));
		
		//debug($events);
		$this->log($events, 'debug');
		
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
		
		
    		if($response = $this->EventosHelper->remover_conflito($dia_conflito, $ev)){
    			echo $response;
    		}
		
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