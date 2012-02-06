<?php 
	class Vinculo extends AppModel
	{
		var $useDbConfig = 'schema_uab';
		var $name = "Vinculo";
		var $hasMany = 'Pessoa';
	}


 ?>