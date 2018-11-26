<?php
/**
 * Template Name: Contact Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The Contact page template
 */

get_header(); ?>
<!-- HERO SECTION -->
<?php
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'contact-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'contact-hero' ).")!important;background-repeat: no-repeat!important;background-size: cover!important;";
}?>
<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h2 class="h2"><?php echo get_theme_mod( 'contact-title' ); ?></h2>
                    <p id="page-sub-heading"><?php echo get_theme_mod( 'contact-subtitle' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-contact">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <?php while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; // end of the loop. ?>
            </div>
        </div>

        <div id="contact-page-address" class="row">
            <div class="col-xs-12">
                <div class="address-block text-center">
                    <p>
                        <?php echo get_theme_mod( 'contact-address' ); ?>
                        <br>
                        <?php echo get_theme_mod( 'contact-phone' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
