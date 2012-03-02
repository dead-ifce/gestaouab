<?php

class EventosHelperComponent extends Object {
 	
 	var $components = array("Date",'Aula');
 	
	public function __construct() {
	    $this->Evento = ClassRegistry::init('Evento');
		$this->Disciplina = ClassRegistry::init('Disciplina');
		$this->Conflito = ClassRegistry::init('Conflito');
	
	}
	
	function gerar_aulas($dados, $cal_id){
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById($dados['Calendario']['disciplina_id']);
		
		//$polosDisciplina = $disciplina["Turma"]["0"]['Polo'];
		$numSemanas      = $disciplina['Disciplina']['numsemanas']; 
		
		$data_inicio_disciplina = $dados['Calendario']['inicio'];
		$data_inicio = $data_inicio_disciplina;
		
		
		$aulas = array();
		
		//ADICIONA TODOS AS AULAS NUM ARRAY
		for($i = 1; $i <= $numSemanas; $i++){
			
			$aula;
			$aula['Evento']['tipoevento_id'] = $this->Evento->AULA;
			$aula['Evento']['disciplina_id'] = $dados['Calendario']['disciplina_id'];
			$aula['Evento']['turma_id']      = $dados['Calendario']['turma_id'];
			$aula['Evento']['carga_horaria'] = 0;
			$aula['Evento']['diatodo']       = 0;
			$aula['Evento']['calendario_id'] = $cal_id;
			
			
			//É necessário o condicional pois se mandar pegar o próximo domingo, ele irá pegar o imediatamente após o dia inicial
			//e faz-se necessário pegar o domingo da semana seguinte
			if($i == 1){
			    
				$aula['Evento']['inicio'] = $data_inicio;
				
				$data_fim = $this->Date->format('next Sunday',$this->Date->format('+1 day',$data_inicio_disciplina));
				$aula['Evento']['fim'] = $data_fim;
				
			}else{
				$data_inicio = $this->Date->format('+1 day',$data_fim);
				$aula['Evento']['inicio'] = $data_inicio;
				
				$data_fim = $this->Date->format('next Sunday',$data_inicio);
				$aula['Evento']['fim'] = $data_fim;
				
			}
			
			
			//ADICIONA OS EVENTOS NO ARRAY
			array_push($aulas,$aula);
			
		}
		return $aulas;
	}

	function gerar_encontros($dados, $cal_id){
		$this->Disciplina->recursive = 2;
		$disciplina = $this->Disciplina->findById($dados['Calendario']['disciplina_id']);
		$polosDisciplina = $disciplina["Turma"]["0"]['Polo'];
		$numSemanas = $disciplina['Disciplina']['numsemanas']; 
		
		$data_inicio_disciplina = $dados['Calendario']['inicio'];
		$data_fim_disciplina = $dados['Calendario']['fim'];
		
		//debug($dados);						
	  //$this->log($dados, 'debug');
	  $encontros = array();
	  $polos = array();
		switch ($disciplina['Disciplina']['numsemanas']) {
			case 4:
				$this->Aula->gerar_aula_40_horas($encontros,
												 $polos,
												 $dados,
												 $data_inicio_disciplina,
												 $data_fim_disciplina,
												 $cal_id);
				break;
			case 6:
				$this->Aula->gerar_aula_60_horas($encontros,
												 $polos,
												 $dados,
												 $data_inicio_disciplina,
												 $data_fim_disciplina,
 												 $cal_id);
				break;
			case 8:
				$this->Aula->gerar_aula_80_horas($encontros,
												 $polos,
												 $dados,
												 $data_inicio_disciplina,
												 $data_fim_disciplina,
 												 $cal_id);
				break;
			case 10:
				$this->Aula->gerar_aula_100_horas($encontros,
												  $polos,
												  $dados,
												  $data_inicio_disciplina,
												  $data_fim_disciplina,
  												  $cal_id);
				break;
		}
		
		
		return $encontros;
		
	}
    
    function remover_conflito($dia,$encontro){
		$this->Evento->recursive = -1;
		$dia = date('Y-m-d',strtotime($dia));
		
		$eventos = $this->Evento->find('all', array('conditions' => array('Evento.inicio BETWEEN ? AND ?' => array($dia." 00:00:00",$dia." 23:59:59"), 
																		  'Evento.turma_id' => $encontro["Evento"]["turma_id"],
																		  'Evento.tipoevento_id NOT' => 5)));
		
		$num_horas = 0;
		foreach($eventos as $evento){
			$num_horas += $evento["Evento"]["carga_horaria"];
		}
        
		//$num_horas -= $encontro["Evento"]["carga_horaria"];
	
		if($num_horas <= 8){
			
			$conflito = $this->Conflito->findByDia($dia);
			if($this->Conflito->delete($conflito['Conflito']['id'])) {
				
				$conflitos = $this->Conflito->find('all',array('conditions' => array('Conflito.turma_id' => $encontro["Evento"]["turma_id"])));
				
				$response = ($conflitos != null)? "":"-";
				foreach($conflitos as $conflito){
					$response .= "<li class='message_cft'>".$conflito['Conflito']['dia']."</li>";
				}
				return $response;
				
			}
		}
		
		return null;
		
	}
}

?>
