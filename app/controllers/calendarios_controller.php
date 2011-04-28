<?php
class CalendariosController extends AppController {

	var $name = 'Calendarios';
	var $uses = array('Curso','Disciplina','Turma','Polo','Tipoevento','Evento');
	var $helpers = array('Javascript');
	
	
	function index(){
		$this->set('cursos', $this->Curso->find('all'));
		$this->set('disciplinas', $this->Disciplina->find('all'));
		$this->set('turmas', $this->Turma->find('all'));
		
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById(3);
		$polos = $disciplina["Turma"]["0"]['Polo'];

	}
	
	function add(){
		
		$cursos = $this->Curso->find('list',array('fields' => array('Curso.id','Curso.nome')));
		$this->set('cursos', $cursos);
		
		$disciplinas = $this->Disciplina->find('list', array('fields' => array('Disciplina.id','Disciplina.nome')));
		$this->set('disciplinas',$disciplinas);
		
		$turmas = $this->Turma->find('list',array('fields' => array('Turma.id','Turma.nome')));
		$this->set('turmas',$turmas);
		
		debug($turmas);
		
		//debug($this->Turma->find('all'));
		
		if(!empty($this->data)){
			
			//debug($this->gerar_encontros($this->data));
			$this->Evento->saveAll($this->gerar_aulas($this->data));
			
		}
		
	}
	
	/**
	 * Criado com o intuito de facilitar a visualização do código
	 * */
	function dateHelper($acao = null, $data = null ){
		return date('Y-m-d', strtotime($acao, strtotime($data)));
	}
	
	//Gera as datas das aulas online
	function gerar_aulas($dados){
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById($dados['Calendario']['disciplina_id']);
		$polos_disciplina = $disciplina["Turma"]["0"]['Polo'];
		$numSemanas = $disciplina['Disciplina']['numsemanas']; 
		$data_inicio_disciplina = $dados['Calendario']['inicio']['year']."-".
								  $dados['Calendario']['inicio']['month']."-".
								  $dados['Calendario']['inicio']['day'];
		$data_inicio = $data_inicio_disciplina;
		
		
		$aulas = array();
		
		//CRIA ARRAY DOS POLOS DA DISCIPLINA
		$polos['Polo'] = array();
		foreach($polos_disciplina as $polo){
			array_push($polos['Polo'],$polo['id']);
		}
		
		//ADICIONA TODOS OS EVENTOS NUM ARRAY
		for($i = 1; $i <= $numSemanas; $i++){
			
			$aula;
			$aula['Evento']['tipoevento_id'] = 5;
			$aula['Evento']['disciplina_id'] = $dados['Calendario']['disciplina_id'];
			$aula['Evento']['turma_id'] = $dados['Calendario']['turma_id'];
			$aula['Evento']['carga_horaria'] = 0;
			$aula['Evento']['turno'] = 0;
			
			
			//É necessário o condicional pois se mandar pegar o próximo domingo, ele irá pegar o imediatamente após o dia inicial
			//e faz-se necessário pegar o domingo da semana seguinte
			if($i == 1){
				
				$aula['Evento']['inicio'] = $data_inicio;
				
				$data_fim = $this->dateHelper('next Sunday',$this->dateHelper('+1 day',$data_inicio_disciplina));
				$aula['Evento']['fim'] = $data_fim;
				
			}else{
				$data_inicio = $this->dateHelper('+1 day',$data_fim);
				$aula['Evento']['inicio'] = $data_inicio;
				
				$data_fim = $this->dateHelper('next Sunday',$data_inicio);
				$aula['Evento']['fim'] = $data_fim;
				
			}
			
			//ADICIONA OS POLOS PARA CADA EVENTO
			$aula['Polo'] = $polos;
			
			//ADICIONA OS EVENTOS NO ARRAY
			array_push($aulas,$aula);
			
		}
		return $aulas;
		
	}
	
	
	/**
	 * Retorna um Hash com o numero de encontros de um determinado dia 
	 * Caso haja encontro retorna também a carga horária do encontro e o turno dele
	**/
	 
	function verificar_conflitos($dia, $tipoevento){
		$this->Evento->recursive = 0;
		
		$eventos = $this->Evento->find('all', array('conditions' => array('Evento.inicio' => $dia , 'Evento.tipoevento_id' => $tipoevento )));
	
		//$this->set('conflitos', $eventos);
		debug($eventos);
		
	}

