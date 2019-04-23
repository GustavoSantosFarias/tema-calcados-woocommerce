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

function inInstallmentPrice($price){
    return wc_price($price / 6);
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
            <a class="link-login-register" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Minha Conta"><i class="far fa-user-circle"></i> Olá <span><?= wp_get_current_user()->display_name ?></span></a>
            <a class="d-sm-none logout-link" href="<?= wp_logout_url(get_permalink(woocommerce_get_page_id('myaccount')))?>"><i class="far fa-times-circle"></i></a>
        <?php else : ?>
            <a class="link-login-register" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="far fa-user-circle"></i> <?php _e('Login / Register','woothemes'); ?></a>
        <?php endif;
    }
}