<?php
/**
 * Mediquip Plus functions and definitions
 *
 * @package Mediquip Plus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'mediquip_plus_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function mediquip_plus_setup() {
	global $content_width;   
	if ( ! isset( $content_width ) )
		$content_width = 680; 

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mediquip-plus' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // mediquip_plus_setup
add_action( 'after_setup_theme', 'mediquip_plus_setup' );

function mediquip_plus_widgets_init() {
	register_sidebar( array( 
		'name'          => __( 'Blog Sidebar', 'mediquip-plus' ),
		'description'   => __( 'Appears on blog page sidebar', 'mediquip-plus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'mediquip_plus_widgets_init' );

function mediquip_plus_add_google_fonts() {
	wp_enqueue_style( 'mediquip-plus-google-fonts', 'https://fonts.googleapis.com/css?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900|Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'mediquip_plus_add_google_fonts' );

function mediquip_plus_scripts() {	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'mediquip-plus-style', get_stylesheet_uri() );	
	wp_style_add_data('mediquip-plus-style', 'rtl', 'replace');
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'mediquip-plus-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'mediquip-plus-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'mediquip-plus-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_script( 'jquery.superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mediquip_plus_scripts' );

// Footer Link
define('MEDIQUIP_PLUS_FOOTER_LINK',__('https://www.theclassictemplates.com/themes/free-mediquip-plus-wordpress-template/','mediquip-plus'));

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * PRO Button Link
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/button-link/class-button-link.php' );

if ( ! function_exists( 'mediquip_plus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function mediquip_plus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

$woocommerce_sidebar = get_theme_mod( 'mediquip_plus_woocommerce_sidebar_product' );
	if ( 'false' == $woocommerce_sidebar ) {
$woo_product_column = 'col-lg-12 col-md-12';
	} else { 
$woo_product_column = 'col-lg-9 col-md-9';
}

$woocommerce_shop_sidebar = get_theme_mod( 'mediquip_plus_woocommerce_sidebar_shop' );
	if ( 'false' == $woocommerce_shop_sidebar ) {
$woo_shop_column = 'col-lg-12 col-md-12';
	} else { 
$woo_shop_column = 'col-lg-9 col-md-9';
}