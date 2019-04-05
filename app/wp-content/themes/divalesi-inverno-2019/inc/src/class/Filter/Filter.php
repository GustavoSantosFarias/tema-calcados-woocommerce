<?php

namespace Divalesi\Filter;

class Filter {

    private $variations;
    private static $instance = null;

    private $attributes = array(
        "cores" => array(),
        "tamanhos" => array()
    );

    public function set(array $variations){
        $this->variations = $variations;
        
        foreach ($this->variations as $variation) {
            if(!$variation["is_in_stock"]){
                continue;
            }

            if(!in_array($variation["attributes"]["attribute_pa_tamanho"],$this->attributes["tamanhos"])){
                array_push($this->attributes['tamanhos'],$variation["attributes"]["attribute_pa_tamanho"]);
            }
        }

        sort($this->attributes["tamanhos"]);
    }

    public function get(){
        return $this->attributes["tamanhos"];
    }

    public static function instance(){
        if(self::$instance == null){
            self::$instance = new Filter;
        }

        return self::$instance;
    }

    public function by(){
        foreach ($this->variations as $variation) {
            if($_GET["tamanho"] == $variation["attributes"]["attribute_pa_tamanho"] && $variation["is_in_stock"] == true){
                return true;
            }
        }
    }

}