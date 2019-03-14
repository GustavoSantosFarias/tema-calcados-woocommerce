<?php

global $product;
global $woocommerce;

$tax_query = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN'
);
$args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'order'               => 'asc' ,
    'tax_query'           => $tax_query
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while($query){
        $query->the_post();

        //$variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
        //$price = $variation["display_regular_price"];

        $image = get_the_post_thumbnail_url();
        
    }
}