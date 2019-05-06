<?php

namespace WoocommercePromotions;

class Rules{
    private $setup;
    private $args;

    public function __construct(array $config){
        $this->setup = array(
            "categories"    => (isset($config["categories"])) ? $config["categories"] : false,
            "where_apply"   => (isset($config["where_apply"])) ? $config["where_apply"] : "shop",
            "discount_type" => $config["discount_type"],
            "discount"      => $config["discount"]
        );
    }

    public function parseArgs(){
        $tax_query = array();

        if($this->setup["categories"] !== false){

            $tax_query = array(
                array(
                    'taxonomy'      => 'product_cat',
                    'field'         => 'slug',
                    'terms'         => $this->setup["categories"],
                )
            );

            if(is_array($this->setup["categories"])){
                $tax_query = array(
                    "relation" => "OR",
                ); 

                foreach ($this->setup["categories"] as $category) {
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

    public function set(int $id, $price){
        $promotion_price = ($this->setup["discount_type"] == "percent") ? ($price - (($this->setup["discount"] * $price) / 100)) : $price -  $this->setup["discount"];
        update_post_meta($id, '_sale_price', $promotion_price);
    }

    public function reset(int $id){
        update_post_meta($id, '_sale_price', '');
    }
}