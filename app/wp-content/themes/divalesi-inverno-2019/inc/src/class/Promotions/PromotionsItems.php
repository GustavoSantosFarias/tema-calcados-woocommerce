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

    private function args(){
        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'tax_query'      => isset($tax_query) ? $tax_query : array(),
            'order'          => 'ASC',
            'post__in'       => ''
        );
        $tax_query = array();

        foreach ($this->data as $data) {
            
        }
    }
}