<?php
use Divalesi\Product\ProductsLoop;
use Divalesi\Category\CategoriesLoop;
use Divalesi\Filter\Filter;

function divalesi_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'divalesi_add_woocommerce_support');
add_filter('woocommerce_enqueue_styles', '__return_false');

function register_menu() {
    register_nav_menus(array(
        'header-menu'           => __('Categories Menu'),
        'footer-atendimento'    => __('Footer Atendimento'),
        'links-uteis-footer'    => __('Links Úteis Footer'),
        'nossas-redes'          => __('Nossas Redes')
    ));
}
add_action('init','register_menu');

function load_setup_theme(){
    require __DIR__."/inc/setup.php";
}
add_action("init","load_setup_theme");

function products_featureds(){
    $template = THEME_TEMPLATES_DIR."products_featureds_view.php";
    $loop_products = new ProductsLoop($template,-1,"featured");

    $loop_products->loop();
}
add_action("content_products_featureds","products_featureds");

function categories_home(){
    $template = THEME_TEMPLATES_DIR."categories_home_view.php";
    $categories = CategoriesLoop::instance($template);

    $categories->loop();
}
add_action("content_categories_home","categories_home");

function categories_home_before(){
    require THEME_TEMPLATES_DIR."categories_home_before_view.php";
}
add_action("content_categories_home_before","categories_home_before");

function categories_home_after(){
    require THEME_TEMPLATES_DIR."categories_home_after_view.php";
}
add_action("content_categories_home_after","categories_home_after");

function products_featureds_before(){
    require THEME_TEMPLATES_DIR."products_featureds_before_view.php";
}
add_action("content_products_featureds_before","products_featureds_before");

function products_featureds_after(){
    require THEME_TEMPLATES_DIR."products_featureds_after_view.php";
}
add_action("content_products_featureds_after","products_featureds_after");

function banners_home(){
    get_template_part("inc/templates/banners_home_view");
}
add_action("content_banners_home","banners_home");

function home(){
    do_action("content_banners_home");
    
    do_action("content_products_featureds_before");
    do_action("content_products_featureds");
    do_action("content_products_featureds_after");

    do_action("content_categories_home_before");
    do_action("content_categories_home");
    do_action("content_categories_home_after");
}
add_action("content_home","home");

function products_loop(){
    $template = THEME_TEMPLATES_DIR."products_shop_view.php";
    $loop_products = new ProductsLoop($template,12);

    $loop_products->loop(12);
}
add_action("divalesi_shop_loop","products_loop");

function shop_filters(){
    $template = THEME_TEMPLATES_DIR."filters_shop_view.php";
    $filters = Filter::instance();

    $_filters = $filters->get();

    require $template;
}
add_action("divalesi_shop_filters","shop_filters");

$args = array(
'limit' => 9999,
'return' => 'ids'
);