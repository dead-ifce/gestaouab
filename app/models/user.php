<?php

class User extends AppModel {
	var $name = 'User';
	var $useDbConfig = 'schema_uab';
    var $belongsTo = array('Group');
    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled'
=> false)); 
    //


    function parentNode()
    {
        if (!$this->id && empty($this->data)) 
        {
            return null;
        }
        if (isset($this->data['User']['group_id'])) 
        {
            $groupId = $this->data['User']['group_id'];
        } 
        else 
        {
            $groupId = $this->field('group_id');
        }
        if (!$groupId)
        {
            return null;
        } 
        else 
        {
            return array('Group' => array('id' => $groupId));
        }
    }

    function bindNode($user) 
    {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    function afterSave($created) 
    {
        if (!$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aro = $node[0];
            $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            $this->Aro->save($aro);
        }
    }

   /* function initDB() 
    {

        // Get all of the users
        $users = $this->User->find('all');

        // Loop through them ...
        foreach($users as $user) 
        {
            // Build the ARO
            $this->save_aro($user);
        }
    } */

    


}
?>