<?php

class AulaComponent extends Object {
 	
	public function __construct() {
	    $this->Evento = ClassRegistry::init('Evento');
		$this->Conflito = ClassRegistry::init('Conflito');
	
	}
	
	function gerar_aula_40_horas(&$encontros, $polos, $turma, $disciplina, $data_inicio_disciplina, $data_fim_disciplina, $cal_id){
		
		for($i = 0; $i < 5; $i++){ 
			$encontro['Evento']['disciplina_id'] = $disciplina;
			$encontro['Evento']['turma_id'] = $turma;
			$encontro['Evento']['diatodo'] = 0;
			$encontro['Evento']['carga_horaria'] = 4;
			$encontro['Evento']['calendario_id'] = $cal_id;
			
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					$this->adicionar_encontro($encontros, $encontro, $encontro_1, 1 );
				
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->format_data('fourth saturday',$data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_2, 1 );
					break;
				case 2:
				 	//ADICIONA EXAME PRESENCIAL
					 $exame_presencial = $this->format_data('fourth saturday',$data_inicio_disciplina);
				    
					 $this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					 break;
				case 3:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->format_data('+1 week',$encontro_2);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_1, 3 );
					break;
				case 4:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$this->adicionar_encontro($encontros, $encontro,$exame_final, 4 );
					break;
				
			}//FIM DO SWITCH
		}//FIM DO FOR
	
	}
	
	function gerar_aula_60_horas(&$encontros, $polos, $turma, $disciplina, $data_inicio_disciplina, $data_fim_disciplina, $cal_id){
		for($i = 0; $i < 8; $i++){ 
			$encontro['Evento']['disciplina_id'] = $disciplina;
			$encontro['Evento']['turma_id'] = $turma;
			$encontro['Evento']['diatodo'] = 0;
			$encontro['Evento']['carga_horaria'] = 4;
			//$encontro['Polo'] = $polos;
			$encontro['Evento']['calendario_id'] = $cal_id;
			
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					$this->adicionar_encontro($encontros, $encontro, $encontro_1, 1 );
				
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->format_data('fifth saturday',$data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_2, 1 );
					break;
				case 2:
				 	//ADICIONA EXAME PRESENCIAL
					 $exame_presencial = $this->format_data('fifth saturday',$data_inicio_disciplina);
				    
					 $this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					 break;
				case 3:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->format_data('+1 week',$encontro_2);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_1, 3 );
					break;
				case 4:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$this->adicionar_encontro($encontros, $encontro,$exame_final, 4 );
					break;
				
			}//FIM DO SWITCH
		}//FIM DO FOR
	}
	
	function gerar_aula_80_horas(&$encontros, $polos, $turma, $disciplina, $data_inicio_disciplina, $data_fim_disciplina, $cal_id){
		
		for($i = 0; $i < 8; $i++){ 
			
			$encontro['Evento']['disciplina_id'] = $disciplina;
			$encontro['Evento']['turma_id'] = $turma;
			$encontro['Evento']['diatodo'] = 0;
			$encontro['Evento']['carga_horaria'] = 4;
			//$encontro['Polo'] = $polos;
			$encontro['Evento']['calendario_id'] = $cal_id;
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					$this->adicionar_encontro($encontros, $encontro, $encontro_1, 1 );
				
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->format_data('fifth saturday',$data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_2, 1 );
					break;
				case 2:
				 	//ADICIONA EXAME PRESENCIAL
					 $exame_presencial = $this->format_data('fifth saturday',$data_inicio_disciplina);
				    
					 $this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					 break;
				case 3:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->format_data('+1 week',$encontro_2);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_1, 3 );
					break;
				case 4:
					//ADICIONA TERCEIRO ENCONTRO
					$encontro_3 = $this->format_data('9 saturday', $data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_3, 1 );
					break;
				case 5:
				 	//ADICIONA EXAME PRESENCIAL
					$exame_presencial = $this->format_data('9 saturday',$data_inicio_disciplina);

           
					$this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					
					break;
				case 6:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_2 = $this->format_data('+1 week',$encontro_3);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_2, 3 );

					break;
				case 7:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$this->adicionar_encontro($encontros, $encontro,$exame_final, 4 );
					
					break;
			}//FIM DO SWITCH
		}//FIM DO FOR
	}	//fim 80h

	function gerar_aula_100_horas(&$encontros, $polos, $turma, $disciplina, $data_inicio_disciplina, $data_fim_disciplina, $cal_id){
		
		for($i = 0; $i < 8; $i++){ 
			
			$encontro['Evento']['disciplina_id'] = $disciplina;
			$encontro['Evento']['turma_id'] = $turma;
			$encontro['Evento']['diatodo'] = 0;
			$encontro['Evento']['carga_horaria'] = 4;
			//$encontro['Polo'] = $polos;
			$encontro['Evento']['calendario_id'] = $cal_id;
			switch($i){
				case 0:	
					//ADICIONA PRIMEIRO ENCONTRO
					$encontro_1 = $data_inicio_disciplina;
					$this->adicionar_encontro($encontros, $encontro, $encontro_1, 1 );
				
					break;
				case 1:
					//ADICIONA SEGUNDO ENCONTRO
					$encontro_2 = $this->format_data('fifth saturday',$data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_2, 1 );
					break;
				case 2:
				 	//ADICIONA EXAME PRESENCIAL
					 $exame_presencial = $this->format_data('fifth saturday',$data_inicio_disciplina);
				    
					 $this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					 break;
				case 3:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_1 = $this->format_data('+1 week',$encontro_2);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_1, 3 );
					break;
				case 4:
					//ADICIONA TERCEIRO ENCONTRO
					$encontro_3 = $this->format_data('9 saturday', $data_inicio_disciplina);
					
					$this->adicionar_encontro($encontros, $encontro, $encontro_3, 1 );
					break;
				case 5:
				 	//ADICIONA EXAME PRESENCIAL
					$exame_presencial = $this->format_data('9 saturday',$data_inicio_disciplina);

           
					$this->adicionar_encontro($encontros, $encontro, $exame_presencial, 2 );
					
					break;
				case 6:
					//ADICIONA SEGUNDA CHAMADA
					$seg_chamada_2 = $this->format_data('+1 week',$encontro_3);
					
					$this->adicionar_encontro($encontros, $encontro, $seg_chamada_2, 3 );

					break;
				case 7:
					//ADICIONA EXAME FINAL
					$exame_final = $data_fim_disciplina;
					
					$this->adicionar_encontro($encontros, $encontro,$exame_final, 4 );
					
					break;
			}//FIM DO SWITCH
		}//FIM DO FOR
	}	//FIM 100H
	
	//Helper metodos
	function adicionar_encontro(&$encontros, &$encontro, $dia, $tipoevento){
		$encontro['Evento']['tipoevento_id'] = $tipoevento;
		
		//Verifica se o evento é um exame presencial.
		if($tipoevento != 2){
			if($this->verificar_conflitos($dia, $encontro['Evento']['turma_id'])){
				$this->adiciona_conflito($dia, $encontro['Evento']['turma_id']);
			}
			
			$turno = $this->verificar_turno($dia, $encontro['Evento']['turma_id']);
		}

		$horario = $this->getHorarioCerto(($tipoevento==2) ? 2 : $turno, $dia);
		$encontro['Evento']['inicio'] = $horario['inicio'];
		$encontro['Evento']['fim'] = $horario['fim'];

		array_push($encontros, $encontro);
	}
	
	function verificar_conflitos($dia, $turma_id){
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
	
	function verificar_turno($dia,$turma_id){
		$this->Evento->recursive = -1;
		
		$conditions = array('Evento.inicio BETWEEN ? AND ?' => array($dia." 00:00:00",$dia." 23:59:59"),
							'Evento.tipoevento_id NOT' => "5",
							'Evento.turma_id' => $turma_id);
		
		$eventos = $this->Evento->find('all', array('conditions' => $conditions));

		$num_eventos = count($eventos);
		
		if($num_eventos==0 || $num_eventos==1){
			return $num_eventos;
		}else {
			return 2;
		}

	}
	
	function getHorarioCerto($turno, $dia){
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
	
	function adiciona_conflito($dia, $turma_id){
		$this->data['Conflito']["dia"] = $dia;
		$this->data['Conflito']['turma_id'] = $turma_id;
		
		$this->Conflito->create();
		
		$this->Conflito->save($this->data);
		
	}

	function format_data($acao = null, $data = null ){
		return date('Y-m-d', strtotime($acao, strtotime($data)));
	}

	
}

?>
