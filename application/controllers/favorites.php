<?php
class Favorites extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('fb_ignited');
		$this->load->library('slidephotos');
		$this->load->model('user_model');
			
		$this->fb_me = $this->fb_ignited->fb_get_me();
		$this->user_data =  $this->slidephotos->createUserArray($this->user_model->existence_user($this->fb_me['id']));
	}
	public function index()
	{
		$this->load->model('favorites_model');
		if ($this->input->get('favorites_key', TRUE))
		{
			$_favorites_key = $this->input->get('favorites_key', TRUE);
			$this->favorites_model->delete_favorites_photo($_favorites_key);
			$this->user_data['storage_count'] = $this->user_data['storage_count'] - 1;
			$this->user_model->update_user($this->user_data);
		}
		$data['me'] = $this->fb_me;
		$data['user_data'] = $this->user_data;
		$data['favoritesPhotos'] = $this->favorites_model->get_favorites_photo($this->fb_me['id']);
		$this->load->helper('url');
		$this->load->view('favorites_view',$data);
	}
}