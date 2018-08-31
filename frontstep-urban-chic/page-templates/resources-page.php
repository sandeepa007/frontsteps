<?php
/**
 * Template Name: Resources Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- Page title --->

<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'resources-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'resources-hero' ).")";
}?>
<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'resources-title' ); ?></h1>
                    <?php echo get_theme_mod( 'resources-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$args = array( 'post_type' => 'resource', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
if($loop->have_posts()){ ?>
<div class="section section-services section-resources">
   <div class="container-fluid">
      <div class="row">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-xs-12">
          <div class="service-block">
            <h3 class="h3"><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
          </div>
        </div>
        <?php
        endwhile; wp_reset_postdata();
        ?>
      </div>
   </div>
</div>
<?php } ?>
<?php get_footer(); ?>