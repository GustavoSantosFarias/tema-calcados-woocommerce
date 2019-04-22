<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Banners Home.
	 */

	$labels = array(
		"name" => __( "Banners Home", "" ),
		"singular_name" => __( "Banner", "" ),
		"menu_name" => __( "Banner", "" ),
		"all_items" => __( "Todos os banners", "" ),
		"add_new" => __( "Adicionar Novo", "" ),
		"add_new_item" => __( "Adicionar Novo Banner", "" ),
		"edit_item" => __( "Editar Banner", "" ),
		"new_item" => __( "Novo Banner", "" ),
		"view_item" => __( "Visualizar Banner", "" ),
		"view_items" => __( "Visualizar Banners", "" ),
		"parent_item_colon" => __( "Procurar Banner", "" ),
		"parent_item_colon" => __( "Procurar Banner", "" ),
	);

	$args = array(
		"label" => __( "Banners Home", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "banners_home", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields", "post-formats" ),
	);

	register_post_type( "banners_home", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



add_action( 'invento_carousel', 'invento_carousel_content' );
function invento_carousel_content() {
   require_once(SRI_DIRETORIO_ABSOLUTO_DO_PLUGIN.'templates/invento-carousel-template.php');
}	




