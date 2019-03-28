<?php

namespace Divalesi\Filter;

class Filter {

    private static $instance = null;
    private $filters = array();
    private $variations;

    public function set(array $variations){
        $this->variations = $variations;

        foreach ($this->variations as $variation) {
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

    public function by(){
        foreach ($this->variations as $variation) {
            if($_GET["tamanho"] == $variation["attributes"]["attribute_pa_tamanho"] && $variation["is_in_stock"] == true){
                return true;
            }
        }
    }

}