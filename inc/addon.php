<?php
/*
 * @package Mediquip Plus
 */

function mediquip_plus_admin_enqueue_scripts() {
	wp_enqueue_style( 'mediquip-plus-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'mediquip_plus_admin_enqueue_scripts' );

add_action('after_switch_theme', 'mediquip_plus_options');

function mediquip_plus_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=mediquip-plus' ) );
		exit;
	}
}

if ( ! defined( 'MEDIQUIP_PLUS_SUPPORT' ) ) {
define('MEDIQUIP_PLUS_SUPPORT',__('https://wordpress.org/support/theme/mediquip-plus','mediquip-plus'));
}
if ( ! defined( 'MEDIQUIP_PLUS_REVIEW' ) ) {
define('MEDIQUIP_PLUS_REVIEW',__('https://wordpress.org/support/theme/mediquip-plus/reviews/#new-post','mediquip-plus'));
}
if ( ! defined( 'MEDIQUIP_PLUS_PRO_DEMO' ) ) {
define('MEDIQUIP_PLUS_PRO_DEMO',__('https://www.theclassictemplates.com/demo/mediquip-plus/','mediquip-plus'));
}
if ( ! defined( 'MEDIQUIP_PLUS_THEME_PAGE' ) ) {
define('MEDIQUIP_PLUS_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','mediquip-plus'));
}
if ( ! defined( 'MEDIQUIP_PLUS_PREMIUM_PAGE' ) ) {
define('MEDIQUIP_PLUS_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/mediquip-plus/','mediquip-plus'));
}

function mediquip_plus_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'mediquip-plus' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'mediquip-plus' ),'edit_theme_options','mediquip-plus','mediquip_plus_theme_info_page'
	);
}
add_action( 'admin_menu', 'mediquip_plus_theme_info_menu_link' );

function mediquip_plus_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'mediquip-plus' ), esc_html($theme->display( 'Name', 'mediquip-plus'  )),esc_html($theme->display( 'Version', 'mediquip-plus' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'mediquip-plus' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'mediquip-plus' ); ?>:</strong>
			<a href="<?php echo esc_url( MEDIQUIP_PLUS_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'mediquip-plus' ); ?></a>
			<a href="<?php echo esc_url( MEDIQUIP_PLUS_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'mediquip-plus' ); ?></a>
			<a href="<?php echo esc_url( MEDIQUIP_PLUS_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'mediquip-plus' ); ?></a>
			<a href="<?php echo esc_url( MEDIQUIP_PLUS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'mediquip-plus' ); ?></a>
			<a href="<?php echo esc_url( MEDIQUIP_PLUS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'mediquip-plus' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'mediquip-plus' ), 
		esc_html($theme->display( 'Name', 'mediquip-plus' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'mediquip-plus' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'mediquip-plus' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'mediquip-plus' ),esc_html($theme->display( 'Name', 'mediquip-plus' ))); ?></p>
					<p>
					<a href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'mediquip-plus' ); ?></a>
					<a href="<?php echo esc_url( MEDIQUIP_PLUS_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'mediquip-plus' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'mediquip-plus' ),
			esc_html($theme->display( 'Name', 'mediquip-plus' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'mediquip-plus' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( MEDIQUIP_PLUS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'mediquip-plus' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'mediquip-plus' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
