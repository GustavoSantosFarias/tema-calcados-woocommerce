<?php

function filterUrl(string $filter){
    $path = site_url().preg_replace("/(\?.+)/","",$_SERVER['REQUEST_URI'])."?tamanho=".$filter;

    return $path;
}

function divalesi_header_menu(){
    $args = array(
        'menu'            => 'header-menu',
        'menu_id'         => 'menu-items',
        'menu_class'      => 'header-menu',
        'container'       => 'nav',
        'container_class' => 'menu-container'
    );

    wp_nav_menu($args);
}

if (!function_exists("assetsVersion")) {
    function assetsVersion($asset_path) {
        $path = pathinfo($asset_path);
        $ver = filemtime($asset_path);
    
        return THEME_ASSETS_URI . $path["extension"] . "/" . $path["basename"] . "?v=" . $ver;
    }
}

if (!function_exists("myAccountLink")) {
    function myAccountLink() {
        if ( is_user_logged_in() ) : ?>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
        <?php else : ?>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
        <?php endif;
    }
}