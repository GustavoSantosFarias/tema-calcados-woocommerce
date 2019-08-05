<?php

namespace Divalesi\Promotions;

use \WP_Query;
use \WC_Product_Variable;

class Promotions {
    private $args;
    private $rules;

    public function __construct(ParseCsv $rules){
        $this->rules = $rules->data();
    }

    public function run(){
        foreach ($this->rules as $discount => $rule) {
            $this->setArgs($rule);
        
            $loop = new WP_Query($this->args);

            while($loop->have_posts()){
                $loop->the_post();
                global $product;

                $variations = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
            
                foreach ($variations as $variation) {
                    $promotion_price = $variation["display_regular_price"] * ((100 - $discount)/100);

                    update_post_meta($variation["variation_id"], '_sale_price', $promotion_price);
                    wc_delete_product_transients($variation["variation_id"]);
                }
            
                wc_delete_product_transients(get_the_ID());
            }
        }
    }

    private function setArgs(array $rule){
        $this->args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 120,
            'order'          => 'ASC',
            'post__in'       => '',
            'tax_query'      => array(
                'relation' => 'AND',
            )
        );

        foreach ($rule["categories"] as $category) {
            $tax_ = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category,
                'operator' => 'IN'
            );

            array_push($this->args['tax_query'],$tax_);
        }
    }

}