<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function  __construct() {
		parent::__construct(); $this->ci = &get_instance();
		$this->load->database();
		$this->ci->error = false; $this->ci->errormsg = "";
	}

	public function index() {}
	
	public function authenticateLogin()
	{
		$data = $this->auth->authenticate();
		if (empty($data)) {
			$this->ci->error = true;
			$this->ci->errormsg = "Could not log you in with this Facebook Account";
		}
		$this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
	}
	
	public function signup()
	{
		$data = true;
		// Check if the user already exists
		$user = $this->auth->authenticate();
		if (empty($user)) {
			$insert_data = array(
			   'fbuid' => $this->ci->fbuid
			);
			$data = $this->ci->user_model->add_user($insert_data);
		}else{
			// User already exists, we'll just pass success back anyways to redirect them in
		}
		
		$this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
	}
	
}