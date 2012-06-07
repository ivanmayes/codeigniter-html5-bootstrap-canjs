<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Code by BrainCube.us - Smart solutions for the Web.
 * @author	Max Degterev <max@braincube.us>
 * @copyright (c) 2011 BrainCube
 */
 
/*
|--------------------------------------------------------------------------
| Start year
|--------------------------------------------------------------------------
|
| This is the year when you start your project. It may be used in 
| several places like copyright etc. Setting this value to 2007 will
| result it 2007-2011 value in $layout_year variable.
|
*/
$config['start_year'] = '2012';

/*
|--------------------------------------------------------------------------
| Company name
|--------------------------------------------------------------------------
|
| Company name used in layout for meta information and footer
| copyright notice
|
*/
$config['company_name'] = 'Owl.am';

/* End of file application.php */
/* Location: ./application/config/application.php */


/*
|--------------------------------------------------------------------------
| Environment Specific Variables
|--------------------------------------------------------------------------
|
| Any setup variables that need to change between dev, staging and production
| copyright notice
|
*/
switch(ENVIRONMENT) {
	case "staging":
		define("FBAPPID", "186544724784696");
		define("FBAPPSECRET", "e4590db6841ad00b5bc077262bf854ae");
		
	break;
	default:
		define("FBAPPID", "302044786521719");
		define("FBAPPSECRET", "f4a643c4fdbe5dd1ced644fd27c32eb3");
	break;	
}


define("LOGIN_URL", "/login");
