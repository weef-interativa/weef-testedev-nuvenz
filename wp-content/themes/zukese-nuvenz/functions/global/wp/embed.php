<?php
/**
 * Remove o script de wp-embed
 *
 * @package Weef Assets Theme
 * @subpackage Assets
 * @since Weef Assets Theme - 1.0
 */

add_action( 'wp_footer', 'disable_wp_embed' );
function disable_wp_embed() {
  wp_deregister_script( 'wp-embed' );
}

function get_src_from_html($code){
    preg_match( '@src="([^"]+)"@' , $code, $match );
    $src = array_pop($match);
    return $src;
}


