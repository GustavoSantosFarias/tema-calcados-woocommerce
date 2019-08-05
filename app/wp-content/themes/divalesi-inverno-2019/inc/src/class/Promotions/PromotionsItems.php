<?php 
namespace Divalesi\Promotions;

use Divalesi\Promotions;

class PromotionsItems {

    private $data;
    private $items;

    public function __construct(ParseCsv $data){
        $this->data = $data;
    }

    public function get(){

    }
}