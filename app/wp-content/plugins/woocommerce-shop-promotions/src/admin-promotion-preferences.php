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
        'rules',           
        'Rules',  
        'rules_html',  
        'promotions'               
    );
}
add_action('add_meta_boxes', 'meta_box_rules');

function rules_html($post){
    $discount_type = get_post_meta($post->ID, "_discount_type", true);
    $discount_value = get_post_meta($post->ID, "_discount_value", true);
    $categories_promotion = get_post_meta($post->ID, "_promotion_categories", true) ? unserialize(get_post_meta($post->ID, "_promotion_categories", true)) : "";

    require PLUGIN_DIRECTORY_ABSOLUT."templates/meta_boxes_rules.php";
}

function register_meta_keys($post_id){
    update_post_meta(
        $post_id, 
        '_type_promotion',
        $_POST['type-promotion']
    );

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

    update_post_meta(
        $post_id,
        '_type_promotion',
        $_POST["type-promotion"]
    );

    if (isset($_POST["categories"]) && !empty($_POST["categories"])) {
        update_post_meta(
            $post_id,
            '_promotion_categories',
            serialize($_POST["categories"])
        );
    }

    if ($_POST["type-promotion"] == "cart") {
        update_post_meta(
            $post_id,
            '_product_quantity_min',
            $_POST["product-quantity-min"]
        );

        update_post_meta(
            $post_id,
            '_product_quantity_max',
            $_POST["product-quantity-max"]
        );
    }
    
    do_action("init_promotions_divalesi", $post_id);
}  
add_action( 'publish_post', 'register_meta_keys', 10, 1);
add_action( 'post_updated', 'register_meta_keys', 10, 1);