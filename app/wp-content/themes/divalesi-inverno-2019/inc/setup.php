<?php
global $woocommerce;

use Predis\Autoloader as AutoloaderRedis;
use Predis\Client as RedisClient;

define("THEME_TEMPLATES_DIR",get_template_directory()."/inc/templates/");
define("THEME_CLASSES_DIR",get_template_directory()."/inc/src/class/");
define("THEME_ASSETS_DIR",get_template_directory()."/assets/");
define("THEME_ASSETS_URI",get_template_directory_uri()."/assets/");

// AutoloaderRedis::register();

// $redis_client = new RedisClient(array(
//     "scheme" => "tcp",
//     "host" => "redis",
//     "port" => 6379,
//     "password" => "redistest"
// ));

// $args = array(
//     'post_type'      => 'product',
//     'post_status' => 'publish',
//     'orderby' => 'title',
//     'order'   => 'ASC',
//     'meta_query' => array(
//         array(
//             'key'     => '_product_attributes',
//             'compare' => 'LIKE',
//         ),
//     ),
//     'post__in' => ''
// );
// $cache = new Divalesi\Cache();

require "helpers.php";