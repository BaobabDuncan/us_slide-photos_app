<?php
	class Facebook_test extends CI_Controller {

		function __construct()
		{
			parent::__construct();			
			$this->load->library('fb_ignited');		
			$this->fb_me = $this->fb_ignited->fb_get_me();		
			$this->fb_app = $this->fb_ignited->fb_get_app();			
			if ($this->input->get('request_ids'))
			{
				$requests = $this->input->get('request_ids');
				$this->request_result = $this->fb_ignited->fb_accept_requests($requests);
			}
		}
		function index($type=""){
			if (isset($this->request_result))
			{
				$content_data['error'] = $this->request_result;
			}		
			
			$content_data['me'] = $this->fb_me;
			$content_data['fb_app'] = $this->fb_app;
			//$this->fb_ignited->test();
			
			//$this->fb_ignited->sendMeFeedAboutFavorite($this->fb_me['first_name'],'100000147823001');
			//$this->fb_ignited->sendTargetFeedAboutFavorite('tset');
			$this->load->view('facebook_view', $content_data);
		}
		
	}