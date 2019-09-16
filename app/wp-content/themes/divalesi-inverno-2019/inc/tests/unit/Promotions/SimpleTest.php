<?php
declare(strict_types=1);

namespace Divalesi\Promotions; 

use Divalesi\Promotions\Simple;
use \PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testPromotionPercentPriceIsDouble()
    {
        $promotion = new Simple(30,'PERCENT');    

        $actual = gettype($promotion->calculate(239.90));
        $expected = "double";

        $this->assertEquals($expected,$actual);
    }

    public function testPromotionStaticPriceIsDouble()
    {
        $promotion = new Simple(30,'VALUE');    

        $actual = gettype($promotion->calculate(239.90));
        $expected = "double";

        $this->assertEquals($expected,$actual);
    }

    public function testPromotionStaticPriceCalculate()
    {
        $promotion = new Simple(30,'VALUE');    

        $actual = $promotion->calculate(239.90);
        $expected = 239.90 - 30;

        $this->assertEquals($expected,$actual);
    }

    public function testPromotionPercentPriceCalculate()
    {
        $promotion = new Simple(30,'PERCENT');    

        $actual = $promotion->calculate(239.90);
        $expected = 239.90 * (1 - (30 / 100));

        $this->assertEquals($expected,$actual);
    }

    public function testPromotionDefaultType()
    {   
        $promotion = new Simple(70);
        
        $actual = $promotion->calculate(239.90);    
        $expected = 239.90 * (1 - (70 / 100));

        $this->assertEquals($expected,$actual);
    }
}