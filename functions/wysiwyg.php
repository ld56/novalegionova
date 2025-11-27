<?php

function my_format_TinyMCE( $in ) {
    $in['block_formats'] = "Paragraph=p;";
return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );