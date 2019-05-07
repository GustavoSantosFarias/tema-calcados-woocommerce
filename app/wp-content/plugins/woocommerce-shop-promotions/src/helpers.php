<?php

function getCategories(){
    $args = array(
        'number' => 8,
        'post_type' => 'product',
        'post_status' => 'publish'
    );

    $categories = get_terms( 'product_cat', $args );

    return $categories;
}

function categoryActive($category, $categories_array){
    if (in_array($category,$categories_array)) {
        
    }
}   