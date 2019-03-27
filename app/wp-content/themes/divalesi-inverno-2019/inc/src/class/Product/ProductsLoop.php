<?php

namespace Divalesi\Product;

use \WP_Query;
use \WC_Product_Variable;
use Divalesi\Loop;

class ProductsLoop extends Loop{

    private $data = array();

    public function __construct(string $path_template = ""){
        parent::__construct($path_template);
    }

    /**
     * Get products with regular price, sale price, main image and first gallery image.
     * If the @param filters isn't empty, the products that will be filtered by it value. Otherwise,
     * all products will showed in shop page.  
     * If the @param products_per_page isn't -1, it will define the products quantity get from database in each pagination page.
     * 
     * @param products_per_page products quantity get from database in each pagination page.
     * @param filters define the products that will be filtered by it value.
     * 
     * @return products template.
     */
    public function loop(int $products_per_page = -1,string $filter = ""){

        if (isset($_GET["categoria"]) && is_shop()) {
            $tax_query = array(
                array(
                    'taxonomy'      => 'product_cat',
                    'field'         => 'slug',
                    'terms'         => $_GET["categoria"],
                    'operator'      => 'IN' 
                )
            );
        }

        if($filter == "featured"){
            $tax_query = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                )
            );
        }

        $args = array(
            'post_type'      => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $products_per_page,
            'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
            'tax_query' => isset($tax_query) ? $tax_query : array(),
            'meta_query' => array(
                array(
                    'key'     => '_product_attributes',
                    'compare' => 'LIKE',
                ),
            ),
            'post__in' => ''
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while($query->have_posts()){
                $query->the_post();
                global $product;

                $variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
                $gallery_image_id = $product->get_gallery_attachment_ids();

                $this->data["title"] = $product->get_title();
                $this->data["regular_price"] = $variation[0]["display_regular_price"];
                $this->data["sale_price"] = $variation[0]["display_price"];
                $this->data["image"] = get_the_post_thumbnail_url();
                $this->data["gallery_image"] = wp_get_attachment_image_src($gallery_image_id[0],'full')[0];
                $this->data["link"] = $product->get_permalink();

                extract($this->data);

                include $this->template;
            }
        }
    }

}