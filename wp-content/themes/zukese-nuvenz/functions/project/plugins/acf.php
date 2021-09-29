<?php
if( function_exists('acf_add_options_page') ) {
    $settings_slug = 'weef-theme-settings';

    acf_add_options_page(array(
        'page_title' 	=> __('Opções Gerais do Tema', 'assets-theme'),
        'menu_title'	=> __('Opções Gerais', 'assets-theme'),
        'menu_slug' 	=> $settings_slug,
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_page(array(
        'page_title' 	=> __('Configurações do Cabeçalho', 'assets-theme'),
        'menu_title' 	=> __('Cabeçalho', 'assets-theme'),
        'parent_slug' 	=> $settings_slug,
        'post_id'       => 'header',
        'slug'			=> 'settings-header',
    ));

    acf_add_options_page(array(
        'page_title' 	=> __('Configurações do Rodapé', 'assets-theme'),
        'menu_title' 	=> __('Rodapé', 'assets-theme'),
        'parent_slug' 	=> $settings_slug,
        'post_id'       => 'footer',
        'slug'			=> 'settings-footer',
    ));
}