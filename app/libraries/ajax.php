<?php
Class Ajax{
	var $ci;
	function __construct()
	{
		$this->ci = &get_instance();
	}
	
	function output($data)
	{
		if (empty($data['data'])) $data['data'] = true;
		$data['error'] = (!empty($data['error']))?$data['error']:false;
		header('Content-type: application/json');
		echo json_encode($data);
	}
}