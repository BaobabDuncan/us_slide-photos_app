<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * --- Facebook Ignited ---
 * 
 * fb_appid		is the app id you recieved from dev panel
 * fb_secret	is the secret you recieved from dev panel
 * fb_cookie	determines whether you support cookies or not (default is true)
 * fb_canvas 	the value you put in 'Canvas Page' field in dev panel
 * fb_auth		is the default authentications, '' is basic authentication
 */
$config['fb_appid']		= '136758826401321';
$config['fb_secret']	= 'fbb9d97bf34b79f70f59998f5c84c177';
/*$config['fb_appid'] = '117402568347101';
$config['fb_secret']	= '07db2a2f74d2f30e5af2403c9ecda2ec';*/
$config['fb_cookie']	= true;
$config['fb_canvas']	= 'http://apps.facebook.com/friends_photo/';
$config['fb_auth']		= 'email';