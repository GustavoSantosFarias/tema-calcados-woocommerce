<?php

namespace Divalesi\Filter;

class Filter {

    private static $instance = null;
    private $filters = array();

    public function set(array $variations){
        foreach ($variations as $variation) {
            if($variation["is_in_stock"] == true && !in_array($variation["attributes"]["attribute_pa_tamanho"],$this->filters)){
                array_push($this->filters,$variation["attributes"]["attribute_pa_tamanho"]);
            }
        }

        sort($this->filters);
    }

    public function get(){
        return $this->filters;
    }

    public static function instance(){
        if(self::$instance == null){
            self::$instance = new Filter;
        }

        return self::$instance;
    }

}