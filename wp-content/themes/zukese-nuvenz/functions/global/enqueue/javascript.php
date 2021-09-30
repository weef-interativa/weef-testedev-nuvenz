<?php
/**
 * Scripts personalizados. Nesta página contém todos os arquivos javascripts customizados do site
 *
 * @package Weef Assets Theme
 * @subpackage Assets
 * @since Weef Assets Theme - 1.0
 */

// Inclui o javascript do assets
add_action( 'wp_enqueue_scripts', 'add_assets_scripts' );
function add_assets_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'assets', FRONTEND_URI . 'webpack/dist/main.js', array(), ASSETS_VERSION, true );
	wp_enqueue_script( 'assets2', FRONTEND_URI . 'webpack/dist/vendors.js', array(), ASSETS_VERSION, true );
	wp_enqueue_script( 'custom_script', FRONTEND_URI . 'js/custom_script.js', array(), ASSETS_VERSION, true );
	wp_localize_script( 'custom_script', 'custom_script_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

function add_callable_filter_func() {
	wp_add_inline_script( 'custom_script', 'handle_blog_filter();' );
}
