<?php
	class Test extends CI_Controller {

		function __construct()
		{
			parent::__construct();			
			
		}
		function index($type=""){			
			$this->load->view('test_view');
		}
		
	}