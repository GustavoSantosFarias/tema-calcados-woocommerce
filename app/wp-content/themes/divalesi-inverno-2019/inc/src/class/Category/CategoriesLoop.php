<?php

namespace Divalesi\Category;

use Divalesi\AbstractLoop;

class CategoriesLoop extends AbstractLoop{

    private $terms;
    private $data = array();
    private static $instance = null;

    public function __construct(string $path_template = ""){
        parent::__construct($path_template);

        $args = array(
            'number' => 8,
            'post_type' => 'product',
            'post_status' => 'publish'
        );

        $this->terms = get_terms( 'product_cat', $args );
    }

    public function loop(){
        foreach ($this->terms as $category) {
            $category_id_image = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true );

            $this->data["category_image"] = wp_get_attachment_image_url($category_id_image,"full"); 
            $this->data["category_name"] = $category->name;
            $this->data["category_link"] = site_url()."/calcaldos/".$category->slug;
            
            extract($this->data);

            include $this->template;
        }
    }

    public static function instance($template = ""){
        if(self::$instance == null){
            self::$instance = new CategoriesLoop($template);
        }

        return self::$instance;
    }
}