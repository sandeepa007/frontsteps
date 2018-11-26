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
            .home-body-navigation
            {
                background: #0A92CE;
                color: #ffffff;
                font-weight: 600;
            }
            .traneperent_overlay
            {
                background: #0A92CE;
                padding: 30px 0px;
                position: relative;
                margin-top: -61px;
                opacity: 0.5;
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

<!-- Home Navigation Section-->
<div class="traneperent_overlay"></div>
<div class="section section-intro home-body-navigation text-center">
    <div class="container">
        <div class="row">
            <?php 
            $col_num = get_theme_mod('navbar-col-count');
            
            for( $i=1 ; $i<=4 ; $i++){ 
                if($col_num == 4)
                {
                    $divclass = "col-sm-3";
                }
                if($col_num == 3)
                {
                    $divclass = "col-sm-4";
                    echo '<style type="text/css">
                            .icon-container-4{display: none!important;}
                          </style>';
                }
                if($col_num == 2)
                {
                    $divclass = "col-sm-6";
                    echo '<style type="text/css">
                            .icon-container-4,.icon-container-3{display: none!important;}
                          </style>';
                }
                if($col_num == 1)
                {
                    $divclass = "col-sm-12";
                    echo '<style type="text/css">
                            .icon-container-4,.icon-container-3,.icon-container-2{display: none!important;}
                          </style>';
                }
                
                ${"navbar_img_$i"} = get_theme_mod( 'navbar-img'.$i );
                ${"navbar_img_bg_$i"} = get_theme_mod( 'navbar-img-bg'.$i );
                ${"navbar_hover_img_$i"} = get_theme_mod( 'navbar-hover-img'.$i );
                ${"navbar_img_hver_bg_$i"} = get_theme_mod( 'navbar-img-hover-bg'.$i );
                ${"navbar_img_url_$i"} = get_theme_mod( 'navbar-img-url'.$i );
                ${"navbar_title_$i"} = get_theme_mod( 'navbar-title'.$i );
                ${"navbar_subtitle_$i"} = get_theme_mod( 'navbar-subtitle'.$i );
                
                
                /*if(isset($navbar_title_4) && isset($navbar_img_4) && isset($navbar_subtitle_4))
                { 
                  $divclass = "col-sm-3";

                    if(strlen($navbar_title_4) == 0 && strlen($navbar_img_4) == 0 && strlen($navbar_subtitle_4) == 0)
                        {
                            $divclass = "col-sm-4";
                            
                            echo '<style type="text/css">.icon-container-4{display: none;}</style>';
                        }
                }
                else
                {
                    $divclass = "col-sm-4";
                }*/

            ?>
                <style type="text/css">
                    .icnimg_<?php echo $i;?>
                    {
                      background: url(<?php echo ${"navbar_img_$i"}?>);
                      background-color:<?php echo ${"navbar_img_bg_$i"}?>;
                      background-repeat: no-repeat;
                      background-position: center;
                    }
                    .icnimg_<?php echo $i;?>:hover
                    {
                      background: url(<?php echo ${"navbar_hover_img_$i"}?>);
                      background-color:<?php echo ${"navbar_img_hver_bg_$i"}?>;
                      background-repeat: no-repeat;
                      background-position: center;
                    }
                   
                </style>
            <div class="col-xs-12 <?php echo $divclass;?> icon-container icon-container-<?php echo $i;?>">
                <a target="_blank" href="<?php echo ${"navbar_img_url_$i"}?>"><div class="icn icnimg_<?php echo $i;?>"></div></a>
                <span class="body_nav_title"><?php echo ${"navbar_title_$i"};?></span>
                <div class="desc"><?php echo ${"navbar_subtitle_$i"};?></div>
            </div>
        <?php } ?>
        </div>
    </div>        
</div>

<!-- -->


<!-- ABOUT SECTION -->
<?php if( get_theme_mod( 'frontsteps_home_section1_title' ) != '' && get_theme_mod( 'frontsteps_home_section1_description') != '' )
{ ?>
<div class="section section-intro">
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="title-block">
                    <h3><?php echo get_theme_mod( 'frontsteps_home_section1_title' ); ?></h3>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
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
