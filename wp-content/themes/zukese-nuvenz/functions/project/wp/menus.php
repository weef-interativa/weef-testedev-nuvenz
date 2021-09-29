<?php
/**
 * Registra os menus disponíveis do WP.
 */
add_action( 'after_setup_theme', 'assets_register_menus');
function assets_register_menus(){
	register_nav_menu( 'header', 			__( 'Menu principal', 'assets-theme' ) );
	register_nav_menu( 'footer_1', 			__( 'Rodapé 1', 'assets-theme' ) );
	register_nav_menu( 'footer_2', 			__( 'Rodapé 2', 'assets-theme' ) );
	register_nav_menu( 'footer_3', 			__( 'Rodapé 3', 'assets-theme' ) );
}
