<?php
/**
 * Estilos personalizados. Nesta página contém todos os arquivos css customizados do site
 *
 * @package Weef Assets Theme
 * @subpackage Assets
 * @since Weef Assets Theme - 1.0
 */

// Inclui o css do assets
add_action('wp_enqueue_scripts', 'add_assets_styles');
function add_assets_styles() {
    wp_enqueue_style('assets_styles', FRONTEND_URI . 'webpack/dist/styles.css', array(), ASSETS_VERSION, 'all');
}
