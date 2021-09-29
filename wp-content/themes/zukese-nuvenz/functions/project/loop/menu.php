<?php
/**
 * Definições de loops de menu
 *
 * Uso:
 * loop_menu_$s()
 *
 * @package Weef Assets Theme
 * @subpackage Assets
 * @since Weef Assets Theme - 1.0
 */

/**
 * Default map function for menu items used in loop_menu_items
 * @param  array  $item    WP menu item object as array
 * @param  integer $depth  The depth of current menu item
 * @param  array  $submenu The menu item child menu items
 * @return array           Mapped menu item
 */
function loop_menu_items_map_fn( $item, $depth=0, $submenu=null ){
    $item['sub'] = $submenu;
    return $item;
}

/**
 * Returns an menu as treeview, maping each menu item with map_fn
 * @param  array        $menu   WP menu items
 * @param  integer      $parent Current loop parent, defaults to 0
 * @param  integer      $depth  Current depth, helper variable for map_fn use
 * @param  function     $map_fn The function used as callback to map each menu items defaults to loop_menu_items_map_fn()
 * @return array        Current menu as tree view
 */
function loop_menu_items( $menu=null, $map_fn=null, $parent=0, $depth=0 ) {
    // Bail early if $menu not present
    if ( !$menu ) return;
    // Default option for $map_fn
    if ( !$map_fn ) $map_fn = "loop_menu_items_map_fn";

    $parsed_menu = array();

    // Loop into menu
    foreach ($menu as $item ) {
        // Casting $menu_item type as associative array
        $menu_item = (array) $item;

        // Only return menu items in the current parent
        if ( $menu_item['menu_item_parent'] == $parent ) {
            // Recursion for current item submenu
            $submenu = loop_menu_items( $menu, $map_fn, $menu_item['ID'], $depth + 1);

            // Invoke map function with $depth and $submenus
            // Return is appended to $parsed_menu variable
            $parsed_menu[] = $map_fn( $menu_item, $depth, $submenu );
        }
    }

    // Returns the actual menu as tree view
    return $parsed_menu;
}
