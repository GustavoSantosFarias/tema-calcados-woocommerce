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
    $template = THEME_TEMPLATES_DIR."products_featureds_view.php";
    $loop_products = new Divalesi\ProductsLoop($template);

    $loop_products->get("featured");
}
add_action("content_products_featureds","products_featureds");

function categories_home(){
    $template = THEME_TEMPLATES_DIR."categories_home_view.php";
    $loop_categories = new Divalesi\CategoriesLoop($template);

    $loop_categories->get();
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

function products_loop(){
    $template = THEME_TEMPLATES_DIR."products_shop_view.php";
    $loop_products = new Divalesi\ProductsLoop($template);

    $loop_products->get("all",12);
}
add_action("divalesi_shop_loop","products_loop");
