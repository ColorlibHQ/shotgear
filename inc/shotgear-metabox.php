<?php
function shotgear_portfolio_metabox( $meta_boxes ) {

	$shotgear_prefix = '_shotgear_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'shotgear' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $shotgear_prefix . 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'shotgear' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $shotgear_prefix . 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'shotgear' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => $shotgear_prefix . 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'shotgear' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $shotgear_prefix . 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'shotgear' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $shotgear_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'shotgear' ),
				'placeholder' => esc_html__( 'Project Location', 'shotgear' ),
			),
			array(
				'id'    => $shotgear_prefix . 'project_iner_img',
				'type'  => 'image_advanced',
				'max_file_uploads'	=> 1,
				'max_status'	=> false,
				'max_file_size'	=> '500kb',
				'name'  => esc_html__( 'Project Iner Image', 'shotgear' ),
				'placeholder' => esc_html__( 'Project Iner Image', 'shotgear' ),
			),
			array(
				'id'    => $shotgear_prefix . 'client_brief',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Client Brief', 'shotgear' ),
				'placeholder' => esc_html__( 'Client Brief', 'shotgear' ),
			),
			array(
				'id'    => $shotgear_prefix . 'working_process',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Working Process', 'shotgear' ),
				'placeholder' => esc_html__( 'Working Process', 'shotgear' ),
			),
			array(
				'name'    => esc_html__( 'Project Image Size', 'shotgear' ),
				'id'      => 'portfolio_img_size',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Image Size [458x650]',
					'2' => 'Image Size [677x650]',
					'3' => 'Image Size [776x650]',
				),
				'inline' => true,
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'shotgear_portfolio_metabox' );