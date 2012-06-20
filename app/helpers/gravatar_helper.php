<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter
*
* An open source application development framework for PHP 4.3.2 or newer
*
* @package      CodeIgniter
* @author       Rick Ellis
* @copyright    Copyright (c) 2006, EllisLab, Inc.
* @license      http://www.codeigniter.com/user_guide/license.html
* @link         http://www.codeigniter.com
* @since        Version 1.0
* @filesource
*/

/**
* CodeIgniter Gravatar Helper
*
* @package      CodeIgniter
* @subpackage   Helpers
* @category     Helpers
* @author       David Cassidy
*/

/**
* Gravatar
*
* Fetches a gravatar from the Gravatar website using the specified params
*
* @access  public
* @param   string
* @param   string
* @param   integer
* @param   string
* @return  string
*/
function gravatar($email, $size = '120', $rating = 'X', $default = NULL) {
	if (!$default) {
		$default = get_instance()->config->item('gravatar_default');
	}
	
    // Hash the email address
    $email = md5($email);

	// Return the generated URL
	return "http://gravatar.com/avatar.php?gravatar_id="
		.$email."&amp;rating="
		.$rating."&amp;size="
		.$size."&amp;default="
		.$default;
}