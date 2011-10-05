<?php
class EditaisController extends AppController {

	var $name = 'Editais';

	function index() {
		$this->Edital->recursive = 0;
		$this->set('editais', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid edital', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('edital', $this->Edital->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Edital->create();
			if ($this->Edital->save($this->data)) {
				$this->Session->setFlash(__('The edital has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edital could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid edital', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Edital->save($this->data)) {
				$this->Session->setFlash(__('The edital has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edital could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Edital->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for edital', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Edital->delete($id)) {
			$this->Session->setFlash(__('Edital deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Edital was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>