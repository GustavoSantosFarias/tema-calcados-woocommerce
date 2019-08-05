<?php
// Template name: Test

error_reporting(E_ALL ^ E_NOTICE);
echo "<pre>";
$promotion = new Divalesi\Promotions\ParseCsv("https://docs.google.com/spreadsheets/d/e/2PACX-1vSSZYAQnRQ97mqx2mX8sTYwAKStcLUhFnTdRNLbwOqopp8Brl6D_HYfkvmQ_m3iGZ2LcVtVjmSNT_bB/pub?gid=0&single=true&output=csv");

print_r($promotion->data());

// foreach ($promotion->data()["products"] as $sku) {
//     $product = wc_get_products(array('meta_key' => '_sku','meta_value' => $sku));

//     // print_r($product);
// }


// $args = array(
//     'post_type'      => 'product',
//     'post_status'    => 'publish',
//     'posts_per_page' => 120,
//     'tax_query'      => array(
//         "relation"   => "AND",

//         array(
//             'taxonomy' => 'product_cat',
//             'field'    => 'slug',
//             'terms'    => 'botas',
//             'operator' => 'NOT IN'
//         )
//     )
// );

// $loop = new WP_Query($args);
// while($loop->have_posts()) { 
//     $loop->the_post();
//     global $product;

//     $variations = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());

//     foreach ($variations as $variation) {
//         $promotion_price = $variation["display_regular_price"] * 0.5;

//         update_post_meta($variation["variation_id"], '_sale_price', $promotion_price);
//         wc_delete_product_transients($variation["variation_id"]);
//     }

//     wc_delete_product_transients(get_the_ID());
// }