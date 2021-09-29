<div class="section portfolio" id="portfolio">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-3 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                <div class="portfolio__texto">
                    <?php if (get_field('sobretitulo_portfolio')) : ?>
                        <h2 class="portfolio__hat">
                            <?php the_field('sobretitulo_portfolio'); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (get_field('titulo_portfolio')) : ?>
                        <h3 class="portfolio__title">
                            <?php the_field('titulo_portfolio'); ?>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="portfolio__excerpt">
                    <?php if (get_field('texto_portfolio')) : ?>
                        <p>
                            <?php the_field('texto_portfolio'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( have_rows('slider_portfolio') ): ?>
                <div class="col-12 col-md-8">
                    <div class="slider-portfolio__content">
                        <div class="slider-portfolio slider-portfolio__items-0" id="slider-portfolio__items-0">
                            <?php while( have_rows('slider_portfolio') ) : the_row(); $i = get_row_index() - 1;?>
                                <div class="slider-portfolio__item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                                    <div class="card-portfolio">
                                        <a href="#" class="embed-responsive-item" data-toggle="modal" data-target="#modalImage-<?php echo $i; ?>">
                                            <?php if (get_sub_field('imagem_slider_portfolio')) :
                                            $image = get_sub_field('imagem_slider_portfolio'); ?>
                                                <figure class="card-portfolio__figure">
                                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                                                </figure>
                                            <?php endif; ?>

                                            <div class="card-portfolio__content">
                                                <h2 class="card-portfolio__title">
                                                    <?php the_sub_field('titulo_silder_portfolio'); ?>
                                                </h2>

                                                <p class="card-portfolio__excerpt">
                                                    <?php the_sub_field('texto_slider_portfolio'); ?>
                                                </p>
                                            </div>
                                            <div class="card-portfolio__button">
                                                Ver detalhes
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>