<?php

function products_featureds(){
    get_template_part("templates/products_featureds_view.php");
}
add_action("content_products_featureds","products_featureds");

function categories_home(){
    get_template_part("templates/categories_home_view.php");
}
add_action("content_categories_home","categories_home");

function banners_home(){
    get_template_part("templates/banners_home_view.php");
}
add_action("content_banners_home","banners_home");

function home(){
    do_action("content_banners_home");
    do_action("content_products_featureds");
    do_action("content_categories_home");
}
add_action("content_home","home");