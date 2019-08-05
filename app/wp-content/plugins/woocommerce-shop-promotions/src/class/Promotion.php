<?php
namespace WoocommercePromotions;

use WoocommercePromotions\Rules;
use \WP_Query;
use \WC_Product_Variable;

class Promotion extends Rules{
    public function __construct($config){
        parent::__construct($config);
        parent::parseArgs();
    }

    public function run(){
        $query = new WP_Query(parent::getArgs());

        if ($query->have_posts()) {
            while($query->have_posts()){
                $query->the_post();
                global $product;

                $variations = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());

                foreach ($variations as $variation) {
                    if(empty($product->get_regular_price())){
                        $price = $product->get_price();
                    }else{
                        $price = $product->get_regular_price();
                    }

                    $this->setDiscount($variation["variation_id"],$price);
                    wc_delete_product_transients($variation["variation_id"]);
                }

                wc_delete_product_transients(get_the_ID());
            }
        }
    }

    private function setDiscount($id, $price){
        $promotion_price = ($this->discount_type == "percent") ? ($price - (($this->discount * $price) / 100)) : $price - $this->discount;
        update_post_meta($id, '_sale_price', $promotion_price);
    }

    public function reset($id){
        update_post_meta($id, '_sale_price', '');
    }
}