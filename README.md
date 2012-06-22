codeigniter-html5-bootstrap-canjs
=================================

A boilerplate for rapid app development using CI, HTML5 Boilerplate, Bootstrap and CanJS

# Environments

By default, all domains with local in the name, for instance local.boilerplate.com, will default to a development environment.  Otherwise the site will run in production mode.  To set extra cases for environments, edit the index.php file.
All other variables, such as databases and facebook app id's, should be set based on the current environment  Here's an example:

	switch (ENVIRONMENT)
	{
		case 'development':
			$active_group = 'development';
		break;
	
		case 'testing':
		case 'production':
			$active_group = 'production';
		break;
	
		default:
			exit('The application environment is not set correctly.');
	}

# Configuration

Set all config variables in config/application.php

# Views and Layouts

Views are run through the Tpl library. Here is an example call:

	$this->tpl->view('app/dashboard', $data, "app");
	
The first parameter is is the location of the page content (in this case views/app/dashboard.php)
The second parameter is the data to be passed to your content
The third parameter defines your layout shell that forms the header/footer and any permanent code needed on every page


# Sending Ajax

There is an ajax library designed to filter output back to the front-end.  

	$this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
	
Errors are set in the construct as false, minimizing the amount of error code that you have to write.  Here's an example of an ajax function:
	
	public function authenticateLogin()
	{
		$data = $this->auth->authenticate();
		if (empty($data)) {
			$this->ci->error = true;
			$this->ci->errormsg = "Could not log you in with this Facebook Account";
		}
		$this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
	}


# Included Libraries

	*Facebook : facebook.php
	*Twitter : tweet.php
	*Amazon S3 : S3.php
	*Google Analytics : ganalytics/gapi.class.php

Thanks to :
Max Degterev for his initial work on CI + HTML5 Boilerplate
ilkon's Tank Auth Library

