<?php
namespace Divalesi\Promotions;

use \WP_Query;
use \WC_Product_Variable;

class Loop
{
    use Traits\Debug;

    private $args;
    private $discount;

    public function __construct(Args $args, Interfaces\Discount $discount){
        $this->args = $args;
        $this->discount = $discount;
    }

    /**
     * 
     * * Run all promotions that were define in promotions CSV 
     * 
     */
    public function run(){
        $this->args->set();
    
        $loop = new WP_Query($this->args->get());

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
                    $this->formated($variation,$this->discount->get());

                    continue;
                }

                $promotion_price = $this->discount->calculate($variation["display_regular_price"]);

                update_post_meta($variation["variation_id"], '_sale_price', $promotion_price);
                wc_delete_product_transients($variation["variation_id"]);
            }

            wc_delete_product_transients(get_the_ID());

            $this->formated($variation,$this->discount->get());
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