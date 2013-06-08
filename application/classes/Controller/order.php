<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Order extends Controller_Template {

	public $template ='common/template';

	public function action_view()
	{
		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('order/view');

		$club = ORM::factory('order',$this->request->param('id'));

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Comanda'=>'/','Week'=>'');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->find_all();

		$categories = ORM::factory('category');
		$this->template->body->categories = $categories->find_all();

		$products = ORM::factory('product');
		$this->template->body->products = $products;


	}

} // End Welcome
