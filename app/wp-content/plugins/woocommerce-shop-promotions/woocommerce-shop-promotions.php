<?php
/**
 * Plugin Name: Woocommerce Shop Promotions
 * Description: Promotions general setup
 * Author: Inventocc 
 * Author URI: http://minhaloja.inventocc.com
 */

if(!defined('ABSPATH')){
	exit("Acesso negado");
}

define('PLUGIN_DIRECTORY_ABSOLUT',plugin_dir_path(__FILE__));

require PLUGIN_DIRECTORY_ABSOLUT."autoload.php";
require PLUGIN_DIRECTORY_ABSOLUT."src/helpers.php";
require PLUGIN_DIRECTORY_ABSOLUT."src/admin-promotion-preferences.php";

use WoocommercePromotions\Rules;
use WoocommercePromotions\Loop;

function init_promotions($post_id){

    $conf = array(
        "discount_type" => get_post_meta($post_id, "_discount_type", true),
        "discount"      => get_post_meta($post_id, "_discount_value", true),
        "categories"    => unserialize(get_post_meta($post_id, "_promotion_categories", true))
    );
    
    $rules = new Rules($conf);
    $rules->parseArgs();

    $loop = new Loop($rules);
    $loop->run();
}
add_action("init_promotions_divalesi","init_promotions",10,1);

add_action("admin_init","promotions_assets_css");   
function promotions_assets_css(){
    wp_register_style('bootstrap', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap');
    wp_register_style('main', plugin_dir_url( __FILE__ ) . 'assets/css/main.min.css');
    wp_enqueue_style('main');
}

add_action("admin_init","promotions_assets_js");   
function promotions_assets_js(){
    wp_register_script('script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js');
    wp_enqueue_script('script');
}