<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends Model_Auth_User
{
public function rules()
        {
            return array();
	}

	protected $_has_many = array(
		'roles' => array('model' => 'role', 'through' => 'roles_users'),
		'user_token' => array (),
	);

	
}
?>
