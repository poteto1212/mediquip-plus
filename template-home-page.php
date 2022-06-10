<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Mediquip Plus
 */

get_header(); ?>

<div id="content">
  <?php
    $hidcatslide = get_theme_mod('mediquip_plus_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('mediquip_plus_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('mediquip_plus_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php the_post_thumbnail( 'full' ); ?>
                <div class="slider-box">
                  <h3><?php the_title(); ?></h3>
                  <?php if ( get_theme_mod('mediquip_plus_button_text') != "") { ?>
                    <div class="shop-now">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('mediquip_plus_button_text','SHOP NOW','mediquip-plus')); ?></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <section id="second-sec" class="text-center">
    <div class="container">
      <?php if ( get_theme_mod('mediquip_plus_section_title') != "") { ?>
        <h3><?php echo esc_html(get_theme_mod('mediquip_plus_section_title','')); ?></h3>
        <hr class="line-hr">
        <div class="line-box mb-4"><i class="fas fa-heartbeat"></i></div>
      <?php } ?>
      <div class="inner-main-box">
        <div class="row">
          <?php if( get_theme_mod('mediquip_plus_facilities_section',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('mediquip_plus_facilities_section',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="inner-service-box"> 
                  <?php the_post_thumbnail( 'full' ); ?>
                  <div class="title-box">
                    <h4><?php the_title(); ?></h4>
                    <?php
                      $trimexcerpt = get_the_excerpt();
                      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                      echo '<p>' . esc_html( $shortexcerpt ) . '</p>'; 
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','mediquip-plus'); ?></a>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section id="content-creation">
    <div class="container">      
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>