<?php

$args = array(
    'post_type' => 'product'
);

$categories = get_terms( 'product_cat', $args );

foreach ($categories as $category) {

    $category_id_image = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true );
    $category_image = wp_get_attachment_image_url($category_id_image,"full"); 
    $category_name = $category->name;
    $category_link = get_term_link( $category->term_id, 'product_cat' );;

    include get_template_directory() . "/inc/templates/categories_home_view.php";

}