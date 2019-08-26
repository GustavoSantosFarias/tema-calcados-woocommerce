<?php

namespace Divalesi\Promotions;

use \WP_Query;
use \WC_Product_Variable;

class Promotion 
{
    use Traits\Debug;

    private $args;
    private $rules;

    public function __construct(ParseCsv $rules){
        $this->rules = $rules->data();
    }

    /**
     * 
     * * Run all promotions that were define in promotions CSV 
     * 
     */
    public function run(){
        foreach ($this->rules as $discount => $rule) {
            $this->setArgs($rule);
        
            $loop = new WP_Query($this->args);

            while($loop->have_posts()){
                $loop->the_post();
                global $product;

                $variations = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
            
                foreach ($variations as $variation) {

                    /**
                     * * Check the GET variable in URI to reset only the promotions defined in promotions CSV
                     */
                    if(isset($_GET["reset"])){
                        $this->reset($variation["variation_id"]);
                        $this->formated($variation,$discount);

                        continue;
                    }

                    $promotion_price = PromotionDiscount::calculate($variation["display_regular_price"],$discount,$rule["type"][0]);

                    update_post_meta($variation["variation_id"], '_sale_price', $promotion_price);
                    wc_delete_product_transients($variation["variation_id"]);
                }

                wc_delete_product_transients(get_the_ID());

                $this->formated($variation,$discount);
            }
        }
    }

    /**
     ** Set the rules to fetching products that will on promotion
     * @param array $rule - The rule line defined in promotions CSV
     * @return array - set the args attribute with the promotion rule
     */
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

    /**
     ** Reset the variation sale price to 'empty'
     * @param string $variation_id - variation id to reset it sale price 
     */
    private function reset($variation_id){
        update_post_meta($variation_id, '_sale_price', '');
        wc_delete_product_transients($variation_id);
    }
}