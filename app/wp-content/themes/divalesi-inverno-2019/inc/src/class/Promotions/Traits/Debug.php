<?php
namespace Divalesi\Promotions\Traits;

trait Debug
{
    public function formated($variation,$discount){
        echo "<pre>";
        echo "product: " . $variation['sku'] . "</br>";

        if(get_post_meta($variation['variation_id'], '_sale_price', true) !== ""){
            echo "R$" . $variation["display_regular_price"] . " => " . "R$" . get_post_meta($variation['variation_id'], '_sale_price', true) . " (-".$discount."%)" .  "</br>";
        }else{
            echo "R$" . $variation["display_regular_price"] . " => sem promoção";
        }
        
        echo "</br></br></br></br>";
        echo "</pre>";
    }
}
