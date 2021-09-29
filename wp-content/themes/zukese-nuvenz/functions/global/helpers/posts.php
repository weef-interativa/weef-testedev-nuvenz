<?php
/**
 * Trim excerpts with limited words
 * @param  string    $suffix     The suffix for the string
 * @param  integer  $words_limit The limit of words in the excerpt
 * @param  integer  $post_id     The id of the post
 * @return string                Excerpt limited
 */
function trim_excerpt($suffix = ' [...]', $words_limit=15, $post_id=null ){
    // Default post id
    $post_id = !empty($post_id) ? $post_id : get_the_id();

    // The excerpt
    $excerpt = get_the_excerpt( $post_id );

    // Excerpt with limited words
    $trim_excerpt = wp_trim_words( $excerpt, $words_limit, $suffix);

    // Return entity decode
    return html_entity_decode( $trim_excerpt );
}

function trim_title($suffix = ' [...]', $words_limit = 15, $post_id = null ){

    $post_id = !empty($post_id) ? $post_id : get_the_id();

    $title = get_the_title( $post_id );

    $trim_title = wp_trim_words( $title, $words_limit, $suffix);

    return html_entity_decode( $trim_title );

}


function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
  }

add_filter( 'body_class', 'wp_remove_body_class', 10, 2 );

function wp_remove_body_class( $wp_classes, $extra_classes ) {

    // List of the only WP generated classes allowed
    $whitelist = array( 'rlt', 'home', 'blog', 'archive', 'date', 'search-results', 'search-no-results' );

    // Filter the body classes
    $wp_classes = array_intersect( $wp_classes, $whitelist );

    // Add the extra classes back untouched
    return array_merge( $wp_classes, (array) $extra_classes );
}

function get_acf_image_list( $field_name = null, $hash = '') {

    $field = get_field( $field_name, get_the_ID() )[$hash];
    if ( !empty($field) ) {
        $images = array_map( function($image) {
            return $image;
        }, $field);

        return $images;
    }

    return null;
}
