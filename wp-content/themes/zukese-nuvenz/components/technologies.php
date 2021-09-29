<div class="section technologies" id="tecnologia">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="technologies__texto wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                    <?php if (get_field('sobretitulo_tecnologias')) : ?>
                        <h2 class="technologies__hat">
                            <?php the_field('sobretitulo_tecnologias'); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (get_field('titulo_tecnologias')) : ?>
                        <h3 class="technologies__title">
                            <?php the_field('titulo_tecnologias'); ?>
                        </h3>
                    <?php endif; ?>

                    <div class="technologies__excerpt">
                        <?php if (get_field('texto_tecnologias')) : ?>
                            <p>
                                <?php the_field('texto_tecnologias'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if( have_rows('tecnologias') ) : ?>
            <div class="row flex-wrap technologies__status2 justify-content-center pt-4 technologies__wrapper wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                <?php while( have_rows('tecnologias') ) : the_row(); ?>
                    <div class="technologies__item">
                        <?php while( have_rows('grupo_tecnologias') ) : the_row(); ?>
                            <div class="technologies__content <?php echo get_row_index() == 1 ? "active" : "";?>">
                                <?php if (get_sub_field('icone_tecnologias')) :
                                $image = get_sub_field('icone_tecnologias'); ?>
                                    <img src="<?php echo $image['url'];?>" class="technologies__figure" alt="<?php echo $image['title'];?>">
                                <?php endif; ?>
                                <div class="technologies__icon--texto">
                                    <p>
                                        <?php the_sub_field('nome_tecnologias'); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="row flex-wrap technologies__status justify-content-center pt-4 technologies__wrapper wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                <div class="slider-technologies">
                    <?php while( have_rows('tecnologias') ) : the_row(); ?>
                        <?php while( have_rows('grupo_tecnologias') ) : the_row(); ?>
                            <div class="technologies__item">
                                <div class="technologies__content active">
                                    <?php if (get_sub_field('icone_tecnologias')) :
                                    $image = get_sub_field('icone_tecnologias'); ?>
                                        <img src="<?php echo $image['url'];?>" class="technologies__figure" alt="<?php echo $image['title'];?>">
                                    <?php endif; ?>
                                    <div class="technologies__icon--texto">
                                        <p>
                                            <?php the_sub_field('nome_tecnologias'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        
    </div>
</div>