<?php
/**
 * Template Name: Services Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- Page title --->

<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'services-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'services-hero' ).")";
}?>
<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'services-title' ); ?></h1>
                    <?php echo get_theme_mod( 'services-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$args = array( 'post_type' => 'service', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
if($loop->have_posts() )
{
?>
<div class="section section-services">
   <div class="container-fluid">
      <div class="row">
        <?php
        $count = 1;
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <div class="col-xs-12 col-sm-6">
            <div class="service-block">
               <h3 class="h3"><?php the_title(); ?></h3>
               <p><?php the_content(); ?></p>
            </div>
        </div>
        <?php if($count%2 == 0 ){?>
                    <div class="clearfix"></div>
            <?php } ?>
        <?php
        $count++; endwhile; wp_reset_postdata();
        ?> 
      </div>
   </div>
</div>
<?php } ?>
<?php get_footer(); ?>