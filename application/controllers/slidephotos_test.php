<?php
class Slidephotos_test extends CI_Controller{
	public function __construct()
	{
		parent::__construct();           
	}
	public function index()
	{
		/*$this->load->library('slidephotos');
		$this->slidephotos->insert_favorites_photo(); 
		$this->slidephotos->get_favorites_photo(); 
		$this->load->database();
		$data = array(		  
			'image_url' => 'http://a2.sphotos.ak.fbcdn.net/hphotos-ak-ash2/74543_1684808803414_1333467627_1737433_648207_n.jpg' ,
			'title' => 'My date',
			'photo_by_id' => 'Vinh Bui',
			'owner_id' => 'Bond'
		);
		
	
		$this->db->insert('favorites_fb', $data); 
		//$query = $this->db->query('SELECT * FROM favorites_fb');
		$query = $this->db->get('favorites_fb');
		foreach ($query->result() as $row)
		{
		    echo $row->favorites_id;
		    
		}
		echo $query->result();*/
		$this->load->model('favorites_model');
		echo $this->favorites_model->get_favorites_photo();
		echo '<br>show slidephotos_test';
		//$this->load->helper('url');
		//$this->load->view('slidephotos_test');
	}
}