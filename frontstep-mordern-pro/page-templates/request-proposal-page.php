<?php
/**
 * Template Name: Request Proposal Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- HERO SECTION -->
<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'rq_proposal-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'rq_proposal-hero' ).")";
}?>
<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'rq_proposal-title' ); ?></h1>
                    <?php echo get_theme_mod( 'rq_proposal-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-contact">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <?php
        // If content is there on page fetched this content
            while ( have_posts() ) : the_post();
                if ( !empty( get_the_content() ) ) { ?>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
               <?php echo the_content(); ?>
            </div>
        </div>
    <?php } 
    endwhile; // end of the loop. ?>

<?php if( get_theme_mod( 'contact-address' ) != '' && get_theme_mod( 'contact-phone') )
{ ?>
        <div class="row">
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
<?php } ?>
    </div>
</div>

<?php if( get_theme_mod( 'contact-map' ) != '')
{ ?>
<div class="contct-map">
    <div class="row">
            <div class="col-xs-12">
                <div class="address-block text-center">
                    <iframe width="100%" height="350px" src="<?php echo get_theme_mod( 'contact-map' ); ?>"></iframe>    
                </div>
            </div>
        </div>
</div>
<?php } ?>
<?php get_footer(); ?>