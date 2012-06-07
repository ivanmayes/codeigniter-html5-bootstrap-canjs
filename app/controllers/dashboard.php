<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2011 BrainCube
 */

class Dashboard extends CI_Controller {

	function  __construct() {
		parent::__construct(); $this->ci = &get_instance();
		$this->load->database();
		$this->ci->error = false; $this->ci->errormsg = "";
	}

	public function index() {
		$this->auth->authenticate(true);
		$data = array();
		if ($this->input->is_ajax_request()) {
			$this->load->view('ajax/home_view', $data);
		}
		else {
			$this->tpl->view('welcome/index', $data, "welcome");
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