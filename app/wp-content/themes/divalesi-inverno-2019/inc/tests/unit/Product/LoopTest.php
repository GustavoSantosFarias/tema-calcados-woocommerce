<?php
declare(strict_types=1);

namespace Divalesi\Product; 

use Divalesi\Product\Loop;
use \PHPUnit\Framework\TestCase;

class LoopTest extends TestCase{
    
    public function testProductPriceIsDouble(){
        $product = new Loop;    

        $actual = gettype($product->price());
        $expected = "double";

        $this->assertEquals($expected,$actual);
    }

}