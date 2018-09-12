<?php
/**
 * Template Name: Amenties Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
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
                    <h1 class="h1"><?php echo get_theme_mod( 'amenities-title' ); ?></h1>
                    <?php echo get_theme_mod( 'amenities-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INTRO SECTION -->
<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark"><?php echo get_theme_mod( 'amenities-section1-title' ); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6">

                <div class="text-block">
                    <p><?php echo get_theme_mod( 'amenities-section1-subtitle' ); ?></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">

                <div class="text-block">
                    <p><?php echo get_theme_mod( 'amenities-rightcontent' ); ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="section section-box no-padding-top no-padding-bottom">
    <div class="container">          
        <div class="row">
            <?php
            $args = array( 'post_type' => 'amenity', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <div class="col-xs-12 col-sm-4">
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
                        <h3 class="h3 color-dark"><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
            </div>            
            <?php
            endwhile; wp_reset_postdata();
            ?>
        </div>            
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <?php while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>