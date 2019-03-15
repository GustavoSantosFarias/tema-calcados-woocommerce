<?php

namespace Divalesi;

class ProductsLoop extends Divalesi\Loop{

    private $data = array();

    public function __construct(string $path_template){
        parent::__construct($path_template);
    }

    public function getProductsFeatureds(){
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 7,
            'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while($query->have_posts()){
                global $product;
                $query->the_post();

                $variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
                $gallery_image_id = $product->get_gallery_attachment_ids();

                $data["regular_price"] = $variation[0]["display_regular_price"];
                $data["sale_price"] = $variation[0]["display_price"];
                $data["image"] = get_the_post_thumbnail_url();
                $data["gallery_image"] = wp_get_attachment_image_src($gallery_image_id[0],'full')[0];

                include $this->template;
            }
        }
    }

    public function getProducts(string $filter){

    }

}