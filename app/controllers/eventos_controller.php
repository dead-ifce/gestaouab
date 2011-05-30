<?php
class EventosController extends AppController {

	var $name = 'Eventos';

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

	function add() {
		if (!empty($this->data)) {
			//debug($this->data);
			$this->Evento->create();
			if ($this->Evento->save($this->data)) {
				$this->Session->setFlash(__('The evento has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.', true));
			}
		}
		$tipoeventos = $this->Evento->Tipoevento->find('list');
		$polos = $this->Evento->Polo->find('list');
		$disciplinas = $this->Evento->Disciplina->find('list');
		$turmas = $this->Evento->Turma->find('list');
		$this->set(compact('tipoeventos', 'polos', 'disciplinas', 'turmas'));
	}

	function edit($id = null) {
		$this->Evento->recursive = -1;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid evento', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Evento->save($this->data)) {
				$this->Session->setFlash(__('The evento has been saved', true));
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
}
?>