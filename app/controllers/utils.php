<?
Class Utils Extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); $this->ci = &get_instance();
		$this->ci->error = false; $this->ci->errormsg = "";
    }
    public function log_error()
    {
        $uid = $this->input->post('uid');
		$severity = $this->input->post('severity');
        $arr = array(
			'message'=>$this->input->post('message'),
			'url'=>$this->input->post('url'),
			'lineNumber'=>$this->input->post('line_number'),
		);
       $data= $this->errors->captureError("javascript", $severity, $this->ci->fbuid, $message, $filepath, $line);
	   $this->ajax->output(array('data' => $data, 'error' => $this->ci->error, 'errormsg' => $this->ci->errormsg));
    }
    public function pinfo()
    {
        if($this->auth->is_admin())
        {    
            phpinfo();
        }else{
            show_error('You do not have permission to access this function', 403 );
        }
    }

    function clear()
    {
        if($this->auth->is_admin())
        {
            $this->load->driver('cache');    
            echo ($this->cache->apc->clean())?"Server cache cleared!":'Something went wrong';
        }else{
            show_error('You do not have permission to access this function', 403 );
        }
    }
    
    function test()
    {
        $this->auth->authenticate();
        $toDelete = new APCIterator('dummy');
        printr($toDelete);
    }
}