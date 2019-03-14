<?php

function divalesi_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'divalesi_add_woocommerce_support');
add_filter('woocommerce_enqueue_styles', '__return_false');

function load_setup_theme(){
    require __DIR__."/inc/setup.php";
}
add_action("init","load_setup_theme");

function products_featureds(){
    require_once "inc/src/products_featureds.php";
}
add_action("content_products_featureds","products_featureds");

function categories_home(){
    require_once "inc/src/categories.php";
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