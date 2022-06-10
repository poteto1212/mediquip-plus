<?php
/**
 * Mediquip Plus Theme Customizer
 *
 * @package Mediquip Plus
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mediquip_plus_customize_register( $wp_customize ) {

	function mediquip_plus_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function mediquip_plus_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting('mediquiq_plus_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'mediquiq_plus_title_enable', array(
	   'settings' => 'mediquiq_plus_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','mediquip-plus'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('mediquiq_plus_tagline_enable',array(
		'default' => true,
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'mediquiq_plus_tagline_enable', array(
	   'settings' => 'mediquiq_plus_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','mediquip-plus'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'mediquip_plus_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'mediquip-plus' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('mediquip_plus_site_layoutsec',array(
		'title'	=> __('Site Layout','mediquip-plus'),
		'priority'	=> 1,
		'panel' => 'mediquip_plus_panel_area',
	));
	
	$wp_customize->add_setting('mediquip_plus_box_layout',array(
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'mediquip_plus_box_layout', array(
	   'section'   => 'mediquip_plus_site_layoutsec',
	   'label'	=> __('Check to Box Layout','mediquip-plus'),
	   'type'      => 'checkbox'
 	));

 	//Header Section
	$wp_customize->add_section('mediquip_plus_header_info',array(
		'title'	=> __('Header Info','mediquip-plus'),
		'priority'	=> 1,
		'panel' => 'mediquip_plus_panel_area',
	));

	$wp_customize->add_setting('mediquip_plus_location_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_location_text', array(
	   'settings' => 'mediquip_plus_location_text',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Location Text', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_location',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_location', array(
	   'settings' => 'mediquip_plus_location',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Location', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_time_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_time_text', array(
	   'settings' => 'mediquip_plus_time_text',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Opening Time Text', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_time', array(
	   'settings' => 'mediquip_plus_time',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Opening Time', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_phone_number_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_phone_number_text', array(
	   'settings' => 'mediquip_plus_phone_number_text',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Phone Number Text', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'mediquip_plus_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_phone_number', array(
	   'settings' => 'mediquip_plus_phone_number',
	   'section'   => 'mediquip_plus_header_info',
	   'label' => __('Phone Number', 'mediquip-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('mediquip_plus_preloader',array(
		'default' => true,
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'mediquip_plus_preloader', array(
	   'section'   => 'mediquip_plus_header_info',
	   'label'	=> __('Check to Show preloader','mediquip-plus'),
	   'type'      => 'checkbox'
 	));

	// Home Category Dropdown Section
	$wp_customize->add_section('mediquip_plus_one_cols_section',array(
		'title'	=> __('Manage Slider','mediquip-plus'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1400 x 550).','mediquip-plus'),
		'priority'	=> null,
		'panel' => 'mediquip_plus_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'mediquip_plus_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Mediquip_Plus_Category_Dropdown_Custom_Control( $wp_customize, 'mediquip_plus_slidersection', array(
		'section' => 'mediquip_plus_one_cols_section',
		'settings'   => 'mediquip_plus_slidersection',
	) ) );

	$wp_customize->add_setting('mediquip_plus_button_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_button_text', array(
	   'settings' => 'mediquip_plus_button_text',
	   'section'   => 'mediquip_plus_one_cols_section',
	   'label' => __('Add Button Text', 'mediquip-plus'),
	   'type'      => 'text'
	));
	
	//Hide Section
	$wp_customize->add_setting('mediquip_plus_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'mediquip_plus_hide_categorysec', array(
	   'settings' => 'mediquip_plus_hide_categorysec',
	   'section'   => 'mediquip_plus_one_cols_section',
	   'label'     => __('Check To Enable This Section','mediquip-plus'),
	   'type'      => 'checkbox'
	));

	// Facilities Section
	$wp_customize->add_section('mediquip_plus_two_cols_section',array(
		'title'	=> __('Manage Facilities Section','mediquip-plus'),
		'description'	=> __('Select the post category to show hospital facilities.','mediquip-plus'),
		'priority'	=> null,
		'panel' => 'mediquip_plus_panel_area'
	));
	
	$wp_customize->add_setting('mediquip_plus_section_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'mediquip_plus_section_title', array(
	   'settings' => 'mediquip_plus_section_title',
	   'section'   => 'mediquip_plus_two_cols_section',
	   'label'     => __('Add Section Title','mediquip-plus'),
	   'type'      => 'text'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'mediquip_plus_facilities_section', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Mediquip_Plus_Category_Dropdown_Custom_Control( $wp_customize, 'mediquip_plus_facilities_section', array(
		'section' => 'mediquip_plus_two_cols_section',
		'settings'   => 'mediquip_plus_facilities_section',
	) ) );

	// Footer Section 
	$wp_customize->add_section('mediquip_plus_footer', array(
		'title'	=> __('Footer Section','mediquip-plus'),
		'priority'	=> null,
		'panel' => 'mediquip_plus_panel_area',
	));

	$wp_customize->add_setting('mediquip_plus_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'mediquip_plus_copyright_line', array(
	   'section' 	=> 'mediquip_plus_footer',
	   'label'	 	=> __('Copyright Line','mediquip-plus'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('mediquip_plus_woocommerce_sidebar_shop',array(
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'mediquip_plus_woocommerce_sidebar_shop', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from shop page.','mediquip-plus'),
	   'label'	=> __('Shop Page Sidebar layout','mediquip-plus'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('mediquip_plus_woocommerce_sidebar_product',array(
		'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'mediquip_plus_woocommerce_sidebar_product', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from product page.','mediquip-plus'),
	   'label'	=> __('Product Page Sidebar layout','mediquip-plus'),
	   'type'      => 'checkbox'
 	));
}
add_action( 'customize_register', 'mediquip_plus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mediquip_plus_customize_preview_js() {
	wp_enqueue_script( 'mediquip_plus_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'mediquip_plus_customize_preview_js' );