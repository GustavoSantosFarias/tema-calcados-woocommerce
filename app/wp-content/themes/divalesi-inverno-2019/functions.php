<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function load_setup_theme(){
    require __DIR__."/inc/setup.php";
}
add_action("init","load_setup_theme");


function products_featureds(){
    get_template_part("inc/templates/products_featureds_view");
}
add_action("content_products_featureds","products_featureds");

function categories_home(){
    get_template_part("inc/templates/categories_home_view");
}
add_action("content_categories_home","categories_home");

function banners_home(){
    get_template_part("inc/templates/banners_home_view");
}
add_action("content_banners_home","banners_home");

function home(){
    do_action("content_banners_home");
    do_action("content_products_featureds");
    do_action("content_categories_home");
}
add_action("content_home","home");