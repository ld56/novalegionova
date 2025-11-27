<?php

// ENABLE THUMBNAILS //////////////////////////////////////////////////////
add_theme_support( 'post-thumbnails' );

// ENABLE SVG UPLOAD TO MEDIA //////////////////////////////////////////////////////
add_filter('upload_mimes', 'ld56_myme_types', 1, 1);
function ld56_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}

// REMOVE DEFAULT WORDPRESS IMAGE SIZES //////////////////////////////////////////////////////
add_filter( 'intermediate_image_sizes_advanced', 'ld56_remove_default_images' );
function ld56_remove_default_images( $sizes ) {
    unset( $sizes['small']);            // Small (150px)
    unset( $sizes['medium']);           // Medium (300px)
    unset( $sizes['medium_large']);     // Medium-large (768px)
    unset( $sizes['large']);            // Large (1024px)
    unset( $sizes['1536x1536']);        // 2 x Medium Large (1536 x 1536)
    unset( $sizes['2048x2048']);        // 2 x Large (2048 x 2048)
    return $sizes;
}

// ADD CUSTOM IMAGES SIZES //////////////////////////////////////////////////////
add_image_size('120w', 120, false);
add_image_size('180w', 180, false);
add_image_size('240w', 240, false);
add_image_size('360w', 360, false);
add_image_size('480w', 480, false);
add_image_size('540w', 540, false);
add_image_size('720w', 720, false);
add_image_size('960w', 960, false);
add_image_size('1080w', 1080, false);
add_image_size('1440w', 1440, false);
add_image_size('1920w', 1920, false);

// REMOVE DEFAULT "SCALED" IMAGE VERSION //////////////////////////////////////////////////////
add_filter( 'big_image_size_threshold', '__return_false' );

// CHANGE DEFAULT JPEG COMPRESSION (80) //////////////////////////////////////////////////////
// add_filter( 'jpeg_quality', 'my_prefix_regenerate_thumbnail_quality');
// function my_prefix_regenerate_thumbnail_quality() {
// 	return 80;
// }

// REPLACE ORIGINALY UPLOADED IMAGE BY ['1920w'] //////////////////////////////////////////////////////
add_filter( 'big_image_size_threshold', '__return_false' );
function replace_uploaded_image($image_data) {
    // if there is no large image : return
    if (!isset($image_data['sizes']['1920w'])) return $image_data;
    // paths to the uploaded image and the large image
    $upload_dir = wp_upload_dir();
    $uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
    // $large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file']; // ** This only works for new image uploads - fixed for older images below.
    $current_subdir = substr($image_data['file'],0,strrpos($image_data['file'],"/"));
    $large_image_location = $upload_dir['basedir'] . '/'.$current_subdir.'/'.$image_data['sizes']['1920w']['file'];
    // delete the uploaded image
    unlink($uploaded_image_location);
    // rename the large image
    rename($large_image_location,$uploaded_image_location);
    // update image metadata and return them
    $image_data['width'] = $image_data['sizes']['1920w']['width'];
    $image_data['height'] = $image_data['sizes']['1920w']['height'];
    unset($image_data['sizes']['1920w']);
    return $image_data;
}
add_filter('wp_generate_attachment_metadata','replace_uploaded_image');

// REMOVE HEIGHT AND WIDTH ATTRIBUTE FROM WP <img>
// add_filter( 'wp_get_attachment_image', 'ld56_remove_height_and_width_from_images', 15, 5);
// function ld56_remove_height_and_width_from_images ($html, $attachment_id, $size, $icon, $attr) {
// 	$attr = array_map( 'esc_attr', $attr );
// 	$html = rtrim( "<img " );
// 	foreach ( $attr as $name => $value ) {
// 		$html .= " $name=" . '"' . $value . '"';
// 	}
// 	$html .= ' />';
// 	return $html;
// }

// FILTER AND FORCEFULLY REPLACE THE UPLOADS DIRECTORY WITH SPECIFIED DATE
// add_filter( 'upload_dir', function () {
//     return _wp_upload_dir( '2024/06' );
// }, 100, 0 );


// DISABLE CSS RULE (contain-intrinsic-size: 3000px 1500px) AND REMOVE "AUTO" VALUE FROM SIZE ATTRIBUE (BOTH ADDED IN WORDPRESS 6.7.1)
add_filter('wp_img_tag_add_auto_sizes', '__return_false');
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment, $size) {
    if (isset($attr['sizes']) && strpos($attr['sizes'], 'auto') !== false) {
        $attr['sizes'] = preg_replace('/auto,?\s*/', '', $attr['sizes']);
    }
    return $attr;
}, 10, 3);

// REMOVE 'wp-post-image' CLASS ADDED AUTOMATICALLY BY WORDPRESS TO PREVENT OVERWRITING CUSTOM CLASSES
function remove_wp_post_image_class( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = str_replace( ' wp-post-image', '', $html ); 
    $html = str_replace( 'wp-post-image', '', $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_wp_post_image_class', 10, 5 );