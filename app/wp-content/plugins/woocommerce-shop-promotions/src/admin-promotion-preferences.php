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

add_action('admin_menu', 'woocommerce_promotions_setup_menu');
function woocommerce_promotions_setup_menu(){
    add_menu_page('Woocommerce Promotions', 'Woocommerce Promotions', 'manage_options', 'woocommerce-promotions', 'woocommerce_promotions_list_template', 'dashicons-cart' );
}

function woocommerce_promotions_list_template(){
    $args = array(
        'post_type'      => 'promotions',
        'post_status'    => array('publish','draft'),
        'posts_per_page' => 120
    );

    $loop = new WP_Query($args);

    require_once PLUGIN_DIRECTORY_ABSOLUT."templates/promotions_list.php";
}

function hide_permalink($return,$post_id){
    $post_type = get_post_type($post_id);

    if($post_type == "promotions"){
        return "";
    }

    return $return;
}
add_filter( 'get_sample_permalink_html', 'hide_permalink', 10, 5 );

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
    
    do_action("init_plugin_promotions", $post_id);
}  
add_action( 'publish_post', 'register_meta_keys', 10, 1);
add_action( 'post_updated', 'register_meta_keys', 10, 1);