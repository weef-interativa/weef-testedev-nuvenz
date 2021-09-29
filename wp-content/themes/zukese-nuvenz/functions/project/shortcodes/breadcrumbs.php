<?php

add_shortcode('breadcrumb_simple', 'breadcrumb_simple');
function breadcrumb_simple() {
    global $post;
	$separator = ' / ';
	
	if ( !is_front_page() ) {
		$bread_data = array(
			'links' => array(
				'title' => get_the_title( get_option('page_on_front') ),
				'url'	=> get_option('home')
			),
			'separator' => $separator,
			'current_page' => get_the_title()
		);

		return $bread_data;
	} 
	
}
?>
