<?php
class Photos extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('fb_ignited');
		$this->load->library('Cache');
		$this->load->library('slidephotos');
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->model('favorites_model');
		$this->fb_me = $this->fb_ignited->fb_get_me();
	}

	public function getInstance() {
		$this->user_data =  $this->slidephotos->createUserArray($this->user_model->existence_user($this->fb_me['id']));
		$this->fb_photos = $this->cache->get($this->user_data['photos_cached']);
		$this->fb_slice_photos = null;
		$this->current_image_number = 0;
	}

	public function index()
	{
		$this->getInstance();		
		if(!$this->isValid()){
			$this->load->view('error_view');
		}
		else{
			$this->addResultData();
			$this->load->view('photos_view',$this->data);	
		}		
		
		//$this->fb_ignited->sendLike('testest');
		//$this->fb_ignited->sendComment('testset');
	}

	private function isValid() {
		if(!$this->checkFbPhotosCache()){
			$this->handlerGetFbPhotosData();
		}
		if($this->checkPostRequest()){
			if($this->checkFullMemory()) {
				$this->handlerFullMemory();
			}
			else if($this->checkExistencePhoto()){
				$this->handlerExistencePhoto();
			}
			else{
				$this->handlerFavoritePhoto();
			}
			$this->handlerCommonPostRequest();
		}			
		
		$this->handlerSetTotalPageRequest();					
		
		if($this->checkGetCurrentImage()){
			$this->handlerCurrentImage();
		}				
		if(!$this->checkPage()){
			$this->handlerSetPage();			
		}		
		if(!$this->checkFbPhotosCount()){			
			$this->handlerSlidePhotos();
		}
		return true;
	}

	private function handlerFavoritePhoto() {
		$this->favorites_model->insert_favorites_photo($this->input->get());
		$this->user_data['storage_count'] = $this->user_data['storage_count'] + 1;
		$this->user_model->update_user($this->user_data);
		$this->__sendFeed();
		$this->fb_photos = $this->slidephotos->getNewPhotos($this->fb_photos,$this->input->get('photo_id'));
		$this->cache->write($this->fb_photos, $this->user_data['photos_cached']);
	}
	private function handlerFullMemory() {
		$this->data['error'] = 'Full';
	}
	private function handlerCommonPostRequest() {
		$this->page = $this->cache->get($this->user_data['page_cached']);
	}
	private function handlerExistencePhoto() {
		$this->fb_photos = $this->slidephotos->getNewPhotos($this->fb_photos,$this->input->get('photo_id'));
		$this->cache->write($this->fb_photos, $this->user_data['photos_cached']);
	}
	private function handlerGetFbPhotosData() {
		$fb_friends_list = $this->fb_ignited->fb_get_friends_list();
		if (!$fb_friends_list) return;
		list($friends_id, $fb_friends) = $this->slidephotos->getFriendList($fb_friends_list['data']);
		$fb_friends_photos = $this->fb_ignited->fb_get_friends_photos($friends_id);
		$favoritesPhotos = $this->favorites_model->get_favorites_photo($this->fb_me['id']);
		$this->fb_photos = $this->slidephotos->getFbPhotos($fb_friends_photos,$favoritesPhotos,$fb_friends);
		$this->cache->write($this->fb_photos, $this->user_data['photos_cached']);
	}	
	private function handlerSlidePhotos() {		
		$this->start_num = 41*($this->page-1);		
		$this->fb_slice_photos = array_slice($this->fb_photos, $this->start_num, 40);		
	}
	private function handlerCurrentImage() {				
		$this->current_image_number = $this->input->get('current_image');
	}
	private function addResultData() {
		$page_data['page'] = $this->page;
		$page_data['current_image_number'] = $this->current_image_number;
		$this->data['page_data'] = $page_data;
		$this->data['user_data'] = $this->user_data;
		$this->data['fb_photos'] = $this->fb_slice_photos;
		$this->data['me'] = $this->fb_me;
	}
	private function handlerSetTotalPageRequest() {
		$this->total_page = ceil(count($this->fb_photos) / 41);
	}
	private function handlerSetPage() {
		if (!isset($_GET['page']))
		{
			$this->page = 1;
		}				
		else
		{
			$this->page = $this->input->get('page');
		}	
		if ($this->total_page<$this->page)
		{
			$this->page = 1;
		}	
		else if($this->page <= 0){
			$this->page = $this->total_page;
		}				
		$this->cache->write($this->page,$this->user_data['page_cached']);
	}
	private function checkPostRequest() {
		return isset($_GET['photo_id']);
	}
	private function checkFbPhotosCache() {
		return $this->fb_photos;
	}
	private function checkPage() {
		return isset($this->page);
	}
	private function checkFullMemory() {
		return (!($this->user_data['storage_count']<$this->user_data['max_storage']));
	}
	private function checkExistencePhoto() {
		return $this->favorites_model->existence_photo($this->input->get());
	}
	private function checkFbPhotosCount() {		
		return (count($this->fb_photos)<2);		
	}	
	private function checkGetCurrentImage() {		
		return isset($_GET['current_image']);
	}
	private function __sendFeed()
	{
		$this->fb_ignited->sendFeedAboutFavorite($this->input->get('photo_by_name'),$this->input->get('photo_id'));
		//$this->fb_ignited->sendFeedAboutFavorite();
		//$this->fb_ignited->sendMeFeedAboutFavorite($this->fb_me['first_name'],$this->input->get('photo_by_id'),$this->fb_me['id']);
		//$this->fb_ignited->sendTargetFeedAboutFavorite($this->input->get('photo_by_name'),$this->input->get('photo_by_id'));
	}
}