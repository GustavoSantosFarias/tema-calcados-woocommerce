<?php
namespace Divalesi\Promotions\Interfaces;

interface Discount{

    public function calculate($regular_price);

}