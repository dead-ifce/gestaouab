<?php
class Formacao extends AppModel {
	var $name = 'formacao';
	var $useDbConfig = 'schema_uab';
	
	
	var $belongsTo = "Pessoa";
}
?>