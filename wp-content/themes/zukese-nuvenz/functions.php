<?php

define ('WPLANG', 'pt_BR');

// Diretório do template
$template_dir = get_template_directory();

// Constantes do assets
define('ASSETS_VERSION', '1.2.2');
define('ASSETS_PATH', '/');

// Caminhos do front end
define('FRONTEND_PATH', $template_dir . ASSETS_PATH);
define('FRONTEND_URI', get_template_directory_uri() . ASSETS_PATH);

require_once "functions/index.php";


/* Pull apart OEmbed video link to get thumbnails out*/
/* Pull apart OEmbed video link to get thumbnails out*/
function get_video_thumbnail_uri( $video_uri ) {
	
    $thumbnail_uri = '';
    
    // determine the type of video and the video id
    $video = parse_video_uri( $video_uri );		
    
    // get youtube thumbnail
    if ( $video['type'] == 'youtube' )
        $thumbnail_uri = 'http://img.youtube.com/vi/' . $video['id'] . '/default.jpg';
    
    // get vimeo thumbnail
    if( $video['type'] == 'vimeo' )
        $thumbnail_uri = get_vimeo_thumbnail_uri( $video['id'] );
    // get wistia thumbnail
    if( $video['type'] == 'wistia' )
        $thumbnail_uri = get_wistia_thumbnail_uri( $video_uri );
    // get default/placeholder thumbnail
    if( empty( $thumbnail_uri ) || is_wp_error( $thumbnail_uri ) )
        $thumbnail_uri = ''; 
    
    //return thumbnail uri
    return $thumbnail_uri;
    
}


/* Parse the video uri/url to determine the video type/source and the video id */
function parse_video_uri( $url ) {
    
    // Parse the url 
    $parse = parse_url( $url );
    
    // Set blank variables
    $video_type = '';
    $video_id = '';
    
    // Url is http://youtu.be/xxxx
    if ( $parse['host'] == 'youtu.be' ) {
    
        $video_type = 'youtube';
        
        $video_id = ltrim( $parse['path'],'/' );	
        
    }
    
    // Url is http://www.youtube.com/watch?v=xxxx 
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {
    
        $video_type = 'youtube';
        
        parse_str( $parse['query'] );
                
        if ( !empty( $feature ) )
            $video_id = end( explode( 'v=', $parse['query'] ) );
            
        if ( strpos( $parse['path'], 'embed' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );
        
    }
    
    // Url is http://www.vimeo.com
    if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {
    
        $video_type = 'vimeo';
        
        $video_id = ltrim( $parse['path'],'/' );	
                    
    }
    $host_names = explode(".", $parse['host'] );
    $rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
    // Url is an oembed url wistia.com
    if ( ( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' ) ) {
    
        $video_type = 'wistia';
            
        if ( strpos( $parse['path'], 'medias' ) == 1 )
                $video_id = end( explode( '/', $parse['path'] ) );
    
    }
    
    // If recognised type return video array
    if ( !empty( $video_type ) ) {
    
        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );
    
        return $video_array;
        
    } else {
    
        return false;
        
    }
    
}


/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL.*/
function get_vimeo_thumbnail_uri( $clip_id ) {
    $vimeo_api_uri = 'http://vimeo.com/api/v2/video/' . $clip_id . '.php';
    $vimeo_response = wp_remote_get( $vimeo_api_uri );
    if( is_wp_error( $vimeo_response ) ) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize( $vimeo_response['body'] );
        return $vimeo_response[0]['thumbnail_large'];
    }
    
}

/* Takes a wistia oembed url and gets the video thumbnail url. */
function get_wistia_thumbnail_uri( $video_uri ) {
    if ( empty($video_uri) )
        return false;
    $wistia_api_uri = 'http://fast.wistia.com/oembed?url=' . $video_uri;
    $wistia_response = wp_remote_get( $wistia_api_uri );
    if( is_wp_error( $wistia_response ) ) {
        return $wistia_response;
    } else {
        $wistia_response = json_decode( $wistia_response['body'], true );
        return $wistia_response['thumbnail_url'];
    }
}

function callback_blog_filter() {

    $cat    = isset( $_GET['category'] ) ? $_GET['category'] : '';
    $search = isset( $_GET['s'] ) ? $_GET['s'] : '';
    $pagination_counter = isset( $_GET['pagination_counter'] ) ? $_GET['pagination_counter'] : '6';

    $args = array(
        'post_type'     => 'post',
        'order'         => 'ASC',
        'category_name' => $cat,
        's'             => $search,
        'posts_per_page' => intval($pagination_counter),
    );

    $post_query = new WP_Query( $args );

    ob_start();
    loop_blog_filter($post_query);
    $html = ob_get_contents();
    ob_end_clean();

    wp_send_json_success(array(
        'html' => $html,
    ));

} // end callback_blog_filter;

function loop_blog_filter($post_query) {

    if ( $post_query->have_posts() ) {

         ?>
            <div class="d-flex flex-row flex-wrap justify-content-center">
         <?php
        while ( $post_query->have_posts() ) {

            $post_query->the_post();
            ?>
            
                <div class="p-2">
                    <div class="card bg-transparent" style="width: 18rem;">

                        <a class="card-img-top" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute();    ?>">
                        </a>

                      <div class="card-body">

                        <!-- <h5 class="card-title text-white">
                             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a> 
                        </h5> -->

                        <h6 class="card-text text-white font-weight-light"> <?php echo get_the_excerpt(); ?> </h6>

                        <small class="card-text text-white font-weight-light"> <?php the_modified_date(); ?> </small>

                      </div>

                    </div>
                </div>
            

            <?php

        }

        ?>
        </div>
        <?php

    }

} // end loop_blog_filter;


add_action( 'wp_ajax_blog_filter', 'callback_blog_filter' );
add_action( 'wp_ajax_nopriv_blog_filter', 'callback_blog_filter' );