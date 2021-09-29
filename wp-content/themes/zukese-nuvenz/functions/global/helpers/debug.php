<?php
/**
 * Helper for debugging variables in the screen
 */
function print_var( $var ){
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}

/**
 * Helper for printing a variable inside javascript global object
 */
function js_var( $key, $val, $debug=false ) {
	echo '<script>';
	echo 'window["'. $key .'"] = ' . json_encode($val) . ';';
	echo $debug ? 'console.log( window["' . $key . '"] );' : '';
	echo '</script>';
}
/**
 * Helper for debug purposes
 * @param  [type] $var [description]
 * @return [type]      [description]
 */
function console_log( $var ){
	$the_uniqid = uniqid('assets_dev_debug_');
	if ( !is_ajax() ) {
		js_var( $the_uniqid, $var, 1);

		return $the_uniqid;
	}
}