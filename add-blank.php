<?php
/*
Plugin Name: add-blank
Description: 投稿の中の外部リンク全てに、target="_blank"をつける。
Author: Wakana Hashimoto
*/

class add_blank{

	function __construct(){
		add_filter('the_content',array( $this, 'add_blank' ));
	}
	function add_blank($content){
		preg_match_all('/<a.+\/a>/u',$content,$atags);
		$atags = $atags[0];
		// print_r($atags);
		foreach ($atags as $atag) {
			if(preg_match('/https?\:\/\//',$atag) && !strpos($atag,$_SERVER["HTTP_HOST"])){
				if (!preg_match('/target.+blank"/', $atag)) {
					$atag2 = preg_replace('/(?<!a)\>/','target="_blank">',$atag);
					$content = str_replace($atag, $atag2, $content);
				}
			}
		}
		return $content;
	}
}
new add_blank;

?>