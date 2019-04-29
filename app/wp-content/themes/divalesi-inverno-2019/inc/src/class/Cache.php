<?php

namespace Divalesi;

class Cache{
    private $args;
    private $data;

    function __construct($args){
        $this->args = $args;
    }

    public function run(){
        $query = new WP_Query($this->args);

        if ($query->have_posts()) {
            while($query->have_posts()){
                $query->the_post();

                global $product;

                $variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
                $gallery_image_id = $product->get_gallery_image_ids();

                $this->data["title"] = $product->get_title();
                $this->data["regular_price"] = $variation[0]["display_regular_price"];
                $this->data["price"] = $variation[0]["display_price"];
                $this->data["image"] = get_the_post_thumbnail_url();
                $this->data["gallery_image"] = wp_get_attachment_image_src($gallery_image_id[0],'full')[0];
                $this->data["link"] = $product->get_permalink();

                print_r($this->data);
            }
        }
    } 
}