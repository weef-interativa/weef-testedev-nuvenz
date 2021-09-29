<?php

function get_sharer_template( $sharer = null ){
    $templates = array(
        'facebook'      => 'https://www.facebook.com/sharer/sharer.php?u={{ permalink }}',
        // 'twitter'       => 'https://twitter.com/share?url={{ title }}&text={{ permalink }}',
        'twitter'       => 'https://twitter.com/home?status={{ permalink }}',
        'google-plus'   => 'https://plus.google.com/share?url={{ permalink }}',
        'linkedin'      => 'https://www.linkedin.com/cws/share?url={{ permalink }}',
        'whatsapp'      => 'whatsapp://send?text={{ title }} {{ permalink }}',
        'envelope'      => 'mailto:email@example.com?subject={{ title }}&body={{ permalink }}'
    );

    if ( !$sharer) return $templates;

    return $templates[ $sharer ];
}

function get_share_link($sharer = null, $post_id = null) {
    $model = array(
        'title'     => get_the_title( $post_id ),
        'permalink' => urlencode(get_the_permalink( $post_id )),
    );

    if ( empty( $sharer ) ) {
        return $model['permalink'];
    }
    
    $template = get_sharer_template( $sharer );
    if ( !empty( $template) ) {
        return render_string( $template, $model, 0 );
    }

    return;
}

function get_share_items( $post_id = null, $options = null ) {
    $options = !empty( $options ) ? $options : array(
        'facebook'      => 'Facebook',
        'linkedin'       => 'LinkedIn',
        // 'envelope'      => 'Email',
    );

    $tmp = array();
    foreach ($options as $sharer => $title ) {
        $tmp[] = array(
            'icon' => 'fa-' . $sharer,
            'link' => array(
                'title' => $title,
                'target' => "_blank",
                'href' => get_share_link( $sharer, $post_id ),
            )
        );
    }
    return $tmp;
}

function get_share_model( $post_id = null, $options = null ) {
    $items = get_share_items( $post_id, $options );

    $model = array(
        'share' => array(
            'items' => $items,
        ),
    );

    return $model;
}