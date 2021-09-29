<?php

/**
 * Returns menu id by location
 * @param  string $location Menu location
 * @return int              Menu id
 */
function get_menu_id_by_location( $location ){
	return get_nav_menu_locations()[ isset($location) ? $location : 0 ];
}

/**
 * Returns wordpress menu objects array by location
 * @param  string $location Menu location
 * @return array            Menu items array
 */
function get_menu_by_location( $location='header' ){
	$list = wp_get_nav_menu_items( get_menu_id_by_location( $location ) );
	return $list;
}

/**
 * Return menu tree view from menu location and menu item map function
 * @param  string $location Menu location
 * @param  function $map_fn Map function
 * @return array            Menu as tree view
 */
function get_menu_tree_view( $location='header', $map_fn=null ){
    return loop_menu_items( get_menu_by_location( $location ), $map_fn );
}