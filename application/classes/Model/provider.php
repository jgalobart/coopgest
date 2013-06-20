<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Provider extends ORM
{
public function rules()
        {
            return array();
	}

	//relationships
	protected $_has_many = array(
		'products'  => array(),
	);
	
}
?>
