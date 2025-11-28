<?php

// APPEND UNIVERSAL JS FILES //////////////////////////////////////////////////////
function ld56_add_universal_js() {
    // wp_enqueue_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), false, true );
    wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/dist/js/swiper-bundle.min.js', array(), false, false );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/js/main.js?v=3', array(), false, false );
}
add_action('wp_enqueue_scripts', 'ld56_add_universal_js');



// DEFER SCRIPTS //////////////////////////////////////////////////////
function ld56_defer_js($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array(
        'main',
    );
	foreach($scripts_to_defer as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
	}
	return $tag;
}
add_filter('script_loader_tag', 'ld56_defer_js', 10, 2);



// ASYNC SCRIPTS //////////////////////////////////////////////////////
function ld56_async_js($tag, $handle) {
    // add script handles to the array below
    $scripts_to_async = array(
        // 'menu',
    );
    foreach($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' async="async" src', $tag);
        }
    }
    return $tag;
}
add_filter('script_loader_tag', 'ld56_async_js', 10, 2);



// REMOVE TYPE ATTRIBUTE FROM JS TAGS //////////////////////////////////////////////////////
function ld56_theme_support_for_html5 () {
    add_theme_support( 'html5', [ 'script', 'style' ] );
}
add_action( 'after_setup_theme', 'ld56_theme_support_for_html5' );



// ADD FOUR LOCATIONS FOR CUSTOM SCRIPTS ///////////////////////////////////
function add_scripts_to_head_start() {
    $head1_scripts = get_fields('options')['global']['additional-scripts']['for-head'];
    if (!empty($head1_scripts)) {
        echo '<!-- BEGIN CUSTOM SCRIPTS AT THE START OF THE HEAD -->';
        echo $head1_scripts;
        echo '<!-- END CUSTOM SCRIPTS AT THE START OF THE HEAD -->';
    }
}

function add_scripts_to_head_end() {
    $head2_scripts = get_fields('options')['global']['additional-scripts']['for-head2'];
    if (!empty($head2_scripts)) {
        ?>
        <!-- BEGIN CUSTOM SCRIPTS AT THE END OF THE HEAD -->
        <?php echo $head2_scripts; ?>
        <!-- END CUSTOM SCRIPTS AT THE END OF THE HEAD -->
        <?php
    }
}
add_action('wp_head', 'add_scripts_to_head_end', 99999999);

function add_scripts_to_body_start() {
    $body1_scripts = get_fields('options')['global']['additional-scripts']['for-body1'];
    if (!empty($body1_scripts)) {
        echo '<!-- BEGIN CUSTOM SCRIPTS AT THE START OF THE BODY -->';
        echo $body1_scripts;
        echo '<!-- END CUSTOM SCRIPTS AT THE START OF THE BODY -->';
    }
}

function add_scripts_to_body_end() {
    $body2_scripts = get_fields('options')['global']['additional-scripts']['for-body2'];
    if (!empty($body2_scripts)) {
        ?>
        <!-- BEGIN CUSTOM SCRIPTS AT THE END OF THE BODY -->
        <?php echo $body2_scripts; ?>
        <!-- END CUSTOM SCRIPTS AT THE END OF THE BODY -->
        <?php
    }
}
add_action('wp_footer', 'add_scripts_to_body_end', 99999999);



// DEREGISTER DEFAULT JQUERY AND REGISTER IT AGAIN WITH DEFER TAG //////////////////////
// function add_defer_to_default_jquery() {
//     if (!is_admin()) {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), [], null, false);
//         add_filter('script_loader_tag', function($tag, $handle) {
//             if ('jquery' === $handle) {
//                 return str_replace(' src', ' defer="defer" src', $tag);
//             }
//             return $tag;
//         }, 10, 2);
//         wp_enqueue_script('jquery');
//     }
// }
// add_action('wp_enqueue_scripts', 'add_defer_to_default_jquery');