<?php 

/* Cars listing*/

function post_type_cars() {
register_post_type(
                    'cars', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/car.png',
                    		'labels'=>array(
    									'name' => _x('Cars', 'post type general name'),
    									'singular_name' => _x('Car', 'post type singular name'),
    									'add_new' => _x('Add New', 'car'),
    									'add_new_item' => __('Add New Car'),
    									'edit_item' => __('Edit Car'),
    									'new_item' => __('New Car'),
    									'view_item' => __('View Car'),
    									'search_items' => __('Search Cars'),
    									'not_found' =>  __('No Cars found'),
    									'not_found_in_trash' => __('No Car found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => true,
							'rewrite' => array( 'slug' => 'car', 'with_front' => FALSE,),
							'register_meta_box_cb' => 'mytheme_add_box',
							'supports' => array(
							 			'title',
										'thumbnail',
										'custom-fields',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_cars');



/* Price range taxonomy */

function create_car_price_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Price range', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Price range', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Price ranges' ),
   							  'all_items' => __( 'All Price ranges' ),
    						  'parent_item' => __( 'Parent Price range' ),
   					   		  'parent_item_colon' => __( 'Parent Price range:' ),
   							  'edit_item' => __( 'Edit Price range' ), 
  							  'update_item' => __( 'Update Price range' ),
  							  'add_new_item' => __( 'Add New Price range' ),
  							  'new_item_name' => __( 'New Price range Name' ),
); 	
register_taxonomy('car_price',array('cars'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'price-range' ),
  ));
}

/* Model Year Taxonomy */

function create_model_year_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Year', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Year', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Year' ),
   							  'all_items' => __( 'All Year' ),
    						  'parent_item' => __( 'Parent Year' ),
   					   		  'parent_item_colon' => __( 'Parent Year:' ),
   							  'edit_item' => __( 'Edit Year' ), 
  							  'update_item' => __( 'Update Year' ),
  							  'add_new_item' => __( 'Add New Year' ),
  							  'new_item_name' => __( 'New Year' ),
); 	
register_taxonomy('model_year',array('cars'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'year' ),
  ));

}

/* Car Condition Taxonomy */

function create_condition_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Condition', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Condition', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Condition' ),
   							  'all_items' => __( 'All Conditions' ),
    						  'parent_item' => __( 'Parent Condition' ),
   					   		  'parent_item_colon' => __( 'Parent Condition' ),
   							  'edit_item' => __( 'Edit Condition' ), 
  							  'update_item' => __( 'Update Condition' ),
  							  'add_new_item' => __( 'Add Condition' ),
  							  'new_item_name' => __( 'New Condition' ),
); 	
register_taxonomy('condition',array('cars'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => 'radio',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'condition' ),
  ));

}

/* Make Taxonomy */

function create_make_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Make', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Make', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Makes' ),
   							  'all_items' => __( 'All Makes' ),
    						  'parent_item' => __( 'Parent Make' ),
   					   		  'parent_item_colon' => __( 'Parent Make' ),
   							  'edit_item' => __( 'Edit Make' ), 
  							  'update_item' => __( 'Update Make' ),
  							  'add_new_item' => __( 'Add Make' ),
  							  'new_item_name' => __( 'New Make' ),
); 	
register_taxonomy('make',array('cars'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'make' ),
  ));

}


/* Body type Taxonomy */

function create_body_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Body type', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Body type', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Body types' ),
   							  'all_items' => __( 'All Body types' ),
    						  'parent_item' => __( 'Parent Body types' ),
   					   		  'parent_item_colon' => __( 'Parent Body type' ),
   							  'edit_item' => __( 'Edit Body type' ), 
  							  'update_item' => __( 'Update Body type' ),
  							  'add_new_item' => __( 'Add Body type' ),
  							  'new_item_name' => __( 'New Body type' ),
); 	
register_taxonomy('body',array('cars'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'body-type' ),
  ));

}

add_action( 'init', 'create_car_price_taxonomy', 0 );
add_action( 'init', 'create_model_year_taxonomy', 0 );
add_action( 'init', 'create_condition_taxonomy', 0 );
add_action( 'init', 'create_make_taxonomy', 0 );
add_action( 'init', 'create_body_taxonomy', 0 );

 /* PRE-DEFINE TERMS */

 ##New##
 function add_custom_term_new() {
 if(!is_term('New', 'condition')){
   wp_insert_term('New', 'condition');
 }
 }

 ##Used#
 function add_custom_term_old() {
 if(!is_term('Used', 'condition')){
   wp_insert_term('Used', 'condition');
 }
 }

 add_action( 'init', 'add_custom_term_new' );
 add_action( 'init', 'add_custom_term_old' );

?>