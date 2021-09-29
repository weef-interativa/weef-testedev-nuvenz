<?php

add_filter('upload_mimes','add_custom_mime_types');
function add_custom_mime_types($mimes){
    return array_merge($mimes,array (
        'ac3' => 'audio/ac3',
        'svg' => 'image/svg+xml',
        'png' => 'image/png',
        'jpg' => 'image/jpeg'
    ));
}

function wpdocs_remove_menus() {
    // Remove Comments
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );