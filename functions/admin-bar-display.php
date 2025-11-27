<?php

// CHANGE OPACITY AND POSITION OF WORDPRESS ADMIN BAR //////////////////////////////////////////////////////
function ld56_admin_bar_display() {
    add_theme_support( 'admin-bar', array( 'callback' => 'admin_bar_on_hover') );
}
add_action( 'after_setup_theme', 'ld56_admin_bar_display' );

function admin_bar_on_hover() {
?>
<style>
    #wpadminbar {position:fixed;opacity:0;}
    #wpadminbar:hover {opacity:1;}
</style>
<?php
}


