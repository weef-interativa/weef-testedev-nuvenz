<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-site-verification" content="ZLHeqmsCjKA_FqhgzcuMSGvrliqR0QK5vgDwoCB9ZnI" />
	<title>Nuvenz - <?php the_title(); ?></title>

    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name="theme-color" content="#00F0FF">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" type="text/css"/>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VR64N0NG0H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-VR64N0NG0H');
    </script>
</head>

<?php wp_head(); ?>

<body id="nav">
    <div class="loader__wrapper loader__wrapper--pages">
        <div class="loader">
            <div></div><div></div><div></div><div></div>
            <span>Carregando...</span>
        </div>
    </div>
    <header class="header">
        <div class="header__content">
            <div class="container">
                <div class="row flex-row-reverse flex-md-row justify-content-between align-items-center">
                    <a href="#contato" class="header__contato2 mr-3">
                        Contacto
                    </a>
                    <div class="pl-0">
                        <?php if(get_field('logo_header', 'header')) : 
                        $image = get_field('logo_header', 'header'); ?>
                            <div class="header__brand">
                                <a href="<?php echo home_url(); ?>">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['alt'] ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                        <div class="header__nav">
                            <?php
                                wp_nav_menu(array(
                                    'menu'              => "Menu Principal",
                                    'menu_class'        => "header__nav--list",
                                    'container'         => true,
                                    'theme_location'    => "Menu principal",
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>