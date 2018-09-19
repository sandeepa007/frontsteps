<?php
/**
 * Template Name: Amenties Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The Amenties page template
 */

get_header(); ?>
<!-- HERO SECTION -->
<?php
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'amenities-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'amenities-hero' ).")";
}?>

<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h2 class="h2"><?php echo get_theme_mod( 'amenities-title' ); ?></h2>
                    <p id="page-sub-heading"><?php echo get_theme_mod( 'amenities-subtitle' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// If content is there on page fetched this content
while ( have_posts() ) : the_post();
    if ( !empty( get_the_content() ) ) { ?>
        <div class="section section-intro">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php  }
endwhile; // end of the loop. ?>


<?php if( get_theme_mod( 'amenities-section1-title' ) != ''|| get_theme_mod( 'amenities-section1-subtitle') != '')
{ ?>
<!-- INTRO SECTION -->
<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="title-block">
                    <h5><?php echo get_theme_mod( 'amenities-section1-title' ); ?></h5>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="content-block">
                    <div><p><?php echo get_theme_mod( 'amenities-section1-subtitle' ); ?></p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
    $args = array( 'post_type' => 'amenity', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {

    $center_class = "col-sm-4";

    if($loop->post_count == 1)
    {
        $center_class = "col-sm-12 text-center";
    }

    if($loop->post_count == 2)
    {
        $center_class = "col-sm-6 text-center";
    }

?>

<div class="section section-box">
    <div class="container">
        <div class="row">
            <?php
            while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <div class="col-xs-12 <?php echo $center_class?>">
                <div class="box-block">
                    <div class="img-block">
                        <?php 
                        if( has_post_thumbnail() ) { 
                            the_post_thumbnail( 'full' );
                        } else { ?>
                         <img src="<?php echo get_template_directory_uri().'/img/amenities-placeholder-image.png';?>" class="img-responsive">
                        <?php } ?>
                    </div>
                    <div class="info-block">
                        <h5 class="h5 color-dark"><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                    </div>
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