<div class="col-12 col-md-6">
    <?php if( have_rows('planejamentos_e_design') ): ?>
        <div class="row d-flex flex-wrap">
            <?php while( have_rows('planejamentos_e_design') ) : the_row(); ?>
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                    <div class="planning__texto--small">
                        <?php if (get_sub_field('imagem_planejamento_e_design_small')) :
                        $image = get_sub_field('imagem_planejamento_e_design_small'); ?>
                            <figure>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
                        
                        <div class="planning__content">
                            <h4 class="planning__title--small">
                                <?php the_sub_field('titulo_planejamentos_e_design_small'); ?>
                            </h4>
                            <div class="planning__excerpt--small">
                                <p>
                                    <?php the_sub_field('texto_planejamentos_e_design_small'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>