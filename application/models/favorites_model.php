<?php
class Favorites_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->library('slidephotos');
		$config = $this->slidephotos->getDbConfig();	
		$this->load->database($config);
	}
	
 	function get_favorites_photo($id)
    {    	
        $query = $this->db->get_where('favorites_fb', array('owner_id' => $id));
        return $query->result();
    }
    
    function delete_favorites_photo($id)
    {    	
    	$this->db->delete('favorites_fb', array('favorites_id' => $id));  	
    }
    
    function insert_favorites_photo($data)
    {    	
    	$this->db->insert('favorites_fb', $data);     	    	
    }
    
    function existence_photo($data)
    {    	
    	$query = $this->db->get_where('favorites_fb', array('photo_id' => $data['photo_id'],'owner_id' => $data['owner_id']));
    	return $query->result();
    }
}