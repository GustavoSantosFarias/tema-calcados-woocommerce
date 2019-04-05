<?php
// Plugin Name: Invento Banners Categorias
// Description: Plugin para inserir banners para categorias de posts
// Author: Inventocc
// Version: 1.0 Beta
// Author URI: http://minhaloja.inventocc.com

define('PLUGIN_DIRECTORY',plugin_dir_path(__FILE__));

require PLUGIN_DIRECTORY . "src/register-post-types.php";

add_action("admin_init","invento_banners_categorias_scripts");
function invento_banners_categorias_scripts() {
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
    wp_enqueue_script('invento_banner_categorias', plugin_dir_url( __FILE__ )  . 'assets/js/script.js', true);
}

add_action("admin_init","invento_banners_categorias_styles");
function invento_banners_categorias_styles(){
    wp_enqueue_style('style', plugin_dir_url( __FILE__ ) . '/assets/css/style.css');
}

