<?php
/**
 * Permite inclusão de scripts assíncronos pelo enqueue scripts do wp
 */

// Async load
if (!function_exists('async_scripts')) {
	add_filter('clean_url', 'async_scripts', 11, 1);
	function async_scripts($url) {
	    if (strpos($url, '#asyncload') === false) {
	        return $url;
	    } else if (is_admin()) {
	        return str_replace('#asyncload', '', $url);
	    } else {
	        return str_replace('#asyncload', '', $url) . "' async='async";
	    }
	}
}
