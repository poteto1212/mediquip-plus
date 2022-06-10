<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Mediquip Plus
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('mediquip_plus_preloader',true) != "") { ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'mediquip-plus' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'mediquip_plus_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<div class="header-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-4 align-self-center">
        <div class="logo">
          <?php mediquip_plus_the_custom_logo(); ?>
          <div class="site-branding-text">
            <?php if ( get_theme_mod('mediquiq_plus_title_enable',true) != "") { ?>
              <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('mediquiq_plus_tagline_enable',true) != "") { ?>
                <span class="site-description"><?php echo esc_html( $description ); ?></span>
              <?php } ?>
            <?php endif; ?> 
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 border-right align-self-center">
        <?php if ( get_theme_mod('mediquip_plus_location_text') != ""|| get_theme_mod('mediquip_plus_location') != "") { ?> 
          <div class="row mb-2 mb-md-0 mb-lg-0">
            <div class="col-lg-2 col-md-2">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <p class="mb-2"><?php echo esc_html(get_theme_mod ('mediquip_plus_location_text','')); ?></p>
              <h6><?php echo esc_html(get_theme_mod ('mediquip_plus_location','')); ?></h6>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <?php if ( get_theme_mod('mediquip_plus_time_text') != ""|| get_theme_mod('mediquip_plus_time') != "") { ?> 
          <div class="row">
            <div class="col-lg-2 col-md-2">
              <i class="far fa-clock"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <p class="mb-2"><?php echo esc_html(get_theme_mod ('mediquip_plus_time_text','')); ?></p>
              <h6><?php echo esc_html(get_theme_mod ('mediquip_plus_time','')); ?></h6>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-7 align-self-center">
        <div class="toggle-nav">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab"><?php esc_html_e('MENU','mediquip-plus'); ?></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','mediquip-plus' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','mediquip-plus'); ?></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 align-self-center">
        <?php if ( get_theme_mod('mediquip_plus_phone_number_text') != ""|| get_theme_mod('mediquip_plus_phone_number') != "") { ?> 
          <p><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod ('mediquip_plus_phone_number_text','')); ?> : <?php echo esc_html(get_theme_mod ('mediquip_plus_phone_number','')); ?></p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>