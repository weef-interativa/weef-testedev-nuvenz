<?php
/* Template Name: Home */
?>

<?php get_header(); ?>

<main class="home">
    <section class="section main-title">
        <!-- OVERVIEW -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                    <?php if (get_field('titulo_topo')) : ?>
                        <h1 class="main-title__text">
                            <?php the_field('titulo_topo'); ?>
                        </h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--pattern-main pb-0" id="sobre">
        <!-- SOBRE --> 
        <div class="container">
            <div class="row flex-column-reverse flex-md-row justify-content-center align-items-center">
                <div class="col-12 col-md-7 pl-0 pr-0">
                    <div class="section__selo wow zoomIn" data-wow-duration="0.6s" data-wow-delay="0.12s">
                        <?php if (get_field('marca_sobre_nos')) :
                        $image = get_field('marca_sobre_nos'); ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="section__figure embed-responsive embed-responsive-16by9 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.10s">
                        <?php if (get_field('video_sobre_nos')) :
                        $image = get_field('video_sobre_nos'); ?>
                            <video autoplay loop>
                                <source src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="section__sobre-nos-texto wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.8s">
                        <?php if (get_field('sobretitulo_sobre_nos')) : ?>
                            <h2 class="section__hat">
                                <?php the_field('sobretitulo_sobre_nos'); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if (get_field('titulo_sobre_nos')) : ?>
                            <h3 class="section__title--sobre">
                                <?php the_field('titulo_sobre_nos'); ?>
                            </h3>
                        <?php endif; ?>
                    </div>
                    <div class="section__excerpt">
                        <?php if (get_field('texto_sobre_nos')) : ?>
                            <p>
                                <?php the_field('texto_sobre_nos'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="section--second-circle">
                <div class="row justify-content-center align-items-center section--missao">
                    <div class="col-12 col-md-8 ">
                        <?php if (get_field('texto_missao')) : ?>
                            <h3 class="section__title--missao wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                                <?php the_field('texto_missao'); ?>
                            </h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- PLANEJAMENTO & DESIGN -->
        <div class="section planning" id="planejamento">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-5 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.16s">
                        <div class="planning__texto">
                            <?php if (get_field('sobretitulo_planejamento_e_design')) : ?>
                                <h2 class="planning__hat">
                                    <?php the_field('sobretitulo_planejamento_e_design'); ?>
                                </h2>
                            <?php endif; ?>
                            
                            <?php if (get_field('titulo_planejamento_e_design')) : ?>
                                <h3 class="planning__title">
                                    <?php the_field('titulo_planejamento_e_design'); ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                        <div class="planning__excerpt">
                            <?php if (get_field('texto_planejamento_e_design')) : ?>
                                <p>
                                    <?php the_field('texto_planejamento_e_design'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php get_template_part('components/planning'); ?>
                </div>
            </div>
        </div>
    </section>


    <section class="section section--pattern-portfolio pb-0">
        <!-- Tecnologias -->
        <?php get_template_part('components/technologies'); ?>

        <!-- Portfolio -->
        <?php get_template_part('components/portfolio'); ?>
    </section>


    <section class="section section--pattern-contato contact">
        <!-- TRABALHE CONOSCO -->
        <div class="section work-with-us" id="recrutamento">
            <div class="container">
                <div class="row justify-content-center align-items-center" id="recrutamento">
                    <div class="col-12 col-md-8 work-with-us--bg wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                        <?php if (get_field('imagem_menor_superior_esquerda')) :
                        $image = get_field('imagem_menor_superior_esquerda'); ?>
                            <figure class="work-with-us__figureA">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
    
                        <?php if (get_field('imagem_menor_superior_direita')) :
                        $image = get_field('imagem_menor_superior_direita'); ?>
                            <figure class="work-with-us__figureB">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
                        
                        <?php if (get_field('imagem_menor_inferior_esquerda')) :
                        $image = get_field('imagem_menor_inferior_esquerda'); ?>
                            <figure class="work-with-us__figureC">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
                        
                        <?php if (get_field('imagem_menor_inferior_direita')) :
                        $image = get_field('imagem_menor_inferior_direita'); ?>
                            <figure class="work-with-us__figureD">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
    
                        <?php if (get_field('imagem_maior_centro')) :
                        $image = get_field('imagem_maior_centro'); ?>
                            <figure class="work-with-us__figure-center">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
    
                        <div class="work-with-us__circle3">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                        <div class="work-with-us__text">
                            <?php if (get_field('sobretitulo_trabalhe_conosco')) : ?>
                                <h2 class="section__hat">
                                    <?php the_field('sobretitulo_trabalhe_conosco'); ?>
                                </h2>
                            <?php endif; ?>
    
                            <?php if (get_field('titulo_trabalhe_conosco')) : ?>
                                <h3 class="section__title">
                                    <?php the_field('titulo_trabalhe_conosco'); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <div class="section__excerpt">
                                <?php if (get_field('texto_trabalhe_conosco')) : ?>
                                    <p>
                                        <?php the_field('texto_trabalhe_conosco'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <?php if (get_field('link_trabalhe_conosco')) :
                            $link = get_field('link_trabalhe_conosco'); ?>
                                <a href="#" data-toggle="modal" data-target="#modalForm" class="section__button">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTATO -->
        <div class="section contact" id="contato">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-5 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                        <div class="contact__texto">
                            <?php if (get_field('sobretitulo_contato')) : ?>
                                <h2 class="contact__hat">
                                    <?php the_field('sobretitulo_contato'); ?>
                                </h2>
                            <?php endif; ?>
    
                            <?php if (get_field('titulo_contato')) : ?>
                                <h3 class="contact__title">
                                    <?php the_field('titulo_contato'); ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <?php if( have_rows('informacoes_contato') ): ?>
                                <?php while( have_rows('informacoes_contato') ) : the_row(); ?>
                                    <div class="col-md-5">
                                        <div class="contact__excerpt--contato">
                                            <p><?php the_sub_field('tipo_informacoes_contatos'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="contact__excerpt--informacao">
                                            <?php if (get_sub_field('link_informacoes_contatos')) :
                                            $link = get_sub_field('link_informacoes_contatos')?>
                                                <a href="<?php echo esc_url($link['url']) ?>">
                                                    <?php the_sub_field('texto_informacoes_contatos'); ?> 
                                                </a>
                                            <?php else : ?>
                                                <p><?php the_sub_field('texto_informacoes_contatos'); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.14s">
                        <div class="contact__excerpt">
                            <div class="row">
                                <div class="col-12 col-md-10">
                                    <?php if (get_field('titulo_formulario_contato')) : ?>
                                        <p><?php the_field('titulo_formulario_contato'); ?></p>
                                    <?php endif; ?>
    
                                    <?php if (get_field('instrucoes_formulario_contato')) : ?>
                                        <p><?php the_field('instrucoes_formulario_contato'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form">
                            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<div class="modal fade work-with-us__modal" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalForm">Candidatar-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">

                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php if( have_rows('slider_portfolio') ): ?>
    <?php while( have_rows('slider_portfolio') ) : the_row(); $i = get_row_index() - 1;?>
        <div class="modal fade slider-portfolio__modal" id="modalImage-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalImageLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php if(get_sub_field('titulo_silder_portfolio')) : ?>
                            <h5 class="modal-title section__title align-items-center" id="">
                                <?php the_sub_field('titulo_silder_portfolio'); ?>
                            </h5>
                        <?php endif; ?>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="slider-portfolio__modal--slider slider-portfolio__modal--slider-<?php echo $i; ?>">
                            <?php if (get_sub_field('imagem_preview_slider_portfolio')) :
                            $image = get_sub_field('imagem_preview_slider_portfolio'); ?>
                                <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (get_sub_field('link_preview_slider_portfolio')) :
                    $link = get_sub_field('link_preview_slider_portfolio'); ?>
                        <div class="modal-footer">
                            <a href="<?php echo $link['url']; ?>" type="button" class="btn btn-primary">
                                <?php echo $link['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>