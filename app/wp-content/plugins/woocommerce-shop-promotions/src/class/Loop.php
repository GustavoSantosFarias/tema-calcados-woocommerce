<?php

namespace WoocommercePromotions;

use \WP_Query;
use \WC_Product_Variable;

class Loop{
    private $rules;
    
    public function __construct(Rules $rules){
        $this->rules = $rules;
    }

    public function run(){
        $query = new WP_Query($this->rules->getArgs());
        
        if ($query->have_posts()) {
            while($query->have_posts()){
                $query->the_post();
                global $product;

                $variations = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());

                foreach ($variations as $variation) {
                    $this->rules->set($variation["variation_id"],"_price",$product->get_price());
                    wc_delete_product_transients($variation["variation_id"]);
                }

                wc_delete_product_transients(get_the_ID());
            }
        }
    }
}