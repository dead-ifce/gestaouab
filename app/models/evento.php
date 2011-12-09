<?php
class Evento extends AppModel {
	var $name = 'Evento';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    
    var $belongsTo = array('Tipoevento', 'Disciplina', 'Turma', 'Calendario');
    
    var $hasAndBelongsToMany = array('Polo');
	
	
	/*
	function salvarAulas($dados){
	       
	   }
	   
	   
	   function criarCalendario($dados){
	      
	       $inicio = $dados["Calendario"]["inicio"].explode('/');
	       $ano = $inicio[2];
	      
	      
	       if($inicio[0] <= 6)
	           $semestre = 1;
	        else
	           $semestre = 2;
	       
	       
	       $calendario["Calendario"] = array("curso_id" => $dados["Calendario"]["curso"],
	                                         "ano"      => $ano,
	                                         "semestre" => $semestre
	                                  );
	       
	       $this->Calendario->create();
	       $this->Calendario->save($calendario);
	       
	       $lastCalendario= $this->Calendario->find('first', array('order' => array('Calendario.created DESC')));
	       return $lastCalendario;
	   }*/
	
	

}
?>