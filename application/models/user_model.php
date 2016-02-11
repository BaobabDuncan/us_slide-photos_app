<?php
class User_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->library('slidephotos');
		$config = $this->slidephotos->getDbConfig();	
		$this->load->database($config);
	}
	
	function existence_user($fb_id)
    {    	
    	$query = $this->db->get_where('user_fb', array('user_fb_id' => $fb_id));
    	return $query->result();
    }
    
	function insert_user($data)
    {    	
    	$this->db->insert('user_fb', $data);     	    	
    }
    
    function update_user($data)
    {    	
    	$this->db->where('user_id', $data['user_id']);
		$this->db->update('user_fb', $data); 
    }
}