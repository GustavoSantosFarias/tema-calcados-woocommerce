<?php 
		
// Plugin Name: Invento Carousel
// Description: Plugin Para criação de carousel
// Author: Inventocc
// Version: 1.0 Beta
// Author URI: http://minhaloja.inventocc.com

if(!defined('ABSPATH')){
	exit("Acesso negado");
}

//Definição da constante do diretorio absoluto

define('SRI_DIRETORIO_ABSOLUTO_DO_PLUGIN',plugin_dir_path(__FILE__));

require_once(SRI_DIRETORIO_ABSOLUTO_DO_PLUGIN.'includes/invento-carousel-post-type.php');



add_action( 'wp_enqueue_scripts', 'invento_booking_styles' );
function invento_booking_scripts() {
	
    wp_enqueue_script('jquery', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.min.js', array(), '1.0', false);
    wp_enqueue_script('slick', plugin_dir_url( __FILE__ ) . 'assets/js/slick.min.js', array(), '1.0', false);
    wp_enqueue_script('invento-carousel', plugin_dir_url( __FILE__ ) . 'assets/js/invento-carousel.js', array(), '1.0', false);
}
add_action('wp_enqueue_scripts', 'invento_booking_scripts');

function invento_booking_styles() {
	wp_enqueue_style( 'slick-theme', plugin_dir_url( __FILE__ ) . 'assets/css/slick-theme.css');
    wp_enqueue_style( 'invento-carousel', plugin_dir_url( __FILE__ ) . 'assets/css/invento-carousel.css');
}
	

	






