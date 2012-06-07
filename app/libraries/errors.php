<?php
Class Errors
{
	public $db;
    public function __construct()
	{
		$this->ci = &get_instance();
	}
	
	function captureError($type = "php", $severity = "", $uid = "", $message = "", $url = "", $lineNumber = "") 
	{
		$this->ci->load->helper('arrays');
       $arr = array(
			'message'=>$message,
			'url'=>$url,
			'lineNumber'=>$lineNumber,
			'type'=>$type
		);
        //$this->qb->query("SELECT * FROM errors WHERE ")
        $this->ci->db->like('error_data',addslashes(json_encode($arr)));
        $query = $this->ci->db->get('errors');
        $this->ci->load->library('user_agent');

        if ($this->ci->agent->is_browser())
        {
            $data['browser'] = $this->ci->agent->browser().' '.$this->ci->agent->version();
        }
        elseif ($this->ci->agent->is_robot())
        {
            $data['browser'] = $this->ci->agent->robot();
        }
        elseif ($this->ci->agent->is_mobile())
        {
            $data['browser'] = $this->ci->agent->mobile();
        }
        else
        {
            $data['browser'] = 'Unidentified User Agent';
        }
        $data['platform'] = $this->ci->agent->platform();
		$data['severity'] = $severity;
        if($query->num_rows > 0)
        {
            $row = $query->result();
            $uids = json_decode($row[0]->uid);
            $uid_arr = object2array($uids);
            if(!in_array($uid,$uid_arr)) {
                $uid_arr[] = $uid;
				$data['uid'] = json_encode($uid_arr);
			}

            $data['count'] = $row[0]->count+1;
			$data['date_created'] = date( 'Y-m-d H:i:s');
            $this->ci->db->where('error_id',$row[0]->error_id);
            $this->ci->db->set($data);
            $this->ci->db->update('errors');  
        }else{
            $data['uid'] = json_encode(array($uid));
            $data['error_data'] = json_encode($arr);
			$result = $this->ci->db->insert('errors',$data);
        }
		return $result;
	}

}