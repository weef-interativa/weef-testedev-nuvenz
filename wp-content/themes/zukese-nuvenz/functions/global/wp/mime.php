<?php
add_filter('upload_mimes', 'assets_mime_types', 1, 1);
function assets_mime_types($mime_types){
	$mime_types['svg'] = 'image/svg'; //Adding svg extension

	return $mime_types;
}