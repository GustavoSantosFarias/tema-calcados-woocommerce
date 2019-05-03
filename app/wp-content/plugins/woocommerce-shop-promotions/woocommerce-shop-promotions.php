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

use WoocommercePromotions\Rules;
use WoocommercePromotions\Loop;


function init_promotions(){

    $conf = array(
        "discount_type" => "percent",
        "discount"      => "50%",
    );
    
    $rules = new Rules($conf);
    $rules->parseArgs();

    $loop = new Loop($rules);
    $loop->run();
}
add_action("init_promotions_divalesi","init_promotions");