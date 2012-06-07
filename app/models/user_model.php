<?
Class User_model Extends CI_Model
{
    function get_user_by_fbuid($fbuid)
    {
    	$this->db->where('fbuid',$fbuid);
        $query = $this->db->get('users');
        
        return $query->result();
    }
	
	function add_user($insert_data)
    {
		$insert = $this->db->insert('users', $insert_data);
		
		// TODO Tyler, add all the other default rows in other tables in this function
        
        return $insert;
    }
    
   
}