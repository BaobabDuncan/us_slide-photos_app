<?php
class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('fb_ignited');
		$this->load->library('slidephotos');
		$this->load->model('user_model');

		$this->fb_me = $this->fb_ignited->fb_get_me();
		$this->user_data =  $this->slidephotos->createUserArray($this->user_model->existence_user($this->fb_me['id']));
	}
	public function index()
	{
		$this->load->model('favorites_model');	
					
		if ($this->input->get('level_up', TRUE))
		{			
			if ($this->user_data['level']<5){						
				$this->user_data['level'] = $this->user_data['level'] + 1;				
				$this->user_model->update_user($this->user_data);
				$this->user_data =  $this->slidephotos->createUserArray($this->user_model->existence_user($this->fb_me['id']));
			}
			else{				
				echo "<script>alert('You level is top')</script>";
			}
		}
		else if ($this->input->get('feed_status', TRUE))
		{				
			$this->user_data['feed_status'] = $this->input->get('feed_status');
			$this->user_model->update_user($this->user_data);
			$this->user_data =  $this->slidephotos->createUserArray($this->user_model->existence_user($this->fb_me['id']));			
		}
		$data['me'] = $this->fb_me;
		$data['user_data'] = $this->user_data;
		$this->load->view('user_view',$data);
	}
}