<?php
class CalendariosController extends AppController {

	var $name = 'Calendarios';
    
    function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow("*");
	}
    
	function index() {
		$this->Calendario->recursive = 0;
		$this->set('calendarios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid calendario', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('calendario', $this->Calendario->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Calendario->create();
			if ($this->Calendario->save($this->data)) {
				$this->Session->setFlash(__('The calendario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendario could not be saved. Please, try again.', true));
			}
		}
		$cursos = $this->Calendario->Curso->find('list');
		$this->set(compact('cursos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid calendario', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Calendario->save($this->data)) {
				$this->Session->setFlash(__('The calendario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendario could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Calendario->read(null, $id);
		}
		$cursos = $this->Calendario->Curso->find('list');
		$this->set(compact('cursos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for calendario', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Calendario->delete($id)) {
			$this->Session->setFlash(__('Calendario deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Calendario was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>