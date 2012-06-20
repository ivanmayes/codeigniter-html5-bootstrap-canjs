<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2010 BrainCube
 */
if ( ! function_exists('adv_send_email'))
{
	function adv_send_email($recipient, $subject, $message) {
		$CI =& get_instance();
		
		$charset = $CI->config->item('charset');
		$from = $CI->config->item('company_email');

		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/plain; charset='.(($charset) ? $charset : 'UTF-8')."\r\n";

		if ($from) {
			$headers .= 'From: '.$CI->config->item('company_name').' <'.$CI->config->item('company_email').'>'."\r\n";
		}

		return mail($recipient, $subject, $message, $headers);
	}
}