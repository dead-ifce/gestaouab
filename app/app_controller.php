<?php

class AppController extends Controller {

    public $components = array(
        'Auth' => array(
        'authorize' => 'controller'
         ),
        'Session'
    );
	
	function beforeFilter(){
		$this->Auth->fields = array(
			'username' => 'email',
		 	'password' => 'password'
	 	);
	}
	
    function isAuthorized() {
         return true;
     }
  }
 ?>