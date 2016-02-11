<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/*public function index()
	 {
		$this->load->helper('url');
		//redirect('/photos/', 'refresh');
		//$this->load->view('welcome_message');
		}*/

	function __construct()
	{
		parent::__construct();
		$this->load->library('slidephotos');
		$this->load->library('fb_ignited');
		$this->load->library('Cache');
		$this->fb_me = $this->fb_ignited->fb_get_me();
		$this->fb_app = $this->fb_ignited->fb_get_app();
		if ($this->input->get('request_ids'))
		{
			$requests = $this->input->get('request_ids');
			$this->request_result = $this->fb_ignited->fb_accept_requests($requests);
		}
	}
	function index($type="")
	{	
		
		$this->cache->delete($this->slidephotos->getPageCachedName($this->fb_me['id']));
		$this->cache->delete($this->slidephotos->getPhotosCachedName($this->fb_me['id']));
		
		$this->load->helper('url');
		$this->load->view('loading');
		if (isset($this->request_result))
		{
			$content_data['error'] = $this->request_result;
		}

		$content_data['me'] = $this->fb_me;
		$content_data['fb_app'] = $this->fb_app;
		
		$this->load->model('user_model');
		$user_data = $this->user_model->existence_user($this->fb_me['id']);
		if (!$user_data){
			$data['user_fb_id'] = $this->fb_me['id'];
			$data['level'] = 1;
			$data['storage_count'] = 0;
			$data['feed_status'] = 4;
			$this->user_model->insert_user($data);
			$user_data = $this->user_model->existence_user($this->fb_me['id']);
		}		
		$userData =  $this->slidephotos->createUserArray($user_data);		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */