<?php
Class Auth
{
	public $db;
    public function __construct()
	{
		$this->ci = &get_instance();		
		$this->ci->load->driver('cache');
	}
	public function authenticate($redirect = false)
	{
		$error = false;
		$fb = $this->authFacebook();
		$db = $this->authDB();
		
		if (!$fb || !$db) {
			if($redirect) {
				echo("<script> top.location.href='" . LOGIN_URL . "?path=" . $_SERVER["REQUEST_URI"] . "'</script>");
			}
			return false;
		}

		return true;
	}
	
	public function authFacebook()
	{
		require_once 'facebooksdk/facebook.php';
		
        $this->ci = &get_instance();   
		$this->ci->facebook = new Facebook(array(
		  'appId'  => FBAPPID,
		  'secret' => FBAPPSECRET,
		));   
		
		$user = $this->ci->facebook->getUser();
		if (!$user) return false;
		
		$this->ci->fbuid = $user;
		return true;
	}
	
	public function authDB()
	{
		$this->ci->load->model('user_model');
		$data = $this->ci->user_model->get_user_by_fbuid($this->ci->fbuid);
		if (empty($data)) return false;
		
		return true;
	}
    
    public function is_admin()
    {
        if ($this->ci->fbuid == "20616211" || $this->ci->fbuid == "20602878") {
        	return true;
        }else{
        	return false;
        }
    }
}