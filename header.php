<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Navbar -->
<nav id="site-navbar" class="navbar navbar-expand-lg navbar-light bg-light small">
    <div class="container">
        <?php navbar_brand();?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'main-menu',
                'container'       => false,
                'menu_class'      => '',
                'fallback_cb'     => '__return_false',
                'items_wrap'      => '<ul id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                'depth'           => 2,
                'walker'          => new bootstrap_5_wp_nav_menu_walker()
            ) );
            ?>

            <?php get_search_form(); ?>
        </div>
    </div>
</nav>