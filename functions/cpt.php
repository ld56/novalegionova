<?php

// Register CPT
// function register_cpt_1() {
//     $args = array(
//         'labels' => array(
//             'name'              => 'Aktualności',
//             'singular_name'     => 'Aktualności',
//         ),
//         'public'            => true,
//         'has_archive'       => true, // "true" allows you to set archive-{posttype}.php for your archive template
//         'hierarchical'      => false, // "true" means Pages( can have Parent and child items); "false" menas Posts
//         'supports'          => array(
//             'title', 
//             'page-attributes'
//         ),
//         'rewrite' => array( 
//             'slug'              => 'aktualnosci', 
//             'with_front'        => false 
//         ),
//         'menu_icon'   => 'dashicons-text-page',
//         // 'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( plugin_dir_path( __FILE__ ) . '../dist/svg/news.svg' ) ),
//     );
//     register_post_type('news', $args);
// }
// add_action( 'init', 'register_cpt_1' );


//// CUSTOM CPT ICONS //////////////////////////////////////////////////////
// function change_uslugi_icon() {
//     global $menu;
//     foreach ($menu as $key => $item) {
//         if ($item[0] == 'Usługi') {
//             // Zmiana indeksu 6 na nową klasę ikony (sprawdź dostępne ikony Dashicons)
//             $menu[$key][6] = 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( plugin_dir_path( __FILE__ ) . '../dist/svg/services.svg' ) );
//             break;
//         }
//     }
// }
// add_action('admin_menu', 'change_uslugi_icon');

// Order 'case-studies' by order-values, not date of creation
// add_action('pre_get_posts', 'custom_case_studies_order');

// function custom_case_studies_order($query) {
//     if (!is_admin() || !$query->is_main_query()) {
//         return;
//     }

//     if ($query->get('post_type') == 'case-studies') {
//         $query->set('orderby', 'menu_order');
//         $query->set('order', 'ASC');
//     }
// }