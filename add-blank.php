<?php
/*
Plugin Name: add-blank
Description: 投稿の中の外部リンク全てに、target="_blank"をつける。
Author: Wakana Hashimoto
*/

add_filter('the_content','add_blank');

function add_blank($content){
	preg_match_all('/<a.+\/a>/u',$content,$atag);
	$atag = $atag[0];
	print_r($atag);
	$content = preg_replace('/<a.+\/a>/','リンク',$content);
	return $content;
}


?>