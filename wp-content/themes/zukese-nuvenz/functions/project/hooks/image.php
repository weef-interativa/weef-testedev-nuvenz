<?php
function get_post_image() {
    if (has_post_thumbnail()) : 
        $image = get_the_post_thumbnail_url();
    else :
        $image = get_template_directory_uri() . '/webpack/public/assets/images/placeholder.png';
    endif;

    return $image;
}