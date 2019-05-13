<?php
namespace WoocommercePromotions;

use WoocommercePromotions\Rules;

class Cart extends Rules{
    public function __construct($config){
        parent::__construct($config);
    }

    private function setPrice($price, $cart_item, $cart_item_key){
        print_r($cart_item);
    }

    public function run(){
        echo 1;
        die;
        // add_filter( 'woocommerce_cart_item_price', array( $this, 'setPrice' ), 10, 3 );
    }
}

