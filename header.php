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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    </noscript>
    <?php if (empty(get_option('site_icon'))) : ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/favicon/safari-pinned-tab.svg" color="#535353">
    <meta name="msapplication-TileColor" content="#55de51">
    <meta name="theme-color" content="#eeeeee">
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