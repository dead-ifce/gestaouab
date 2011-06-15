<?php
class EventosController extends AppController {

	var $name = 'Eventos';
	var $uses = array("Evento","Turma");
	var $components = array("Date");
	
	function index() {
		$this->Evento->recursive = 0;
		$this->set('eventos', $this->paginate());
		// $test = $this->Evento->query('SELECT "ev"."id" AS "Evento__id", "ev"."turma_id" AS "Evento__turma_id", "tu"."nome" AS "Turma__nome"
		// 		FROM "public"."eventos" ev 
		// 		JOIN "uab"."turmas" tu ON "ev"."turma_id" = "tu"."id";');
	   
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid evento', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evento', $this->Evento->read(null, $id));
	}
	
	function ajax_add($turma_id = null, $dia = null, $mes = null, $ano = null){
		$this->autoRender = false;
		
		$turma = $this->Turma->findById($turma_id);
		
		$this->data["Evento"]["tipoevento_id"] = $_REQUEST['tipoEvento'];
		$this->data["Evento"]["disciplina_id"] = $_REQUEST['disciplina_id'];
		$this->data["Evento"]["Polo"] = $turma["Polo"];
		$this->data["Evento"]["turma_id"] = $turma_id;
		$this->data["Evento"]["carga_horaria"] = 4;
		$this->data["Evento"]["diatodo"] = 0;
		
		$turno = $this->Date->turno($_REQUEST['turno']);
		
		$this->data["Evento"]["inicio"] = $ano."-".$mes."-".$dia." ".$turno["inicio"];
		$this->data["Evento"]["fim"] = $ano."-".$mes."-".$dia." ".$turno["fim"];
		
		
		$this->Evento->create();
		if ($this->Evento->save($this->data)) {
		
		}else{
			
		}
		
		
	}
	
	function add($turma_id = null, $dia = null, $mes = null, $ano = null) {
		$this->layout = "ajax";
		
		$turma = $this->Turma->findById($turma_id);
		
		$disciplinas_raw = $turma['Disciplina'];
    
		//debug($disciplinas_raw);
		foreach($disciplinas_raw as $disciplina){
			$disciplinas[$disciplina["id"]] = $disciplina["nome"];
		}
		
		if (!empty($this->data)) {
			Configure::write('debug', 0);
			$this->autoRender = false;
			$this->autoLayout = false;
			
			$this->data["Evento"]["Polo"] = $turma["Polo"];
			$this->data["Evento"]["turma_id"] = $turma_id;
			$this->data["Evento"]["carga_horaria"] = 4;
			
			$turno = $this->Date->turno($this->data["Evento"]["turno"]);
			
			$this->data["Evento"]["inicio"] = $ano."-".$mes."-".$dia." ".$turno["inicio"];
			$this->data["Evento"]["fim"] = $ano."-".$mes."-".$dia." ".$turno["fim"];
			
			
			$this->Evento->create();
			if ($this->Evento->save($this->data)) {
				
			} else {
				
			}
		}
		
		
		
		
		$tipoeventos = $this->Evento->Tipoevento->find('list', array("fields" => array(
																																						"Tipoevento.id",
																																						"Tipoevento.descricao")
																																	));
		
		
		
		$this->set(compact('tipoeventos', 'disciplinas'));
	}

	function edit($id = null) {
		$this->Evento->recursive = -1;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid evento', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Evento->save($this->data)) {
				$this->Session->setFlash('The evento has been saved','default', array("class" => "success"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Evento->read(null, $id);
		}
		
		$tipoeventos = $this->Evento->Tipoevento->find('list');
		$polos = $this->Evento->Polo->find('list');
		$disciplinas = $this->Evento->Disciplina->find('list');
		$turmas = $this->Evento->Turma->find('list');
		$this->set(compact('tipoeventos', 'polos', 'disciplinas', 'turmas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for evento', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Evento->delete($id)) {
			$this->Session->setFlash(__('Evento deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Evento was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function ajax_delete($id = null){
		$this->autoRender = false;
		$this->Evento->delete($id);
	}
	
}
?>