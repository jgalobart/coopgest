<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller_Template {

	public $template ='common/ajax';

	public function action_addProduct()
	{
		//Get order
		$order = ORM::factory('order',$this->request->param('id'));
		//add product & quantity

	}

	public function action_orderSummary () {
		$this->template->content = View::factory('order/summary');
	}

	public function action_orderDetails () {
		$this->template->content = View::factory('order/details');	
	}

} 
