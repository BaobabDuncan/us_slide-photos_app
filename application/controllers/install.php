<?php
class Install extends CI_Controller{
	
	private $_dbnaem = 'slide_photos';
	private $_user_fb = 'user_fb';
	private $_favorites_fb = 'favorites_fb';
	
	public function __construct()
	{
		parent::__construct();      
		$this->load->dbforge();		     
	}
	
	public function createSPdatabase()
	{		
		try {
		    $this->dbforge->create_database('slide_photos');
		} catch (Exception $e) {
		  	echo 'Database created!';
		}
	}
	
	public function createFbUserTable()
	{
		
		if ($this->db->table_exists($this->_user_fb))    
        { 
        	echo "Table ".$this->_user_fb." already exists<br>"; 
        } else 
        {
			$fields = array(
				'user_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'auto_increment' => TRUE
				),
				'user_fb_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'level' => array(
					'type' => 'INT',
					'constraint' => 5,
				),
				'storage_count' => array(
					'type' => 'INT',
					'constraint' => 5,
				),
				'level_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'max_storage' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'feed_status' => array(
					'type' => 'INT',
					'constraint' => '3',
				),
				'photos_cached' => array(
					'type' => 'INT',
					'constraint' => '3',
				),
				'page_cached' => array(
					'type' => 'INT',
					'constraint' => '3',
				)					
			);
	
			$this->dbforge->add_field($fields);
			// gives PRIMARY KEY (user_id)		
			$this->dbforge->add_key('user_id', TRUE);
			// gives KEY (user_loging_id)
			$this->dbforge->add_key('user_fb_id');			
			$this->dbforge->create_table($this->_user_fb);		
			echo "Table ".$this->_user_fb." create<br>"; 	
        }
	}
	public function createFbFavoritesTable()
	{
		
		if ($this->db->table_exists($this->_favorites_fb))    
        { 
        	echo "Table ".$this->_favorites_fb." already exists<br>"; 
        } else 
        {
			$fields = array(
				'favorites_id' => array(
					'type' => 'INT',
					'constraint' => 7,
					'auto_increment' => TRUE
				),
				'photo_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'					
				),
				'image_url' => array(
					'type' => 'VARCHAR',
					'constraint' => '150',
				),
				'photo_created' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'title' => array(
					'type' => 'VARCHAR',
					'constraint' => '500',
				),
				'photo_by_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'photo_by_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'owner_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'photo_link' => array(
					'type' => 'VARCHAR',
					'constraint' => '500',
				),
				'current_image' => array(
					'type' => 'VARCHAR',
					'constraint' => '500',
				)
				
				
				
			);
	
			$this->dbforge->add_field($fields);			
			$this->dbforge->add_key('favorites_id', TRUE);						
			$this->dbforge->add_key('photo_id');		
			$this->dbforge->add_key('owner_id');			
			$this->dbforge->create_table($this->_favorites_fb);		
			echo "Table ".$this->_favorites_fb." create<br>"; 	
        }
	}
	public function index()
	{	
		
		//$this->createSPdatabase();
		$this->createFbUserTable();
		$this->createFbFavoritesTable();
		
	}
}