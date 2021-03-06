<?php

namespace Divalesi\Product;

use \WP_Query;
use \WC_Product_Variable;
use Divalesi\AbstractLoop;
use Divalesi\Filter\Filter;

class Loop extends AbstractLoop{

    private $data = array();
    private $filters;
    private $products_per_page;
    private $terms;

    /**
     * @param path_template path to template loop
     * @param products_per_page number of products per page. Is recommended always pass this parameter to make the products loop more fast.
     * @param terms feature products that you want filter in products loop
     * 
     * * Set products per page, terms and throw in filters attribute all available filters by singleton pattern
     */
    public function __construct(string $path_template = "",int $products_per_page = -1,string $terms = ""){
        parent::__construct($path_template);

        $this->products_per_page = $products_per_page;
        $this->terms = $terms;
        $this->filters = Filter::instance();
    }

    /**
     * Return the product loop template with products regular price, sale price, main image and first gallery image.
     * 
     * @return products template loop.
     */
    public function loop(){
        $query = new WP_Query($this->args());

        if ($query->have_posts()) {
            while($query->have_posts()){
                $query->the_post();
                global $product;

                $variation = (new WC_Product_Variable(get_the_ID()))->get_available_variations(get_the_ID());
                $gallery_image_id = $product->get_gallery_image_ids();

                //Verify max filters length to add new filter based on variation attribute, like p_size and pa_color.
                if(count($this->filters->get()) < 7){
                    $this->filters->set($variation);
                }

                //Verify if URI doesnt have filters paramns and the current product in the loop doesnt match with them.
                if (!empty($_GET) && !$this->filters->by()) {
                    continue;
                }

                $this->data["title"] = $product->get_title();
                $this->data["regular_price"] = $variation[0]["display_regular_price"];
                $this->data["price"] = $variation[0]["display_price"];
                $this->data["image"] = get_the_post_thumbnail_url();
                $this->data["gallery_image"] = wp_get_attachment_image_src($gallery_image_id[0],'full')[0];
                $this->data["link"] = $product->get_permalink();

                extract($this->data);
                
                include $this->template;
            }
        }
    }

    /**
     * Setup args array to products loop.
     * This method generate the args array based on class attributes for filter the products loop.
     * 
     * @return args array.
     */
    private function args(){
        if (is_product_category()) {
            global $wp_query;
            $category_slug = $wp_query->query_vars['product_cat'];

            $tax_query = array(
                array(
                    'taxonomy'      => 'product_cat',
                    'field'         => 'slug',
                    'terms'         => $category_slug,
                    'operator'      => 'IN' 
                )
            );
        }

        if($this->terms == "featured"){
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
            'post_status'    => 'publish',
            'posts_per_page' => $this->products_per_page,
            'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
            'tax_query'      => isset($tax_query) ? $tax_query : array(),
            'orderby'        => 'title',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => '_product_attributes',
                    'compare' => 'LIKE',
                ),
            ),
            'post__in'       => ''
        );

        return $args;
    }

}