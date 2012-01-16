<?php

class CalendarioHelperComponent extends Object {
 	
 	var $components = array("Date",'Aula');
 	//var $uses = array('Evento', 'Calendario', 'Turma');
	public function __construct() {
	    $this->Evento = ClassRegistry::init('Evento');
		$this->Calendario = ClassRegistry::init('Calendario');
		$this->Turma = ClassRegistry::init('Turma');
	}
	
	function criarCalendario($dados){
	      
	    $inicio = explode('/', $dados["Calendario"]["inicio"]);
    	$ano = $inicio[2];
	
    	if($inicio[0] <= 6)
    	    $semestre = 1;
    	 else
    	    $semestre = 2;
	
    	$calendario["Calendario"] = array("curso_id" => $dados["Calendario"]["curso"],
										  "turma_id" => $dados["Calendario"]["turma_id"],
    	                                  "ano"      => $ano,
    	                                  "semestre" => $semestre,
										  "disciplina_id" => $dados["Calendario"]["disciplina_id"]
    	                           );
	    
	    //CRIA ARRAY DOS POLOS DA DISCIPLINA
	    $turma = $this->Turma->findById($dados["Calendario"]["turma_id"]);
		$polos['Polo'] = array();
		foreach($turma["Polo"] as $polo){
			array_push($polos['Polo'],$polo['id']);
		}
	    $calendario['Polo'] = $polos;
	    
    	$this->Calendario->create();
    	$this->Calendario->save($calendario);
	    
	    
    	$lastCalendario= $this->Calendario->find('first', array('order' => array('Calendario.created DESC'),
    	                                                        'recursive' => 0));
    	return $lastCalendario;
	}
	
}

?>
