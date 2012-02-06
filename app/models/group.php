<?php 

	class Group extends AppModel
	{
		var $name = 'Group' ;
		var $useDbConfig = 'schema_uab';
		var $hasMany = array('User');
		var $actsAs = array('Acl' => array('type'=>'requester'));

		function parentNode()
		{
			return null;
		}
	}
 ?>