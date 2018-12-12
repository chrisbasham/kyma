<?php
add_image_size('press-img', 120, 120, true); //press images
add_image_size('product-main-img', 400, 400, true); //product main images

add_filter( 'rwmb_meta_boxes', 'nit_register_meta_boxes' );

function nit_register_meta_boxes( $meta_boxes ){

	$prefix = 'nit_';
	
	$meta_boxes[] = array(
		
		'id'         => 'standard',
		
		'title'      => __( 'Page Subtitle', 'divi' ),
		
		'post_types' => array( 'page'),
		
		'context'    => 'normal',
		
		'priority'   => 'high',
		
		'autosave'   => true,
		
		'fields'     => array(
			
			array(
			
				'name'  => esc_html__( 'Page Subtitle', 'divi' ),
				
				'id'    => "{$prefix}subtitle",
				
				'desc'  => esc_html__( '', 'divi' ),
				
				'type'  => 'text',
				
				'std'   => esc_html__( '', 'divi' ),
				
				'clone' => false,
			),		
			
			)
	);
	
	
	$meta_boxes[] = array(
		
		'id'         => 'standard',
		
		'title'      => __( 'Press Fields', 'divi' ),
		
		'post_types' => array( 'pres'),
		
		'context'    => 'normal',
		
		'priority'   => 'high',
		
		'autosave'   => true,
		
		'fields'     => array(
			
			array(
			
				'name'  => esc_html__( 'Press Link', 'divi' ),
				
				'id'    => "{$prefix}link",
				
				'desc'  => esc_html__( '', 'divi' ),
				
				'type'  => 'text',
				
				'std'   => esc_html__( '', 'divi' ),
				
				'clone' => false,
			),		
			
			)
	);
	
	return $meta_boxes;
}