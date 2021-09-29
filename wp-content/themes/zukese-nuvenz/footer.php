<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 footer__container">
                <?php if (get_field('titulo_rodape', 'footer')) : ?>
                    <p class="footer__text"><?php the_field('titulo_rodape', 'footer'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <hr class="footer__line">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php if (get_field('copyright_rodape', 'footer')) : ?>
                    <p class="footer__copy"><?php the_field('copyright_rodape', 'footer'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if(have_rows('redes_sociais_rodape', 'footer')):?>
                    <ul class="footer__social">
                        <?php while( have_rows('redes_sociais_rodape', 'footer') ) : the_row(); ?>
                            <li>
                                <?php $link = get_sub_field('link_redes_sociais')?>
                                <a href="<?php echo esc_url($link['url']) ?>" title="<?php the_sub_field('nome_rede_social'); ?>">
                                    <?php the_sub_field('icone_redes_sociais') ;?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <p class="footer__copy text-center text-md-right">
                    <?php if (get_field('link_termos', 'footer')) :
                    $link = get_field('link_termos', 'footer'); ?>
                        <a href="<?php echo $link['url']; ?>">
                            <?php echo $link['title']; ?> | 
                        </a>
                    <?php endif; ?>

                    <?php if (get_field('link_politica', 'footer')) :
                    $link = get_field('link_politica', 'footer'); ?>
                        <a href="<?php echo $link['url']; ?>">
                            <?php echo $link['title']; ?>
                        </a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>