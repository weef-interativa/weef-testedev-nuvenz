<?php
/* Template Name: Política */
?>

<?php get_header(); ?>

<main class="politica" id="main">

    <section class="section ambientation" id="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h1 class="content__title"><?php the_title(); ?></h1>
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