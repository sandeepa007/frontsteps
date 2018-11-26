<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */
get_header();?>

<!-- HERO SECTION -->
<?php 
    //$hero_slider_active = get_theme_mod( 'is-hero-slider' );
    $hero_overlay = get_theme_mod( 'hero-overlay' );
    $hero_overlay_color = get_theme_mod( 'hero-overlay-color' );
    $hero_overlay_opacity = get_theme_mod( 'hero-overlay-opacity' );
    $hero_cta_text = get_theme_mod( 'hero-cta-text' );
    $hero_cta_url = get_theme_mod( 'hero-cta-url' );
    

    $cta_1_txt = get_theme_mod( 'home_section1_cta_text' );
    $cta_1_url = get_theme_mod( 'home_section1_cta_url' );

    $cta_2_txt = get_theme_mod( 'home_section2_cta_text' );
    $cta_2_url = get_theme_mod( 'home_section2_cta_url' );
    //$cta_bg_txt_colr = get_theme_mod( 'cta-text-color' );

    if($hero_overlay == 0)
    { 
       // echo $hero_overlay_opacity."opa";
    ?>
        <style type="text/css">
            .section-hero{background: <?php echo $hero_overlay_color;?>}
            .section-hero .bg-image{opacity: <?php echo '0.'.$hero_overlay_opacity;?>}
        </style>
        
<?php } ?>
<div class="section section-hero">
    <div class="bg-image fill" style="background-image: url(<?php echo get_theme_mod( 'home-hero-image' ); ?>);"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'home-hero-title' ); ?></h1>
                    <p class="color-white"><?php echo get_theme_mod( 'home-hero-desc' ); ?></p>
                    <a id="button" href="<?php echo $hero_cta_url ?>" class="button button-primary"><?php echo $hero_cta_text ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HERO SECTION -->

<!-- ABOUT SECTION -->

<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            
            <?php 
            if( get_theme_mod( 'home_section2_title') != '' || get_theme_mod( 'home_section2_desc') != '' || $cta_2_txt != '' || $cta_2_url != '') : 
                    $divclass = "col-sm-6";
                    $style = "";
            else :
                    $divclass = "col-sm-12";
                    $style = "style=\"max-width:100%;text-align:center;\"";
            endif;
            ?>


            <div class="col-xs-12 <?php echo $divclass; ?>">
                <div class="title-block" <?php echo $style; ?>>
                    <h3><?php echo get_theme_mod( 'frontsteps_home_section1_title' ); ?></h3>
                    <p><?php echo get_theme_mod( 'frontsteps_home_section1_description' ); ?></p>
                    <?php if( $cta_1_txt != '' && $cta_1_url != '' || $cta_1_url != '')
                    { ?>
                    <div class="btn-block">
                            <a href="<?php echo $cta_1_url;?>" class="button button-primary"><?php echo $cta_1_txt;?></a>
                    </div> 
                <?php } ?>
                </div>
            </div>

            <?php 
            if( get_theme_mod( 'frontsteps_home_section1_title') != '' || get_theme_mod( 'frontsteps_home_section1_description') != '' || $cta_1_txt != '') : 
                    $divclass = "col-sm-6";
                    $style = "";
            else :
                    $divclass = "col-sm-12";
                    $style = "style=\"max-width:100%;text-align:center;\"";
            endif;
            ?>

            <div class="col-xs-12 <?php echo $divclass; ?>">
                <div class="title-block" <?php echo $style; ?>>
                    <h3><?php echo get_theme_mod( 'home_section2_title' ); ?></h3>
                    <p><?php echo get_theme_mod( 'home_section2_desc' ); ?></p>
                        <?php if( $cta_2_txt != '' && $cta_2_url != '' )
                    { ?>
                    <div class="btn-block">
                            <a href="<?php echo $cta_2_url;?>" class="button button-primary"><?php echo $cta_2_txt;?></a>
                    </div> 
                <?php } ?> 
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ABOUT SECTION -->
<?php get_footer(); ?>