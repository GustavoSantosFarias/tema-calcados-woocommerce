<?php

namespace Divalesi\Category;

use Divalesi\Loop;

class CategoriesLoop extends Loop{

    private $data = array();

    public function __construct(string $path_template){
        parent::__construct($path_template);
    }

    public function get(){
        $args = array(
            'post_type' => 'product'
        );

        $categories = get_terms( 'product_cat', $args );

        foreach ($categories as $category) {
            $category_id_image = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true );

            $this->data["category_image"] = wp_get_attachment_image_url($category_id_image,"full"); 
            $this->data["category_name"] = $category->name;
            $this->data["category_link"] = get_term_link( $category->term_id, 'product_cat' );;
            
            extract($this->data);

            include $this->template;
        }
    }
}