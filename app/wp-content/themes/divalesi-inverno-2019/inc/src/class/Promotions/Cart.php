<?php

namespace Divalesi\Promotions;

use \Interfaces;

class Cart implements Discount,Progressive{
    private $cart_amount;
    private $rules;

    public function __construct(){}
    public function amount(){}
    public function calculate(){}
}