<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Week extends ORM
{
public function rules()
        {
            return array();
	}

	//relationships
	protected $_has_many = array(
	//'languages' => array('through'=>'languages_users'),
	);
	
}
?>
