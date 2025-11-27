<?php

// SET OPTIONS PAGE + TRANSLATIONS //////////////////////////////////////////////////////
if ( function_exists( 'acf_add_options_page' ) ) {

    $option = acf_add_options_page( array(
        'page_title' => 'Globalne ustawienia strony',
        'menu_title' => 'Globalne',
        // 'redirect'   => 'globalne',
        'icon_url'   => 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( plugin_dir_path( __FILE__ ) . '../dist/svg/wp-general.svg' ) ),
        'update_button' => __('Aktualizuj', 'acf'),
    ) );

    acf_add_options_sub_page( array(
        'page_title' => 'Globalne: ogólne',
        'menu_title' => __('Ogólne', ''),
        'menu_slug'  => "acf-options",
        'parent'     => $option['menu_slug'],
        'update_button' => __('Aktualizuj', 'acf'),
    ) );

    // TO IMPLEMENT OPTION PAGES FOR ARCHIVES OR LANGUAGES, SEE NOTES.
}