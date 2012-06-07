<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2011 BrainCube
 */

class Error extends CI_Controller {
	function error_404() {
		$data = array();
		$this->output->set_status_header('404');

		if ($this->input->is_ajax_request()) {
			$this->load->view('ajax/error_view');
		}
		else {
			$this->tpl->set_title('Error')->view('error_view', $data, "welcome");
		}
	}
}