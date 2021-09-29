<?php
/**
 * Theme image renditions;
 */
// Add thumbnails support
add_theme_support('post-thumbnails');

// Registra e retorna renditions configurados para o tema
function get_renditions(){
	// Adicionar hidden=true pra não exibir nas escolhas de tamanho de media no seletor de biblioteca do wp
	return array(
		'thumb-ico' => array(
			'label' => 'Thumb Ico',
			'width' => 16,
			'hidden' => true,
		),
		'thumb-xs' => array(
			'label' => 'Thumb XS',
			'width' => 480,
		),
		'thumb-sm' => array(
			'label' => 'Thumb SM',
			'width' => 768,
		),
		'thumb-md' => array(
			'label' => 'Thumb MD',
			'width' => 992,
		),
		'thumb-lg' => array(
			'label' => 'Thumb LG',
			'width' => 1200,
		),
		'thumb-xlg' => array(
			'label' => 'Thumb XLG',
			'width' => 1600,
		),
		'thumb-xxlg' => array(
			'label' => 'Thumb XXLG',
			'width' => 1920,
		),
	);
} 

// Add image size for each rendition
foreach (get_renditions() as $key => $value) {
	add_image_size($key, $value['width']);
}

// Filter custom renditions image on media size choice (WP Media gallery)
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array();
	foreach (get_renditions() as $key => $value) {
		if ( !$value['hidden'] ) {
			$custom_sizes[ $key ] = $value['label'];
		}
	}
    return array_merge( $sizes, $custom_sizes );
}
