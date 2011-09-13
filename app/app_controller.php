<?php

class AppController extends Controller {

    public $components = array(
        'Auth' => array(
        'authorize' => 'controller'
         ),
        'Session'
    );

    function isAuthorized() {
         return true;
     }
  }
 ?>