	function gerar_encontros($dados){
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById($dados['Calendario']['disciplina_id']);
		$polos_disciplina = $disciplina["Turma"]["0"]['Polo'];
		$numSemanas = $disciplina['Disciplina']['numsemanas']; 
		
		$data_inicio_disciplina = $dados['Calendario']['inicio']['year']."-".
								  $dados['Calendario']['inicio']['month']."-".
								  $dados['Calendario']['inicio']['day'];
		$data_fim_disciplina = $dados['Calendario']['fim']['year']."-".
								  $dados['Calendario']['fim']['month']."-".
								  $dados['Calendario']['fim']['day'];
								
	   //CRIA ARRAY DOS POLOS DA DISCIPLINA
	   $polos['Polo'] = array();
	   foreach($polos_disciplina as $polo){
	   		array_push($polos['Polo'],$polo['id']);
	   }
	
	   $encontros = array();
		
		for($i = 0; $i < 6; $i++){ 
			
			$encontro['Evento']['disciplina_id'] = $dados['Calendario']['disciplina_id'];
			$encontro['Evento']['turma_id'] = $dados['Calendario']['turma_id'];
			
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					
				    $encontro['Evento']['tipoevento_id'] = 1;
					$encontro['Evento']['carga_horaria'] = 4;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $encontro_1;
					$encontro['Evento']['fim'] = $encontro_1;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->dateHelper('fifth saturday',$data_inicio_disciplina);
					
					$encontro['Evento']['tipoevento_id'] = 1;
					$encontro['Evento']['carga_horaria'] = 8;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $encontro_2;
					$encontro['Evento']['fim'] = $encontro_2;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
				case 2:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->dateHelper('+1 week',$encontro_2);
					
					$encontro['Evento']['tipoevento_id'] = 3;
					$encontro['Evento']['carga_horaria'] = 8;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $seg_chamada_1;
					$encontro['Evento']['fim'] = $seg_chamada_1;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
				case 3:
					//ADICIONA TERCEIRO ENCONTRO
					$encontro_3 = $this->dateHelper('10 saturday', $data_inicio_disciplina);
					
					$encontro['Evento']['tipoevento_id'] = 1;
					$encontro['Evento']['carga_horaria'] = 8;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $encontro_3;
					$encontro['Evento']['fim'] = $encontro_3;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
				case 4:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_2 = $this->dateHelper('+1 week',$encontro_3);
					
					$encontro['Evento']['tipoevento_id'] = 3;
					$encontro['Evento']['carga_horaria'] = 8;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $seg_chamada_2;
					$encontro['Evento']['fim'] = $seg_chamada_2;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
				case 5:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$encontro['Evento']['tipoevento_id'] = 4;
					$encontro['Evento']['carga_horaria'] = 8;
					$encontro['Evento']['turno'] = 0;
					
					$encontro['Evento']['inicio'] = $exame_final;
					$encontro['Evento']['fim'] = $exame_final;
					
					//ADICIONA OS POLOS PARA CADA EVENTO
					$encontro['Polo'] = $polos;
					
					array_push($encontros,$encontro);
					break;
			}
		}
		
		return $encontros;
		
	}
	
	function feed(){
		$start = date( 'Y-m-d H:i:s', $this->params['url']['start']);
		$end = date( 'Y-m-d H:i:s', $this->params['url']['end']);
		
		// $start = "2011-04-01";
		// $end = "2011-04-30";
		
		$this->Evento->recursive = 0;
		$conditions = array('Evento.inicio BETWEEN ? AND ?' => array($start,$end),'Evento.tipoevento_id NOT' => "5");
		
		$events = $this->Evento->find('all',array('conditions' =>$conditions));
		
		//debug($events);
		
		//3. Create the json array
		$rows = array();
		for ($a=0; count($events)> $a; $a++) {

			//Is it an all day event?
			//$all = ($events[$a]['Event']['allday'] == 1);

			//Create an event entry
			$rows[] = array('id' => $events[$a]['Evento']['id'],
			'title' => $events[$a]['Tipoevento']['descricao']." - ".$events[$a]['Disciplina']['nome'],
			'start' => date('Y-m-d H:i', strtotime($events[$a]['Evento']['inicio'])),
			'end' => date('Y-m-d H:i',strtotime($events[$a]['Evento']['fim'])),
			'allDay' => true,
			);
		}

		//4. Return as a json array
		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
		$this->header('Content-Type: application/json');
		echo json_encode($rows);
		
	}
	
	function view(){

		

	
		
	}

	
	function gerar_calendario($data_inicio, $data_fim){
		$data_fim = 10;	
		
	}
	
	
}

?>