<?php 
namespace Divalesi\Promotions;

class Simple implements Interfaces\Discount
{
    private $discount;
    private $type;

    public function __construct($discount_value,$type = "PERCENT")
    {
        $this->discount = $discount_value;
        $this->type = $type;
    }

    public function calculate($regular_price)
    {
        if($this->type !== "PERCENT"){
            return $regular_price - $this->discount;
        }

        return $regular_price * ((100 - $this->discount)/100);
    }

    public function get()
    {
        return $this->discount;
    }
}