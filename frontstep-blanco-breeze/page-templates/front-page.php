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
    $show_gallery = get_theme_mod( 'home-hide-gallery' );
    
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
            .section-cta .container .content-block
            {
                background: <?php echo $cta_bg_color;?>;
                color: <?php echo $cta_bg_txt_colr;?>!important;   
            }
            .col-xs-12.col-sm-10.col-sm-offset-1,
            .section-cta 
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
                    <p><?php echo ${"hero_subtitle_$i"};?></p>
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
                    <p><?php echo get_theme_mod( 'home-hero-desc' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HERO SECTION -->
<?php } ?>

<!-- IMAGE TEXT SECTION -->
<?php if ( is_active_sidebar( 'home-features' ) ) : ?>
        <div class="section section-intro">
            <div class="bg-image fill" style=""></div>
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'home-features' ); ?>
                </div>
            </div>
        </div>

<?php endif; ?>
<?php //endif;?>
<!-- IMAGE TEXT SECTION -->
<?php if ( get_theme_mod( 'home-cta-desc' )!="" && get_theme_mod( 'home-cta-desc' )!="") { ?>
<div class="section section-home-cta section-cta <?php echo $ctabgimgclass;?>">
    <div class="bg-image fill" style="background-image: url(<?php echo get_theme_mod( 'home-cta-url' ); ?>);"></div>

   
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="content-block color-white text-center">
                    <h2 class="h2 text-bold"><?php echo get_theme_mod( 'home-cta-desc' ); ?></h2>
                    <p></p>
                                        <div class="btn-block">
                        <a href="<?php echo get_theme_mod( 'home-cta-button-url' ); ?>" class="button button-white"><?php echo get_theme_mod( 'home-cta-button-text' ); ?></a>
                    </div>
                                    </div>
            </div>
        </div>           
    </div>
</div>
<?php } ?>

<?php if( $show_gallery == 1)
    {
?>
<div class="section section-gallery">
    <div class="container container-full">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark text-blod"><?php echo get_theme_mod( 'frontsteps_home_section1_title' ); ?></h2>
                    <p><?php echo get_theme_mod( 'frontsteps_home_section1_description' ); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-group">
        <div id="home-gallery" class="owl-carousel owl-loaded owl-drag">
            
            
                <?php 
                $args = array( 'post_type' => 'frontsteps-gallery');
                
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $attachments = new Attachments( 'attachments', get_the_ID() ); ?>

                <?php if( $attachments->exist() ) {?>
                    <?php while( $attachment = $attachments->get() ) : ?>
                        <div class="image-block gallery-block">
                            <img src="<?php echo $attachments->url(); ?>" class="img-responsive" alt="<?php echo $attachments->field( 'title' ); ?>" />
                        </div>                        
                    <?php endwhile; ?>
                <?php 
                    }else
                    { 
                        for( $i=1; $i<=4 ; $i++)
                        { ?>
                            <div class="image-block gallery-block">                    
                                <img src="<?php echo get_stylesheet_directory_uri().'/img/gallery/gallery-'.$i.'.jpg'; ?>" alt="<?php echo "gallery-".$i; ?>" >                        
                            </div>

                        <?php 
                        }
                        ?>
                    <?php
                    }

                 ?>
                <?php endwhile; wp_reset_postdata();?>                            
            
        </div>
    </div>
    <div class="btn-block text-center">
        <a href="<?php echo get_site_url()?>/gallery/" class="button button-primary">See Gallery</a>
    </div>   
</div>
<?php } ?>
<?php
$show_accredition = get_theme_mod( 'home-hide-accreditation' );
if($show_accredition ==1 )
{ 
    $args = array( 'post_type' => 'accreditation', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );

    if ( $loop->have_posts() ) {
    ?>
    <!-- ACCREDIDATIONS SECTION -->
    <div class="section section-accredidations">
       <div class="container">
          <div class="row">
    <div class="accredidations-logos">
    <?php
    while ( $loop->have_posts() ) : $loop->the_post();
      ?>
        <div class="slide">
            <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'accredition-logo' );
                    }else{ ?>
                <img src="<?php echo get_template_directory_uri().'/img/accre-placeholder-img.png';?>">
                       <?php } ?>
        </div>
    <?php
    endwhile; wp_reset_postdata();
    ?>
    </div>
          </div>
       </div>
    </div>
    <!-- ACCREDIDATIONS SECTION -->
    <?php } 
}
?>
<?php get_footer(); ?>