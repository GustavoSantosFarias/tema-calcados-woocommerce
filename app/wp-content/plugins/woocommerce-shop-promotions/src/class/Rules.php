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
            if(is_array($this->setup["categories"])){

                foreach ($this->setup["categories"] as $category) {
                    $category_query = array(
                        'taxonomy'      => 'product_cat',
                        'field'         => 'slug',
                        'terms'         => $category,
                        'operator'      => 'IN'
                    );

                    array_push($tax_query,$category_query);
                }

            }else{
                $tax_query = array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field'         => 'slug',
                        'terms'         => $this->setup["categories"],
                        'operator'      => 'IN'
                    )
                );
            }
        
        }

        echo "<pre>";
        print_r($tax_query);

        $this->args = array(
            'post_type'   => 'product',
            'post_status' => 'publish',
            'orderby'     => 'title',
            'posts_per_page' => 100,
            'tax_query'   => $tax_query,
            'order'       => 'ASC',
        );
    }

    public function getArgs(){
        return $this->args;
    }

    public function set(int $id, string $meta_key, $price){
        $promotion_price = ($this->setup["discount_type"] == "percent") ? ($price - (($this->setup["discount"] * $price) / 100)) : $price -  $this->setup["discount"];
        update_post_meta($id, '_sale_price', $promotion_price);
    }
}