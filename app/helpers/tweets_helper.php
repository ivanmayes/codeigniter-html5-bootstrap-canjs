<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function format_tweet($tweet, $linklenth = 30) {
	get_instance()->load->helper('url');
	
	$tweet =  preg_replace("/(http:\/\/|(www\.))(([^\s<]{4,$linklenth})[^\s<]*)/", '<a href="http://$2$3" rel="nofollow" target="_blank">$2$4</a>', $tweet);

	$tweet =  preg_replace("/@([a-zA-Z\d]{3,30})/", '<a href="'.base_url().'user/$1" rel="nofollow external"></a>', $tweet);
	
	return $tweet;
}