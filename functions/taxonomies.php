<?php 

// Add taxonomy to do CPT "articles"
// function add_article_taxonomy() {
//     $labels = array(
//         'name'              => 'Kategorie artykułów',
//         'singular_name'     => 'Kategoria artykułu',
//         'search_items'      => 'Szukaj kategorii artykułów',
//         'all_items'         => 'Wszystkie kategorie artykułów',
//         'parent_item'       => 'Nadrzędna kategoria artykułu',
//         'parent_item_colon' => 'Nadrzędna kategoria artykułu:',
//         'edit_item'         => 'Edytuj kategorię artykułu',
//         'update_item'       => 'Aktualizuj kategorię artykułu',
//         'add_new_item'      => 'Dodaj nową kategorię artykułu',
//         'new_item_name'     => 'Nowa nazwa kategorii artykułu',
//         'menu_name'         => 'Kategorie artykułów',
//     );

//     $args = array(
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'query_var'         => true,
//         'rewrite'           => array( 'slug' => 'kategoria-artykulu' ),
//     );

//     register_taxonomy( 'categories-articles', 'articles', $args );
// }
// add_action( 'init', 'add_article_taxonomy' );