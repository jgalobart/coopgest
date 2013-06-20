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
		$this->template->breadcrumb->breadcrumbs = array ('Llista de setmanes'=>'/');
		$this->template->footer = View::factory('common/footer');
		if (isset($user)) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

		$weeks = ORM::factory('week');
		$this->template->body->weeks = $weeks->order_by('id','DESC')->find_all();

	}

} // End Welcome
