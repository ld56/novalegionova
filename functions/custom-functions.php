<?php

// SHORTHAND FOR ACF LINK FEATURE //////////////////////////////////////////////////////
function acf_echo_link($class, $link, $args) {
    $aria_label = "";

    if (!$link) {
        echo "";
    } else {
        $link_target = "";
        $link_url = "";
        $link_title = "";
        
        if ($link != "") {
            $link_target = ($link['target']) ? 'target="' . $link['target'] . '"' : '' ;
            $link_url = $link['url'];
            $link_title = $link['title'];
        }
    
        $before = '';
        $after = '';
    
        if (isset($args['before'])) {
            $before = $args['before'];
        }
    
        if (isset($args['after'])) {
            $after = $args['after'];
        }

        if (isset($args['aria-label']) && $args['aria-label'] == true) {
            $link_title = '';
            $aria_label = ' aria-label="' . $link['title'] . '"';
        }
    
        $final_link = '<a class="';
        $final_link .= $class;
        $final_link .= '" href="';
        $final_link .= $link_url;
        $final_link .= '" ';
        $final_link .= $link_target;
        $final_link .= $aria_label;
        $final_link .= '>';
        $final_link .= $before;
        $final_link .= $link_title;
        $final_link .= $after;
        $final_link .= '</a>';

        echo $final_link;
    }
}

// REMOVE ORPHANS //////////////////////////////////////////////////////
function remove_orphans ($text) {
    $pattern = '/(?<=\s\w)\s/i';
    $new_text = preg_replace($pattern, '&nbsp;', $text);
    return $new_text;
}

// ALLOWED TAGS FOR WP_KSES VARIANTS //////////////////////////////////////////////////////
function tags_for_textarea() {
    return array(
        'br' => array(),
    );
}

function tags_for_wysiwyg() {
    return array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
            'id' => array(),
            'target' => array(),
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'p' => array(
            'class' => array(),
        ),
        'h1' => array(
            'class' => array(),
        ),
        'h2' => array(
            'class' => array(),
        ),
        'h3' => array(
            'class' => array(),
        ),
        'h4' => array(
            'class' => array(),
        ),
        'h5' => array(
            'class' => array(),
        ),
        'table' => array(
            'class' => array(),
            'id' => array(),
            'style' => array(),
        ),
        'tr' => array(
            'class' => array(),
            'id' => array(),
        ),
        'td' => array(
            'class' => array(),
            'id' => array(),
            'colspan' => array(),
            'rowspan' => array(),
        ),
        'th' => array(
            'class' => array(),
            'id' => array(),
            'colspan' => array(),
            'rowspan' => array(),
        ),
        'img' => array(
            'src' => array(),
            'alt' => array(),
            'class' => array(),
            'id' => array(),
            'width' => array(),
            'height' => array(),
            'loading' => array('lazy', 'eager'), // Dopuszczalne wartości: 'lazy', 'eager'
            'decoding' => array('async', 'sync'), // Dopuszczalne wartości: 'async', 'sync'
            'srcset' => array(),
            'sizes' => array(),
        ),
        'ol' => array(),
        'ul' => array(),
        'li' => array(),
        'b' => array(),
        'pre' => array(),
    );
}