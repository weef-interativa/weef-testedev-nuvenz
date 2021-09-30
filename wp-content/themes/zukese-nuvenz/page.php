<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
	
			<?php

			// Start the Loop.
			while ( have_posts() ) :

				the_post();

				get_template_part( 'templates/blog', 'page' );


			endwhile; // End the loop.
			?>
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
