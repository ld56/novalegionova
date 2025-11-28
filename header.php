<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php add_scripts_to_head_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <?php if (get_privacy_policy_url()) : ?>
    <meta name="policy-link" content="<?php echo get_privacy_policy_url(); ?>">
    <?php endif; ?>
    <?php if (empty(get_option('site_icon'))) : ?>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Nova Legionova" />
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

    <?php add_scripts_to_body_start(); ?>

    <?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>

    <header class="header">

        <div class="wrapper header__wrapper">

            <a class="header__home" href="<?php echo get_home_url(); ?>" aria-label="Strona główna">
                <img src="<?php bloginfo('template_directory');?>/dist/svg/ld200x120.svg" alt="" class="header__logo" aria-label="Logo strony">
            </a>

            <button class="header__button header__button--open" id="menu-open" aria-label="Otwórz menu mobilne" aria-expanded="false"></button> 

            <?php get_template_part('components/component', 'menu');?>

        </div>
    </header>