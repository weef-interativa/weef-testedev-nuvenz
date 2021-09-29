<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

    $sep = '';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumb"> <ul>';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single('post') ){
            echo '<li><a href="' . home_url() . '/blog"> Blog </a></li>';
            echo '<li>';
            single_cat_title();
            echo '</li>';
        } 
	
	// If the current page is a single post, show its title with the separator
        // if (is_single()) {
        //     echo $sep 'teste';
        //     echo '<li>';
        //     the_title();
        //     echo '</li>';
        // }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            global $post;
            if ( $post->post_parent > 0 ) {
                /* Get an array of Ancestors and Parents if they exist */
                $parents = get_post_ancestors( $post->ID );
                /* Get the top Level page->ID count base 1, array base 0 so -1 */
                $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
                /* Get the parent and set the $class with the page slug (post_name) */
                $parent = get_post( $id );
                $class = $parent->post_name;

                echo '<li><a href="' . get_permalink( $parent ) . '">' . $parent->post_title;
                echo '</a></li>' . $sep;
            }
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
        if(is_singular( 'procedimento' )) {
            
            echo '<li><a href="' . home_url() . '/procedimentos"> Procedimentos';
            echo '</a></li>' . $sep;

            echo '<li>';
            echo the_title();
            echo '</li>';
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</ul></div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/
?>