<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller_Template {

	public $template ='common/ajax';

	public function action_addProduct()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) die();

		//Get week
		$weeks = ORM::factory('week');
		$this->template->weeks = $weeks->where('status','=','1')->limit(1)->find_all();
		$this->template->content = '';

		foreach ($this->template->weeks as $week) {
			$query = DB::insert('week_product_user', array('week','user','product','quantity'))->values(array($week->id,$user->id,$_GET['p'],$_GET['q']));
			$result = $query->execute();
			}

		//add product & quantity

	}

	public function get_orderLines () {
		//TODO share code orderSummary & order Details
		return $result;
	}

	public function action_orderSummary () {
		//Get week
		$weeks = ORM::factory('week');
		$this->template->weeks = $weeks->where('status','=','1')->limit(1)->find_all();
		foreach ($this->template->weeks as $week) {
			$weekID = $week->id;
			}

		$query = DB::select()->from('week_product_user')->join('products')->on('week_product_user.product','=','id');
		$result = $query->execute();

		$this->template->content = View::factory('order/summary');
		$this->template->content->lines = count ($result);


		$total = 0;
		foreach ($result as $orderLine) {
			$total += ($orderLine['quantity']*$orderLine['price']);
		}

		$this->template->content->total = $total;
	}

	public function action_orderDetails () {
		//Get week
		$weeks = ORM::factory('week');
		$this->template->weeks = $weeks->where('status','=','1')->limit(1)->find_all();
		foreach ($this->template->weeks as $week) {
			$weekID = $week->id;
			}

		$query = DB::select()->from('week_product_user')->join('products')->on('week_product_user.product','=','id');
		$result = $query->execute();

		$this->template->content = View::factory('order/details');	
		$this->template->content->lines = $result;

	}

} 
