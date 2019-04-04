<?php

function filterUrl($filter){
    $path = site_url().preg_replace("/(\?.+)/","",$_SERVER['REQUEST_URI'])."?tamanho=".$filter;

    return $path;
}