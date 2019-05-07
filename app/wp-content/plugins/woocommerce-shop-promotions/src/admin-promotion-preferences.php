<?php

function register_post_type_rules(){
    $labels = array(
        'name'          => 'Promotions',
        'singular_name' => 'Promotion',
        'menu_name'     => 'Promotions',
        'add_new'       => 'Add Promotion',
        'new_item'      => 'New Promotion',
        'edit_item'     => 'Edit Promotion',
    );

    $args = array(
        'labels'   => $labels,
        'public'   => true,
        'supports' => array( 'title' )
    );

    register_post_type("promotions",$args);
}
add_action("init","register_post_type_rules");

function meta_box_rules(){
    add_meta_box(
        'products-rules',           
        'Products Rules',  
        'products_rules_html',  
        'promotions'               
    );

    // add_meta_box(
    //     'cart-rules',           
    //     'Cart Rules',  
    //     'cart_rules_html',  
    //     'promotions'               
    // );
}
add_action('add_meta_boxes', 'meta_box_rules');

function products_rules_html($post){
    $discount_type = get_post_meta($post->ID, "_discount_type", true);
    $discount_value = get_post_meta($post->ID, "_discount_value", true);
    $categories_promotion = get_post_meta($post->ID, "_promotion_categories", true) ? unserialize(get_post_meta($post->ID, "_promotion_categories", true)) : "";

    require PLUGIN_DIRECTORY_ABSOLUT."templates/meta_boxes_products.php";
}

function cart_rules_html($post){
    require PLUGIN_DIRECTORY_ABSOLUT."templates/meta_boxes_cart.php";
}

function register_meta_keys($post_id){
    update_post_meta(
        $post_id,
        '_discount_value',
        $_POST['discount-value']
    );
    
    update_post_meta(
        $post_id,
        '_discount_type',
        $_POST['discount-type']
    );

    if (isset($_POST["categories"]) && !empty($_POST["categories"])) {
        update_post_meta(
            $post_id,
            '_promotion_categories',
            serialize($_POST["categories"])
        );
    }
}  
add_action('save_post', 'register_meta_keys');