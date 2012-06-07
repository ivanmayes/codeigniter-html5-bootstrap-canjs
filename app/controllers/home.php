<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2011 BrainCube
 */

class Home extends CI_Controller {

	function  __construct() {
		parent::__construct();
		//$this->tpl->set_title_separator(' | ')->set_title('Home')->add_footer('js/plugins.js');
	}

	public function index() {
		$data = array();
		$this->tpl->view('welcome/index', $data, "welcome");
	}
	
}