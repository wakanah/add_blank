<?php
/*
Plugin Name: add-blank
Description: 投稿の中の外部リンク全てに、target="_blank"をつける。
Author: Wakana Hashimoto
*/

add_filter('the_content','add_blank');

function add_blank($content){
	preg_match_all('/<a.+\/a>/u',$content,$atags);
	$atags = $atags[0];
	print_r($atags);
	foreach ($atags as $atag) {
		if(preg_match('/https?\:\/\//',$atag) && !strpos($atag,$_SERVER["HTTP_HOST"])){
			$content = str_replace($atag,'外部リンク',$content);
		}
	}
	return $content;
}


?>