<?php
/* Template Name: Política */
?>

<?php get_header(); ?>

<main class="single-blog" id="main">

	<section class="section" id="main">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10">
					<h1 class="content__title"><?php the_title(); ?></h1>
                    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
		                <?php echo esc_html( get_the_author() ); ?>

	                </a>
                    <small class="card-text text-white font-weight-light"> - <?php the_modified_date(); ?> </small>

				</div>
                
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
