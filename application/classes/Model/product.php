<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Product extends ORM
{
public function rules()
        {
            return array();
	}

	//relationships
	protected $_belongs_to = array(
		'providers' => array(),
	);
	
}
?>
