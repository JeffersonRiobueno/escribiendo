<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title><?php bloginfo('name'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>?v=0.0.9">
	<script src="<?php echo get_template_directory_uri().'/js/jquery.js'?>" type="text/javascript"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri().'/img/logo.png'?>" />
    <?php wp_head(); ?>
    <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
        <meta itemprop="name" content="Escribiendo en Conexion" />
    </div>
</head>
    <body id="body">
        <header>
            <a href="/" class="logo">
                <img src="<?php echo get_template_directory_uri().'/img/logo.jpg'?>" alt="">
            </a>
            <div class="menu menuMovil" id="menu">
                <div class="icon_menu2" onclick="closeMenu()">
                    <span></span>
                    <span></span>
                </div>
                <?php wp_nav_menu( array( 'theme_location' => 'navegation' ) ); ?>
                <?php wp_nav_menu( array( 'theme_location' => 'navegation_movil' ) ); ?>
                
            </div>
            <div class="h_cart">
                <a href="<?php echo bloginfo('url');?>/cart/">
                    <img src="<?php echo get_template_directory_uri().'/img/carrito.svg'?>" alt="">
                    <span class="cant-cart">0</span>
                </a>
            </div>
            <div class="icon_menu" onclick="openMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

        </header>
