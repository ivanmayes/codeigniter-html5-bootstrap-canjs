<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	public function index() {
		// Reenable if you want the main page to be a login screen
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$this->tpl->view('home/index', $data, "home");
		}*/
		
		$data = array();
		$this->tpl->view('home/index', $data, "home");
	}
	
}