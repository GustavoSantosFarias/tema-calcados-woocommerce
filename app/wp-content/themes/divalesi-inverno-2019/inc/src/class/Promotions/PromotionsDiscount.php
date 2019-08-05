<?php 
namespace Divalesi\Promotions;

class PromotionsDiscount {

    public static function calculate($regular_price,$discount_value, $discount_type = "PERCENT"){
        if($discount_type !== "PERCENT"){
            return $regular_price - $discount_value;
        }

        return $regular_price * ((100 - $discount_value)/100);
    }

}