<?php
// Navigation

function wpb_custom_new_menu() {
register_nav_menus(
array(
'main-menu' => __( 'Main Menu' )
)
);
}
add_action( 'init', 'wpb_custom_new_menu' );