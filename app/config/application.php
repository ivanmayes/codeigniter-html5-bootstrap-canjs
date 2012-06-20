<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
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
$config['company_name'] = 'Company Name';

/* End of file application.php */
/* Location: ./application/config/application.php */


/*
|--------------------------------------------------------------------------
| Environment Specific Variables
|--------------------------------------------------------------------------
|
| Any setup variables that need to change between dev, staging and production
|
*/
switch(ENVIRONMENT) {
	case "production":
		$config['facebook_app_id'] = '186544724784696';
		$config['facebook_app_key'] = '186544724784696';
		$config['facebook_app_secret'] = 'e4590db6841ad00b5bc077262bf854ae';
		$config['tweet_consumer_key'] = '';
		$config['tweet_consumer_secret'] = '';
		$config['google_app_id'] = '';
		$config['yahoo_openid'] = 0;
	break;
	default:
		$config['facebook_app_id'] = '186544724784696';
		$config['facebook_app_key'] = '186544724784696';
		$config['facebook_app_secret'] = 'e4590db6841ad00b5bc077262bf854ae';
		$config['tweet_consumer_key'] = '';
		$config['tweet_consumer_secret'] = '';
		$config['google_app_id'] = '';
		$config['yahoo_openid'] = 0;
	break;	
}

