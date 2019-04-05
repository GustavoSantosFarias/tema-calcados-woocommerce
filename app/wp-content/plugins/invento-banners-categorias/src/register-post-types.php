<?php

add_action('product_cat_add_form_fields', 'product_category_add_new_field', 10, 1);
add_action('product_cat_edit_form_fields', 'product_category_edit_field', 10, 1);
add_action('edited_product_cat', 'product_category_save', 10, 1);
add_action('create_product_cat', 'product_category_save', 10, 1);

add_filter( 'manage_edit-product_cat_columns', 'list_banner_category' );
add_action( 'manage_product_cat_custom_column', 'list_banner_category_display' , 10, 3);

function product_category_add_new_field(){

?>  
  <div class="form-field">
      <label for="category-banner"><?php _e("Banner Categoria", "category-banner") ?></label>
      <input type="hidden" name="category-banner" id="category-banner">
      <a href="#" class="category-banner-button">Upload Banner</a>
	</div>
<?php
}

function product_category_edit_field($term) {

  $term_id = $term->term_id;
  $thumbnail_id = get_woocommerce_term_meta( $term_id, 'category-banner', true );
	$image = wp_get_attachment_url( $thumbnail_id );

	$product_category_banner = get_term_meta($term_id, 'category-banner', true);
?>  
      <tr class="form-field">
        <th scope="row" valign="top"><label for="category-banner"><?php _e("Banner Categoria", "category-banner") ?></label></th>
        <td>
          <div>
            <?php echo ($image) ? '<img class="img-banner-category" src="'. $image . '" alt="">' : '<img class="img-banner-category" src="'. site_url() . '/wp-content/plugins/invento-banners-categorias/assets/img/photo-icon.png" alt="">'?>
            <input type="hidden" name="category-banner" id="category-banner" value="<?php echo esc_attr($product_category_banner) ? esc_attr($product_category_banner) : '' ?>">
            <a href="#" class="category-banner-button">Upload Banner</a>
          </div>
        </td>
			</tr>	
<?php
}

function product_category_save($term_id) {
  $product_category_banner = filter_input(INPUT_POST, 'category-banner');
  update_term_meta($term_id, 'category-banner', $product_category_banner);
}

function list_banner_category( $columns ) {
    $columns['pro_banner_category'] = __( 'Banner Categoria', 'woocommerce' );
    return $columns;
}

function list_banner_category_display( $columns, $column, $id ) {
    $columns = esc_html( get_term_meta($id, 'category-banner', true) );
    return $columns;
}


add_action( 'invento_banner_categoria', 'invento_banner_categoria_content' );
function invento_banner_categoria_content() {
   require_once(PLUGIN_DIRECTORY.'templates/invento-banners-categorias-template.php');
}