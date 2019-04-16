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

if (!function_exists('assetsVersion')) {

    function assetsVersion($asset_path) {
        $path = pathinfo($asset_path);
        $ver = filemtime($asset_path);
        
        return $path['dirname'].'/'.$path['basename']."?v=".$ver;
    }

}