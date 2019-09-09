<?php 
namespace Divalesi\Promotions;

class Args{
    private $rule;
    private $args;

    public function __construct($rule){
        $this->rule = $rule;
    }

    /**
     ** Set the rules to fetching products that will on promotion
     * @return array - set the args attribute with the promotion rule
     */
    public function set(){
        $this->args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 120,
            'order'          => 'ASC',
            'post__in'       => '',
            'tax_query'      => array(
                'relation' => 'AND',
            )
        );

        foreach ($this->rule["categories"] as $category) {
            $tax_ = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category,
                'operator' => 'IN'
            );

            array_push($this->args['tax_query'],$tax_);
        }
    }

    public function get(){
        return $this->args;
    }
}