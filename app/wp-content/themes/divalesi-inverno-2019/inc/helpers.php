<?php

function filterUrl(string $filter){
    $path = site_url().preg_replace("/(\?.+)/","",$_SERVER['REQUEST_URI'])."?tamanho=".$filter;

    return $path;
}

if (!function_exists('assetsVersion')) {

    function assetsVersion($asset_path) {
        $path = pathinfo($asset_path);
        $ver = filemtime($asset_path);
        
        return $path['dirname'].'/'.$path['basename']."?v=".$ver;
    }

}