<?php
declare(strict_types=1);

namespace Divalesi\Product; 

require getcwd()."/wp-content/themes/divalesi-inverno-2019/inc/autoload.php";

use Divalesi\Product\ProductsLoop;
use \PHPUnit\Framework\TestCase;

class ProductsLoopTest extends TestCase{
    
    public function testProductPriceIsDouble(){
        $product = new ProductsLoop;    

        $actual = gettype($product->price());
        $expected = "double";

        $this->assertEquals($expected,$actual);
    }

}