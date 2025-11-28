<?php

// REGISTER CSS FILES //////////////////////////////////////////////////////
function ld56_add_collective_css() {
    wp_enqueue_style('fonts', get_template_directory_uri() . '/dist/css/fonts.css?v=0', array(), false, 'all');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/dist/css/normalize.css?v=0', array(), false, 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/css/main.css?v=0', array(), false, 'all');
    // wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'ld56_add_collective_css');