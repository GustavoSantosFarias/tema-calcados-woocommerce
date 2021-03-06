<?php
global $woocommerce;

use Predis\Autoloader as AutoloaderRedis;
use Predis\Client as RedisClient;

define("THEME_TEMPLATES_DIR",get_template_directory()."/inc/templates/");
define("THEME_CLASSES_DIR",get_template_directory()."/inc/src/class/");
define("THEME_ASSETS_DIR",get_template_directory()."/assets/");
define("THEME_ASSETS_URI",get_template_directory_uri()."/assets/");


require "helpers.php";