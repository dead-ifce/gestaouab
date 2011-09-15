<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array("Javascript");
	
	function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow("add");
	}	
	
	function login() {
		$this->Auth->loginRedirect = array('controller' => 'pessoas', 'action' => 'index');
	}
     
	function logout() {
     
		$this->redirect($this->Auth->logout());
     
	 }
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			if($this->data["User"]["password"] == $this->Auth->password($this->data["User"]["password_confirm"])){
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('O Usuário foi salvo corretamente', true),"default",array("class" => "alert-message success flash"));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O usuário não pode ser salvo. Por favor, tente novamente.', true),"default",array("class" => "alert-message error flash"));
				}
			}else {
				$this->Session->setFlash(__('O usuário não pode ser salvo pois as senhas estão diferentes', true),"default",array("class" => "alert-message error flash"));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data["User"]["password"] == $this->Auth->password($this->data["User"]["password_confirm"])){
			
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('O Usuário foi salvo corretamente', true),"default",array("class" => "alert-message success flash"));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O usuário não pode ser salvo. Por favor, tente novamente', true),"default",array("class" => "alert-message error flash"));
				}
			}else {
				$this->Session->setFlash(__('O usuário não pode ser salvo pois as senhas estão diferentes', true),"default",array("class" => "alert-message error flash"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true),"default",array("class" => "alert-message error flash"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true),"default",array("class" => "alert-message error success"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true),"default",array("class" => "alert-message error flash"));
		$this->redirect(array('action' => 'index'));
	}
}
?>