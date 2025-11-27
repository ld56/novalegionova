<?php

// ///////////////////////////////////////////////////////////////
// Old
// ///////////////////////////////////////////////////////////////
    // 1. REMOVE UNUSED CSS, LINKS, METAS, SCRIPTS
    function ld56_remove_block_css(){
        wp_dequeue_style( 'wp-block-library' ); // Wordpress core
        wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
        wp_dequeue_style( 'wc-block-style' ); // WooCommerce
        wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
    } 
    add_action( 'wp_enqueue_scripts', 'ld56_remove_block_css', 100 );
    add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
    add_filter( 'wpcf7_load_css', '__return_false' ); // remove contact form 7 styles
    remove_action ('wp_head', 'rsd_link'); // remove Weblog Client Link due to not using blog client
    remove_action( 'wp_head', 'wlwmanifest_link'); //remove Windows Live Writer Manifest Link due to not using Windows Live Writer
    remove_action('wp_head', 'wp_generator'); // remove WordPress Version Generator due to security reasons
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //remove wp-emoji script
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); //remove wp-emoji css

    // 2. REMOVE VERSION NUMBER AT THE END OF THE CSS/JS LINKS
    function ld56_remove_wp_ver_css_js( $src ) {
        if ( strpos( $src, 'ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }
    add_filter( 'style_loader_src', 'ld56_remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'ld56_remove_wp_ver_css_js', 9999 );

    // 3. REMOVE CONTACT FORM 7 CSS AND JS GLOBALLY
    // IF NECESSARY USE CONDITIONAL STATEMENTS TO DIRECT TO SUBPAGE WITH FORM
    add_filter( 'wpcf7_load_css', '__return_false' );
    // add_filter( 'wpcf7_load_js', '__return_false' );

    // 4. EMOVE WP-EMBED.MIN.JS
    // function crunchify_stop_loading_wp_embed_and_jquery() {
    // 	if (!is_admin()) {
    // 		wp_deregister_script('wp-embed');
    // 		wp_deregister_script('jquery');  // remove jquery too
    // 	}
    // }
    // add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');

    // 5. REMOVE BUILD-IN WORDPRESS WYSIWYG
    function ld56_remove_wysiwyg(){
        if (get_page_template_slug() != 'template-text.php'){ 
            remove_post_type_support( 'page', 'editor' );
            remove_post_type_support( 'post', 'editor' );
        }
    } 
    add_action( 'add_meta_boxes', 'ld56_remove_wysiwyg' );

    // 6. REMOVE GUTENBERG/WORDPRESS PRESET COLORS
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

    // 7. REMOVE BUILD-IN JQUERY
    // add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );
    // function change_default_jquery( ){
    //     wp_dequeue_script( 'jquery');
    //     wp_deregister_script( 'jquery');   
    // }

    // 8. // REMOVE CLASSIC-THEME-STYLES AND WP-MAIL-SMTP-ADMIN-BAR
    add_action( 'wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 20 );
    function mywptheme_child_deregister_styles() {
        wp_dequeue_style( 'classic-theme-styles' );
        wp_dequeue_style( 'wp-mail-smtp-admin-bar' );
    }

    // 9. REMOVE POSTS AND COMMENTS
    function remove_menu () {
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
        // remove_menu_page('edit.php?post_type=acf-field-group');
    } 
    add_action('admin_menu', 'remove_menu');

    // 10. FORCE SSL
    function set_ssl() {
        $_SERVER['HTTPS'] = 'on';
    }
    add_action('init','set_ssl');
    
    // 11. Remove those plugins that notify about updates that cannot be performed 
    // function AS_disable_plugin_updates( $value ) {
    //     //create an array of plugins you want to exclude from updates ( string composed by folder/main_file.php)
    //         $pluginsNotUpdatable = [
    //         'advanced-custom-fields-pro/acf.php',
    //     ];
        
    //     if ( isset($value) && is_object($value) ) {
    //         foreach ($pluginsNotUpdatable as $plugin) {
    //             if ( isset( $value->response[$plugin] ) ) {
    //                 unset( $value->response[$plugin] );
    //             }
    //         }
    //     }
    //     return $value;
    //     }
    // add_filter( 'site_transient_update_plugins', 'AS_disable_plugin_updates' );

    // 12. Remove plugins from WordPress plugin list 
    // add_filter(
    // 	'all_plugins',
    // 	function ( $plugins ) {

    // 		$shouldHide = ! array_key_exists( 'show_all', $_GET );

    // 		if ( $shouldHide ) {
    // 			$hiddenPlugins = [
    //                 'advanced-custom-fields-pro/acf.php',
    // 			];
    // 			foreach ( $hiddenPlugins as $hiddenPlugin ) {
    // 				unset( $plugins[ $hiddenPlugin ] );
    // 			}
    // 		}

    // 		return $plugins;
    // 	}
    // );

    // 13. Stop WordPress Heartbeat API
    // add_action('init', 'stop_heartbeat', 1);
    // function stop_heartbeat() {
    //     wp_deregister_script('heartbeat');
    //     wp_deregister_script('wp-auth-check');
    // }

    // 13.1. Stop WordPress Heartbeat API, excluding admin area
    add_action('init', 'optimize_heartbeat_settings', 1);
    function optimize_heartbeat_settings() {
        // Zmniejszenie częstotliwości Heartbeat API na frontendzie
        if (!is_admin()) {
            wp_deregister_script('heartbeat');
            wp_register_script('heartbeat', null);
        }
    }
    add_filter('heartbeat_settings', 'change_heartbeat_frequency');
    function change_heartbeat_frequency($settings) {
        $settings['interval'] = 60; // 60 sekund
        return $settings;
    }

    // 14. Enable WP_CRON only in admin area
    // add_action('admin_init', function() {
    //     if (!wp_doing_cron()) {
    //         spawn_cron();
    //     }
    // });

    // 15. Disable annyoing WordPress email notifications
    // Disable update emails.
    add_filter( 'auto_core_update_send_email', '__return_false' );
    // Disable auto-update emails for WordPress themes and plugins.
    add_filter( 'auto_theme_update_send_email', '__return_false' );
    add_filter( 'auto_plugin_update_send_email', '__return_false' );

// ///////////////////////////////////////////////////////////////
// Fluo
// ///////////////////////////////////////////////////////////////
    // 1. Zablokowanie enumeracji użytkowników
    if (!is_admin()) {
        // default URL format
        if (preg_match("/author=([0-9]*)/i", $_SERVER["QUERY_STRING"])) {
            die();
        }
        add_filter("redirect_canonical", "prevent_author_enumeration", 10, 2);
    }
    function prevent_author_enumeration($redirect, $request) {
        // permalink URL format
        if (preg_match("/\\?author=([0-9]*)(\\/*)/i", $request)) {
            die();
        } else {
            return $redirect;
        }
    }

    // 2. Schowanie defaultowej wordpressowej sitemapy z użytkownikami
    add_filter('wp_sitemaps_add_provider', 'sitemaps_provider', 10, 2);

    function sitemaps_provider($provider, $name) {
        if ('users' === $name) {
            return false;
        }
        return $provider;
    }

    // 3. Przekierowanie “stron” załączników, na załączniki (w sensie tych takich stron gdzie jest header, załącznik, footer)
    function redirect_attachment_urls() {
        if (is_attachment()) {
            wp_redirect(wp_get_attachment_url(), 301);
            exit();
        }
    }
    add_action('template_redirect', 'redirect_attachment_urls');

    // 4. Wyłączenie xml-rpc
    add_filter('xmlrpc_enabled', '__return_false');



// ///////////////////////////////////////////////////////////////
// Dodatkowe
// wpexplorer.com/prevent-user-enumeration-wordpress/
// ///////////////////////////////////////////////////////////////
    // 1. Prevent Access to Author Archives via user ID’s
    add_filter( 'remove_author_from_oembed', function( $data  ) {
        unset( $data['author_url'] );
        unset( $data['author_name'] );

        return $data;
    }, 10, 2 );
    
    // 1. Remove the Author URL’s from Embeds
    add_action( 'init', function() {
        if ( isset( $_REQUEST['author'] )
            && preg_match( '/\\d/', $_REQUEST['author'] ) > 0
            && ! is_user_logged_in()
        ) {
            wp_die( 'forbidden - number in author name not allowed = ' . esc_html( $_REQUEST['author'] ) );
        }
    } );

    // 2. Disable Author Archives Completely
    add_filter( 'template_redirect', function() {
        if ( is_author() || isset( $_GET['author'] ) ) {
            wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
        }
    } );
    add_filter( 'template_redirect', function() {
        if ( is_author() || isset( $_GET['author'] ) ) {
            global $wp_query;
            $wp_query->set_404();
            status_header( 404 );
            nocache_headers();
        }
    } );

    // 3. Removing Author URLs from Themes
    add_filter( 'the_author_posts_link', function( $link ) {
        if ( ! is_admin() ) {
            return get_the_author();
        }
        return $link;
    } );

    // 4. Modify the Login Form Error Notice
    add_filter( 'login_errors', function() {
        return 'An error occurred. Try again or if you are a bot, please don\'t.';
    } );


// ///////////////////////////////////////////////////////////////
// Disable some WordPress REST API endpoints 
// VER1: gosecure.net/blog/2021/03/16/6-ways-to-enumerate-wordpress-users/
// VER2: a2hosting.com/kb/installable-applications/optimization-and-configuration/wordpress2/disabling-rest-api-endpoints-in-wordpress/
// VER3: stackoverflow.com/questions/41191655/safely-disable-wp-rest-api
// ///////////////////////////////////////////////////////////////
add_filter( 'rest_endpoints', 'disable_default_endpoints' );
function disable_default_endpoints( $endpoints ) {
    $endpoints_to_remove = array(
        // Feel free to edit $endpoints_to_remove array as per your requirement. If you have custom post type, make sure to add those all to the list too.
        '/oembed/1.0',
        '/wp/v2',
        '/wp/v2/media',
        '/wp/v2/types',
        '/wp/v2/statuses',
        '/wp/v2/taxonomies',
        '/wp/v2/tags',
        '/wp/v2/users',
        '/wp/v2/comments',
        '/wp/v2/settings',
        '/wp/v2/themes',
        '/wp/v2/blocks',
        '/wp/v2/oembed',
        '/wp/v2/posts',
        '/wp/v2/pages',
        '/wp/v2/block-renderer',
        '/wp/v2/search',
        '/wp/v2/categories'
    );

    if ( ! is_user_logged_in() ) {
        foreach ( $endpoints_to_remove as $rem_endpoint ) {
            // $base_endpoint = "/wp/v2/{$rem_endpoint}";
            foreach ( $endpoints as $maybe_endpoint => $object ) {
                if ( stripos( $maybe_endpoint, $rem_endpoint ) !== false ) {
                    unset( $endpoints[ $maybe_endpoint ] );
                }
            }
        }
    }
    return $endpoints;
}


// ///////////////////////////////////////////////////////////////
// Boost WordPress Security by Adding Essential Headers through functions.php
// hoolite.be/wordpress/add-wordpress-security-headers-via-functions-php/
// ///////////////////////////////////////////////////////////////
    function hoolite_add_security_headers() {
        // 1. ClickJacking
        header("X-Frame-Options: SAMEORIGIN");
        // 2. MIME Sniffing
        header("X-Content-Type-Options: nosniff");
        // 3. X-Xss-Protection
        header("X-XSS-Protection: 1;mode=block");
        // 4. Referrer Policy
        header("Referrer-Policy: no-referrer-when-downgrade");
        // 5. Content Security Policy (CSP)
        header("Content-Security-Policy: upgrade-insecure-requests;");
        // 6. HTTP Strict Transport Security (HSTS)
        header('Strict-Transport-Security: "max-age=16070400" env=HTTPS');
    }
    add_action("send_headers", "hoolite_add_security_headers");

    // 7. Disable Themes & Plugins Editor
    define( 'DISALLOW_FILE_EDIT', true );

    // 8. Hide WordPress version
    add_filter( 'the_generator', '__return_empty_string' );