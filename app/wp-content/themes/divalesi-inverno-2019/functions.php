<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function load_setup_theme(){
    require __DIR__."/inc/setup.php";
}
add_action("init","load_setup_theme");