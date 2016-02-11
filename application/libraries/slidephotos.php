<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Slidephotos{


	public function __construct() {
	}
	
	public function handlerGetFbPhotosData($fb_friends_list)
	{
		var_dump($fb_friends_list);
	}
	
	
	
	public function getNewPhotos($fb_photos,$photo_id)
	{
		$fb_new_photos = Null;
		foreach ($fb_photos as $row)
		{
			if ($photo_id!=$row['object_id'])
			{
				$fb_new_photos[] = $row;
			}
		}
		return $fb_new_photos;
	}
	public function getFbPhotos($fb_friends_photos,$favoritesPhotos,$fb_friends)
	{
		foreach ($fb_friends_photos as $row)
		{

			$same_statue = false;
			foreach ($favoritesPhotos as $favoritePhoto)
			{
				if ($row['object_id']==$favoritePhoto->photo_id){
					$same_statue = true;
					break;
				}
			}

			if (!$same_statue){
				$row['owner_name'] = $fb_friends[$row['owner']];
				$fb_photos[] = $row;
			}
		}
		return $fb_photos;
	}
	public function getFriendList($friend_data)
	{
		foreach ($friend_data as $row)
		{
			$fb_friends[$row['id']] = $row['name'];
			$friends_array[] = $row['id'];
		}
		shuffle($friends_array);
		$friends_id = implode(",", $friends_array);
		return array($friends_id,$fb_friends);
	}
	public function createUserArray($data){
		$userdata['user_id'] = $data[0]->user_id;
		$userdata['user_fb_id'] = $data[0]->user_fb_id;
		$userdata['level'] = $data[0]->level;
		$userdata['storage_count'] = $data[0]->storage_count;
		$userdata['feed_status'] = $data[0]->feed_status;
		$userdata['photos_cached'] = $this->getPhotosCachedName($data[0]->user_fb_id);
		$userdata['page_cached'] = $this->getPageCachedName($data[0]->user_fb_id);
		$userdata['level_name'] = $this->getUserLevelName($data[0]->level);
		$userdata['max_storage'] = $this->getUserMaxStorage($data[0]->level);
		return $userdata;
	}
	public function getPageCachedName($user_id)
	{
		return 'page_'.$user_id;
	}
	public function getPhotosCachedName($user_id)
	{
		return 'photos_'.$user_id;
	}
	public function getUserLevelName($level)
	{
		$levelName='';
		switch ($level) {
			case 1:
				$levelName = 'Basics';
				break;
			case 2:
				$levelName = 'Silver';
				break;
			case 3:
				$levelName = 'Gold';
				break;
			default:
				$levelName = 'Diamond';
				break;
		}
		return $levelName;
	}
	public function getUserMaxStorage($level)
	{
		$Storage='';
		switch ($level) {
			case 1:
				$Storage = 20;
				break;
			case 2:
				$Storage = 40;
				break;
			case 3:
				$Storage = 60;
				break;
			default:
				$Storage = 100;
				break;
		}
		return $Storage;
	}
	public function getDbConfig()
	{
		/*$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "apmsetup";
		$config['database'] = "slide_photos";*/

		$config['hostname'] = "localhost";
		 $config['username'] = "mobileworks";
		 $config['password'] = "mhrinc01";
		 $config['database'] = "mobileworks";

		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "slidephotos_";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = "";
		$config['char_set'] = "utf8";
		$config['dbcollat'] = "utf8_general_ci";
		return $config;

	}
}
