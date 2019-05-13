<?php

namespace WoocommercePromotions;

class Rules{
    protected $discount;
    protected $discount_type;
    protected $categories;
    protected $args;

    public function __construct($config){
        $this->discount_type = $config["discount_type"];
        $this->discount      = $config["discount"];
        $this->categories    = (isset($config["categories"])) ? $config["categories"] : false;
    }

    public function parseArgs(){
        $tax_query = array();

        if($this->categories !== false){

            $tax_query = array(
                array(
                    'taxonomy'      => 'product_cat',
                    'field'         => 'slug',
                    'terms'         => $this->categories,
                )
            );

            if(is_array($this->categories)){
                $tax_query = array(
                    "relation" => "OR",
                ); 

                foreach ($this->categories as $category) {
                    $query_category = array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category
                    );    

                    array_push($tax_query,$query_category);
                }
            }
        }

        $this->args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 120,
            'tax_query'      => $tax_query
        );
    }

    public function getArgs(){
        return $this->args;
    }
}