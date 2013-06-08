<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template {

	public $template ='common/template';

	public function action_home()
	{
		//Login if Post
		if ($_POST) {
			$success = Auth_ORM::instance()->login($_POST['username'],$_POST['password']);
			if ($success) $this->redirect(Route::get('default')->uri());
			else $this->redirect(Route::get('default')->uri());
			}

		//Redirect if user
		$user = Auth_ORM::instance()->get_user();
		if ($user) $this->redirect('user/index');

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('user/home');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Leagbox";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Remenant les cireres'=>'/','Clubs'=>'index/clubs');
		$this->template->footer = View::factory('common/footer');
		if ($user!=NULL) $this->template->menu->user = $user;
		else $this->template->menu->user = "";

	}

	public function action_index()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('user/index');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Leagbox";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Clubs'=>'index/clubs');
		$this->template->footer = View::factory('common/footer');
		if ($user!=NULL) $this->template->menu->user = $this->template->body->user = $user;
		else $this->template->menu->user = $this->template->body->user = "";

	}

	public function action_view()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('user/view');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Leagbox";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Users'=>'user');
		$this->template->footer = View::factory('common/footer');

		if ($user!=NULL) $this->template->menu->user = $user;
		else $this->template->menu->user = "";

		$user = ORM::factory('user',$this->request->param('id'));
		$this->template->body->user = $user;


	}

	public function action_list()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if (!$user) $this->redirect(Route::get('default')->uri());

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('user/list');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Leagbox";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Clubs'=>'index/clubs');
		$this->template->footer = View::factory('common/footer');

		if ($user!=NULL) $this->template->menu->user = $user;
		else $this->template->menu->user = "";

		$users = ORM::factory('user');
		$this->template->body->users = $users->find_all();

	}

	public function action_signup()
	{
		//Login if Post
		if (HTTP_Request::POST == $this->request->method()) 
			{
			try {
				// Create the user using form values
				$password = strtolower(Text::random('distinct',8));
				//echo Debug::vars ($password);die();
				$userdata['username']=Text::random('distinct',8);
				$userdata['password']=$userdata['password_confirm']=$password;
				$userdata['email']=$_POST['username'];
				$userdata['fname']=$_POST['fname'];
				$userdata['lname']=$_POST['lname'];
				
				$user = ORM::factory('user')->create_user($userdata, array(
					'username',
					'fname',
					'lname',
					'password',
					'email'
				));

          			// Grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
				
				// Reset values so form is not sticky
				//$_POST = array();
			
				// Set success message
				//$message = "You have added user '{$user->username}' to the database";
				echo Debug::vars($userdata);	
				//$success = Auth_ORM::instance()->force_login($userdata['username']);
				$success = Auth_ORM::instance()->login($userdata['username'],$userdata['password']);
				if ($success) {
					$to = $userdata['email'];
					$subject = __("Thanks to register at leagbox");
					$message = '<p><strong>leagbox</strong></p>';
					$message .= "<p>".__("This is your account login information:")."</p>";
					$message .= "<p>".__("email").": ".$userdata['email']."<br />".__("password").": ".$password."</p>";
					$message .= "<p><strong>".__("leagbox team")."</strong><br />";
					$message .= "leagbox@leagbox.com"."</p>";
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= "From: leagbox <leagbox@leagbox.com>";
					echo $mail = mail($to,$subject,$message,$headers);echo $message;
					$this->redirect(URL::site('user/home'));
					}

			} catch (ORM_Validation_Exception $e) {

				echo ("oh no!");
				// Set failure message
				$message = __('There were errors, please see form below.');
						
				// Set errors using custom messages
				$errors = $e->errors('models');
				
				echo Debug::vars ($errors);
				}
		}

		$this->template->menu = View::factory('common/menu');
		$this->template->body = View::factory('user/signup');

		$this->template->header = View::factory('common/header');
		$this->template->header->title = "Leagbox";
		$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Clubs'=>'index/clubs');
		$this->template->footer = View::factory('common/footer');
		if (isset($user) && $user!=NULL) $this->template->menu->user = $user;
		else $this->template->menu->user = "";
	}

	public function action_logout()
	{
		Auth_ORM::instance()->logout(true,true);
		$this->redirect(Route::get('default')->uri());

	}

	public function action_forgot()
	{
		//Security
		$user = Auth_ORM::instance()->get_user();
		if ($user) $this->redirect('user/logout');

		if (HTTP_Request::POST == $this->request->method()) {
			
			$this->template->menu = View::factory('common/menu');
			$this->template->body = View::factory('user/forgot-ok');

			//TODO: comprovar usuari
			//TODO: crear token_name(token)
			//TODO: enviar mail
			/*$success=1;
			if ($success) {
					$to = $userdata['email'];
					$subject = __("Recover your leagbox password");
					$message = '<p><strong>leagbox</strong></p>';
					$message .= "<p>".__("This is your account login information:")."</p>";
					$message .= "<p>".__("email").": ".$userdata['email']."<br />".__("password").": ".$password."</p>";
					$message .= "<p><strong>".__("leagbox team")."</strong><br />";
					$message .= "leagbox@leagbox.com"."</p>";
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= "From: leagbox <leagbox@leagbox.com>";
					echo $mail = mail($to,$subject,$message,$headers);echo $message;
					$this->redirect(URL::site('user/home'));
					}*/

			$this->template->header = View::factory('common/header');
			$this->template->header->title = "Leagbox";
			$this->template->breadcrumb = View::factory('common/breadcrumb');
			$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Clubs'=>'index/clubs');
			$this->template->footer = View::factory('common/footer');
			if ($user!=NULL) $this->template->menu->user = $this->template->body->user = $user;
			else $this->template->menu->user = $this->template->body->user = "";
		}else{

			$this->template->menu = View::factory('common/menu');
			$this->template->body = View::factory('user/forgot');

			$this->template->header = View::factory('common/header');
			$this->template->header->title = "Leagbox";
			$this->template->breadcrumb = View::factory('common/breadcrumb');
		$this->template->breadcrumb->breadcrumbs = array ('Leagbox'=>'/','Clubs'=>'index/clubs');
			$this->template->footer = View::factory('common/footer');
			if ($user!=NULL) $this->template->menu->user = $this->template->body->user = $user;
			else $this->template->menu->user = $this->template->body->user = "";
		}
	}

} // End Welcome
