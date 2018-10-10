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
    $hero_slider_active = get_theme_mod( 'is-hero-slider' );
    $hero_overlay = get_theme_mod( 'hero-overlay' );
    $hero_overlay_color = get_theme_mod( 'hero-overlay-color' );
    $hero_overlay_opacity = get_theme_mod( 'hero-overlay-opacity' );
    $cta_bg_img = get_theme_mod( 'cta-bkg-img' );
    $cta_bg_color = get_theme_mod( 'cta-bkg-color' );
    $cta_bg_txt_colr = get_theme_mod( 'cta-text-color' );

    $ctabgimgclass = "";
    if($cta_bg_img != "")
    {
    $ctabgimgclass = "cta_bg_img";
    }

    if($hero_overlay == 0)
    { 
       // echo $hero_overlay_opacity."opa";
    ?>
        <style type="text/css">
            .section-hero{background: <?php echo $hero_overlay_color;?>}
            .section-hero .bg-image{opacity: <?php echo '0.'.$hero_overlay_opacity;?>}
            .cta_bg_img{
                background: url("<?php echo $cta_bg_img;?>")!important;
                background-repeat: no-repeat;
                background-size: cover!important;
                background-position: center;
            }
            #abt-us-content
            {
                background: <?php echo $cta_bg_color;?>;
                color: <?php echo $cta_bg_txt_colr;?>;
            }
            .cta_bg_img .col-sm-offset-3,
            .section.section-home-cta 
            {
                background: <?php echo $cta_bg_color;?>;
                color: <?php echo $cta_bg_txt_colr;?>!important;
                padding: 80px 0px!important;
            }
        </style>
        
<?php } ?>
<?php if($hero_slider_active == 1)
{?>
    <!--Homes Slider-->
   
<div class="section-home-hero-slider">
    <div id="home-hero-gallery" class="royalSlider rsDefault rsDefaultscreen basic-home-slider ">
        <?php 
        for( $i=1 ; $i<=10 ; $i++){ 
                ${"hero_slide_$i"} = get_theme_mod( 'home-hero-slide'.$i );
                ${"hero_title_$i"} = get_theme_mod( 'home-hero-slider-title'.$i );
                ${"hero_subtitle_$i"} = get_theme_mod( 'home-hero-slider-subtitle'.$i );
            if(${"hero_slide_$i"} != '')
            {    
            ?>
            <div class="hero-block color-white text-center">
                <img class="rsImg lazy" dat="<?php echo ${"hero_slide_$i"}?>" src="<?php echo ${"hero_slide_$i"}?>" alt="<?php echo ${"hero_title_$i"};?>"/>
                <figure class="rsCaption">
                    <h1 class="h1"><?php echo ${"hero_title_$i"};?></h1>
                    <p class="color-white"><?php echo ${"hero_subtitle_$i"};?></p>
                </figure>
            </div>    

        <?php }
        } ?>
    </div>
</div>
 <!--Homes Slider-->
<!-- HERO SECTION -->
<?php 
}else{?>
<div class="section section-hero">
    <div class="bg-image fill" style="background-image: url(<?php echo get_theme_mod( 'home-hero-image' ); ?>);"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'home-hero-title' ); ?></h1>
                    <p class="color-white"><?php echo get_theme_mod( 'home-hero-desc' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HERO SECTION -->
<?php } ?>

<!-- ABOUT SECTION -->
<?php if( get_theme_mod( 'frontsteps_home_section1_title' ) != '' && get_theme_mod( 'frontsteps_home_section1_description') != '' )
{ ?>
<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 text-center">
                <div>
                    <h3><?php echo get_theme_mod( 'frontsteps_home_section1_title' ); ?></h3>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 text-center">
                <div class="content-block">
                    <p><?php echo get_theme_mod( 'frontsteps_home_section1_description' ); ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ABOUT SECTION -->
<?php } ?>

<?php
// If contnet is there on page fetched this content
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

<?php get_footer(); ?>