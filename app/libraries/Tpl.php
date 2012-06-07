<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2011 BrainCube
 */

class Tpl {
	private $CI;

	private $title = NULL;

	public $title_separator = ' &gt; ';
	public $layout = 'default';

	private $header = array();
	private $footer = array();

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function view($view_name, $params = array(), $layout = NULL) {
		$rendered_view = $this->CI->load->view($view_name, $params, TRUE);

		if ($this->title !== NULL) {
			$this->title = $this->title_separator.$this->title;
		}
		if ($layout === NULL) {
			$layout = $this->layout;
		}

		$start_year = $this->CI->config->item('start_year');

		$this->CI->load->view('layouts/'.$layout, array(
			'layout_content' => $rendered_view,
			'layout_title' => $this->title,
			'layout_company' => $this->CI->config->item('company_name'),
			'layout_year' => (date('Y') == $start_year) ? date('Y') : ($start_year.' &ndash; '.date('y'))
		));

		return $this;
	}

	public function __call($name, $arguments) {
		switch (substr($name,0,4)) {
			case 'get_':
				$property = substr($name,4);
				return $this->_parseIncludes($property);
				break;
			
			case 'add_':
				$property = substr($name,4);
				
				if (!isset($arguments[1])) {
					$this->CI->load->helper('url'); // Just in case!
					array_push($this->$property, base_url().$arguments[0]);
				}
				else {
					array_push($this->$property, $arguments[0]);
				}
				return $this;
				break;
				
			case 'set_':
				$property = substr($name,4);
				$this->$property = $arguments[0];
				return $this;
				break;
		}

		return $this;
	}

	private function _parseIncludes($arrayname) {
		$final_includes = '';

		foreach ($this->$arrayname as $include) {
			if (preg_match('/js$/', $include)) {
				$final_includes .= '<script src="'.$include.'"></script>';
			}
			elseif (preg_match('/css$/', $include)) {
				$final_includes .= '<link rel="stylesheet" href="'.$include.'" />';
			}
		}

		return $final_includes;
	}
}