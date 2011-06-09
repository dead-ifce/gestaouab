<?php
class CalendariosController extends AppController {

	var $name = 'Calendarios';
	var $uses = array('Curso','Disciplina','Turma','Polo','Tipoevento','Evento','Conflito');
	var $helpers = array('Javascript','Date');
	var $components = array('Date','RequestHandler');
	
	
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
			
			$this->Evento->saveAll($this->__gerar_aulas($this->data));
			$this->Evento->saveAll($this->__gerar_encontros($this->data));

			$this->Session->setFlash(__('The evento has been saved', true));
			$this->redirect(array('action' => 'view',$this->data['Calendario']['turma_id']));
			
		}
		
	}
	
	function view($turma_id = null){
		
		$this->Evento->recursive = -1;
		$this->layout = "ajax";
		
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
		
		
		if($response = $this->__remover_conflito($dia_conflito, $ev['Evento']['turma_id'])){
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
	
	
	/**
	 * 
	 * Metodos privados
	 * 
	 * */
	function __gerar_aulas($dados){
	
	function __gerar_encontros($dados){
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById($dados['Calendario']['disciplina_id']);
		$polos_disciplina = $disciplina["Turma"]["0"]['Polo'];
		$numSemanas = $disciplina['Disciplina']['numsemanas']; 
		
		$data_inicio_disciplina = $dados['Calendario']['inicio'];
		$data_fim_disciplina = $dados['Calendario']['fim'];
								
	   //CRIA ARRAY DOS POLOS DA DISCIPLINA
	   $polos['Polo'] = array();
	   foreach($polos_disciplina as $polo){
	   		array_push($polos['Polo'],$polo['id']);
	   }
	
	   $encontros = array();
		
		for($i = 0; $i < 8; $i++){ 
			
			$encontro['Evento']['disciplina_id'] = $dados['Calendario']['disciplina_id'];
			$encontro['Evento']['turma_id'] = $dados['Calendario']['turma_id'];
			$encontro['Evento']['diatodo'] = 0;
			$encontro['Evento']['carga_horaria'] = 4;
			$encontro['Polo'] = $polos;
			
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					$this->__adicionar_encontro($encontros, $encontro, $encontro_1, 1 );
				
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->Date->format('fifth saturday',$data_inicio_disciplina);
					
					$this->__adicionar_encontro($encontros, $encontro, $encontro_2, 1 );
					break;
				case 2:
				 	//ADICIONA EXAME PRESENCIAL
					 $exame_presencial = $this->Date->format('fifth saturday',$data_inicio_disciplina);
				    
					 $this->__adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					 break;
				case 3:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->Date->format('+1 week',$encontro_2);
					
					$this->__adicionar_encontro($encontros, $encontro, $seg_chamada_1, 3 );
					break;
				case 4:
					//ADICIONA TERCEIRO ENCONTRO
					$encontro_3 = $this->Date->format('9 saturday', $data_inicio_disciplina);
					
					$this->__adicionar_encontro($encontros, $encontro, $encontro_3, 1 );
					break;
				case 5:
				 	//ADICIONA EXAME PRESENCIAL
					$exame_presencial = $this->Date->format('9 saturday',$data_inicio_disciplina);

           
					$this->__adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					
					break;
				case 6:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_2 = $this->Date->format('+1 week',$encontro_3);
					
					$this->__adicionar_encontro($encontros, $encontro, $seg_chamada_2, 3 );

					break;
				case 7:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$this->__adicionar_encontro($encontros, $encontro,$exame_final, 4 );
					
					break;
			}
		}
		
		return $encontros;
		
	}
	 
	function __adicionar_encontro(&$encontros, &$encontro, $dia, $tipoevento){
		$encontro['Evento']['tipoevento_id'] = $tipoevento;
		
		//Verifica se o evento é um exame presencial.
		if($tipoevento != 2){
			if($this->__verificar_conflitos($dia, $encontro['Evento']['turma_id'])){
				$this->__adiciona_conflito($dia, $encontro['Evento']['turma_id']);
			}
			
			$turno = $this->__verificar_turno($dia, $encontro['Evento']['turma_id']);
		}

		$horario = $this->__getHorarioCerto(($tipoevento==2) ? 2 : $turno, $dia);
		$encontro['Evento']['inicio'] = $horario['inicio'];
		$encontro['Evento']['fim'] = $horario['fim'];

		array_push($encontros, $encontro);
	}
	/**
	 * Verifica se um determinado dia tem conflito
	 * Se tiver conflito retorna TRUE
	 * 
	 * */
	function __verificar_conflitos($dia, $turma_id){
		$this->Evento->recursive = -1;
		
		$eventos = $this->Evento->find('all', array('conditions' => array('Evento.inicio BETWEEN ? AND ?' => array($dia." 00:00:00",$dia." 23:59:59"), 
																		  'Evento.turma_id' => $turma_id,
																		  'Evento.tipoevento_id NOT' => 5)));
		
		//debug($eventos);
		$num_eventos = count($eventos);
		
		if($num_eventos >=2){
			return true;
		}else{
			return false;
		}
		
	}
	
	function __verificar_turno($dia,$turma_id){
		$this->Evento->recursive = -1;
		
		$conditions = array('Evento.inicio BETWEEN ? AND ?' => array($dia." 00:00:00",$dia." 23:59:59"),
							'Evento.tipoevento_id NOT' => "5",
							'Evento.turma_id' => $turma_id);
		
		$eventos = $this->Evento->find('all', array('conditions' => $conditions));

		$num_eventos = count($eventos);
		$this->log("TURNO: ".$num_eventos,"turno");
		
		if($num_eventos==0 || $num_eventos==1){
			return $num_eventos;
		}else {
			return 2;
		}

	}

	function __getHorarioCerto($turno, $dia){
		$horario = array();
		
		if($turno == 0){
			$horario["inicio"] = $dia." 08:00:00";
			$horario["fim"] = $dia." 12:00:00";	
		}else{
			$horario["inicio"] = $dia." 14:00:00";
			$horario["fim"] = $dia." 18:00:00";
		}
		return $horario;
	}
	
	function __adiciona_conflito($dia, $turma_id){
		$this->data['Conflito']["dia"] = $dia;
		$this->data['Conflito']['turma_id'] = $turma_id;
		
		$this->Conflito->create();
		
		$this->Conflito->save($this->data);
		
	}
	
	function __remover_conflito($dia,$turma_id){
		$this->Evento->recursive = -1;
		$dia = date('Y-m-d',strtotime($dia));
		
		$eventos = $this->Evento->find('all', array('conditions' => array('Evento.inicio BETWEEN ? AND ?' => array($dia." 00:00:00",$dia." 23:59:59"), 
																		  'Evento.turma_id' => $turma_id,
																		  'Evento.tipoevento_id NOT' => 5)));
		
		$num_eventos = count($eventos);
	
		if($num_eventos <= 2){
			
			$conflito = $this->Conflito->findByDia($dia);
			if($this->Conflito->delete($conflito['Conflito']['id'])) {
				
				$conflitos = $this->Conflito->find('all',array('conditions' => array('Conflito.turma_id' => $turma_id)));
				
				$response = ($conflitos != null)? "":"Conflitos removidos";
				foreach($conflitos as $conflito){
					$response .= "<li>".$conflito['Conflito']['dia']."</li>";
				}
				return $response;
				
			}
		}
		
		return null;
		
	}
	
}

?>