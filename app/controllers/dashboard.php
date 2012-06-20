<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function  __construct() {
		parent::__construct(); $this->ci = &get_instance();
		$this->ci->error = false; $this->ci->errormsg = "";
	}

	public function index() {
		// Uncomment to only allow authenticated users
		//$this->auth->authenticate(true);
		$data = array();
		if ($this->input->is_ajax_request()) {
			$this->load->view('ajax/home_view', $data);
		} else {
			$this->tpl->view('app/dashboard', $data, "app");
		}
	}
	
	public function ajax_test() {
		$this->auth->authenticate();
		$data = "Cool data to send back";
		
		// If there was an error anywhere in this funciton, i would just change
		// $this->ci->error = true
		// And then set an error message so we can see the problem on the frontend
		// $this->ci->errormsg = "This user is stupid!"
		
		$this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
	}
	
}