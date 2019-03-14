<?php

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 7,
    'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while($query->have_posts()){

        $query->the_post();

        $variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
        $regular_price = $variation[0]["display_regular_price"];
        $sale_price = $variation[0]["display_price"];
        $image = get_the_post_thumbnail_url();

        include(get_template_directory() . "/inc/templates/products_featureds_view.php");
    
    }
}