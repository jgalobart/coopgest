<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Week extends Controller_Template {

	public $template ='common/template';

	public function action_list()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/list');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

	}

	public function action_providers()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/providers');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Setmana 31'=>'/week/list','Comanda proveidors'=>'');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

		$providers = ORM::factory('provider');
		$this->template->body->providers = $providers->find_all();

	}

	public function action_stock()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/stock');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Setmana 31'=>'/week/list','Gestió Stock'=>'');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

		$providers = ORM::factory('provider');
		$this->template->body->providers = $providers->find_all();

	}

	public function action_replenishment()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/replenishment');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'/');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

		$query = DB::select()->from('week_product_user')->join('products')->on('week_product_user.product','=','id');
		$result = $query->execute();

		$products = ORM::factory('product');
		$this->template->body->products = $products->limit(10)->find_all();

		$this->template->content = View::factory('order/details');	
		$this->template->content->lines = $result;

	}

	public function action_add()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/add');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'/');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

	}

	public function action_stop()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/stop');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'/');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

	}

	public function action_close()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('week/close');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Remenant les cireres";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'/');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

	}

} // End Welcome
