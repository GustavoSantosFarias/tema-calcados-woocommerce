<?php 

    if(is_product()){
        $terms = get_the_terms( $post->ID , 'product_cat');
        $category = $terms[0]->slug;
    }elseif($_GET['c'] !== NULL){
        $category = $_GET['c'];
    }else{
        $category = "todos";
    }

    $term = get_term_by("slug",$category,"product_cat");
    $term_meta = get_term_meta($term->term_id);
    $banner_page = get_post($term_meta['category-banner'][0]);

    $mime_types_allow = array(
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/gif"
    );

    if(in_array($banner_page->post_mime_type,$mime_types_allow)) :
?>

<div class="titulo-categoria half-grey-top">
    <div style="background-image:url('<?php echo $banner_page->guid; ?>')"></div>
</div>

<?php endif;