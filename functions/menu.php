<?php

// Menu Support
add_theme_support('menus');

// Register Menu
register_nav_menus(
    array(
        'header-menu' => 'Pozycja: nagłówek',
    )
);

// Own walker
class ld56_header_menu_walker extends Walker {
    
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

    public $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id',
    );

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array( 'menu__ul menu__ul--sub' );

        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID . ' menu__li';

        if( $this -> has_children ) {
            $classes[] = 'menu__li--extended';
        }

        if ($depth > 0) {
            $classes = array();
            $classes[] = 'menu__li menu__li--sub';
        }

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';
        $atts['class'] = 'c-black menu__a';

        if ($depth > 0) {
            $atts['class'] = 'c-black menu__a menu__a--sub';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
}


// FOR CPT 
// function add_current_nav_class($classes, $item) {

//     // Getting the current post details
//     global $post;

//     // Get post ID, if nothing found set to NULL
//     $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

//     // Checking if post ID exist...
//     if (isset( $id )){

//         // Getting the post type of the current post
//         $current_post_type = get_post_type_object(get_post_type($post->ID));

//         // Getting the rewrite slug containing the post type's ancestors
//         $ancestor_slug = $current_post_type->rewrite ? $current_post_type->rewrite['slug'] : '';

//         // Split the slug into an array of ancestors and then slice off the direct parent.
//         $ancestors = explode('/',$ancestor_slug);
//         $parent = array_pop($ancestors);

//         // Getting the URL of the menu item
//         $menu_slug = strtolower(trim($item->url));

//         // Remove domain from menu slug
//         $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

//         // If the menu item URL contains the post type's parent
//         if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
//             $classes[] = 'current-menu-item';
//         }

//         // If the menu item URL contains any of the post type's ancestors
//         foreach ( $ancestors as $ancestor ) {
//             if (!empty($menu_slug) && !empty($ancestor) && strpos($menu_slug,$ancestor) !== false) {
//                 $classes[] = 'current-page-ancestor';
//             }
//         }
//     }
//     // Return the corrected set of classes to be added to the menu item
//     return $classes;

//  }
//  add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );