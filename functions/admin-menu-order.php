<?php

// CUSTOM ADMIN MENU ITEMS ORDER //////////////////////////////////////////////////////
function ld56_custom_admin_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php',                                // Dashboard    /   Kokpit
        'separator1',                               // ------------------ First separator
        'acf-options',                              // ACF Options
        'edit.php?post_type=page',                  // Pages        /   Strony
        'edit.php?post_type=oferta',                // CPT
        'edit.php',                                 // Posts        /   Wpisy
        'upload.php',                               // Media        /   Media
        'link-manager.php',                         // Links        /   -
        'edit-comments.php',                        // Comments     /   Komentarze
        'separator2',                               // ------------------ Second separator
        'themes.php',                               // Appearance   /   Wygląd
        'plugins.php',                              // Plugins      /   Wtyczki
        'users.php',                                // Users        /   Użytkownicy
        'tools.php',                                // Tools        /   Narzędzia
        'options-general.php',                      // Settings     /   Ustawienia
        'separator-last',                           // ------------------ Last separator
        'edit.php?post_type=acf-field-group',       // ACF
        'theseoframework-settings',                 // SEO
        'edit.php?post_type=cookielawinfo',         // GDPR Cookie Consent
        'wpcf7',                                    // Contact Form 7
        'wp-mail-smtp',                             // SMTP
        'mlang',                                    // Polylang
        'duplicator',                               // Duplicator

    );
}
add_filter( 'custom_menu_order', 'ld56_custom_admin_menu_order', 10, 1 );
add_filter( 'menu_order', 'ld56_custom_admin_menu_order', 10, 1 );


// // CUSTOM PLUGIN NAME AND ICON //////////////////////////////////////////////////////
// function kl_rename_plugin_menus() {
//     global $menu;

//     // Define your changes here
//     $updates = array(
//         "GDPR Cookie Consent" => array(
//             'name' => 'Ciasteczka',
//             'icon' => 'dashicons-info-outline'
//         )
//     );

//     foreach ( $menu as $k => $props ) {

//         // Check for new values
//         $new_values = ( isset( $updates[ $props[0] ] ) ) ? $updates[ $props[0] ] : false;
//         if ( ! $new_values ) continue;

//         // Change menu name
//         $menu[$k][0] = $new_values['name'];

//         // Optionally change menu icon
//         if ( isset( $new_values['icon'] ) )
//             $menu[$k][6] = $new_values['icon'];
//     }
// }
// add_action( 'admin_init', 'kl_rename_plugin_menus' );