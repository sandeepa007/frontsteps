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
    $testmnil_bg_img = get_theme_mod( 'testimonial-bg' );
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
            /*.col-xs-12.col-sm-10.col-sm-offset-1,
            .section-cta 
            {
                background: <?php echo $cta_bg_color;?>;
                color: <?php echo $cta_bg_txt_colr;?>!important;
                padding: 80px 0px!important;
            }*/
        </style>
        
<?php } ?>
<style type="text/css">
    .cta_bg_img{
                background: url("<?php echo $cta_bg_img;?>")!important;
                background-repeat: no-repeat;
                background-size: cover!important;
                background-position: center;
            }
            .section-about .container .content-block
            {
                background: <?php echo $cta_bg_color;?>;
                color: <?php echo $cta_bg_txt_colr;?>!important;   
            }
            <?php if($testmnil_bg_img != ""){?>
            .section.section-testimonials
            {
                background: url("<?php echo $testmnil_bg_img;?>")!important;
            }
        <?php } ?>

</style>
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
<?php if ( get_theme_mod( 'home-cta-desc' )!="" && get_theme_mod( 'home-cta-desc' )!="") { ?>
<div class="section section-intro section-cta <?php echo $ctabgimgclass;?>">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="intro-block text-center">
               <h2 class="h2"><?php echo get_theme_mod( 'home-cta-title' ); ?></h2>
               <p><?php echo get_theme_mod( 'home-cta-desc' ); ?></p>
            </div>
            <div class="button-block text-center">
               <a href="<?php echo get_theme_mod( 'home-cta-button-url' ); ?>" class="button button-primary"><?php echo get_theme_mod( 'home-cta-button-text' ); ?></a>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<?php if ( is_active_sidebar( 'home-features' ) ) : ?>
<div class="section section-box">
   <div class="container-fluid">
      <div class="row">
        <?php dynamic_sidebar( 'home-features' ); ?>
      </div>
   </div>
</div>
<?php endif; ?>
<?php
$args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
if($loop->have_posts() )
{
?>
<div class="section section-testimonials">
   <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div id="owl-testimonials" class="owl-carousel testimonials-slider owl-loaded owl-drag">               
                    <?php
                    while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <div class="testimonial-block text-center">
                        <div class="icon-block">“</div>
                        <?php the_content();?>
                        <h5 class="h5">— <?php the_title();?></h5>
                    </div>
                    <?php
                    endwhile; wp_reset_postdata();
                    ?>                    
                </div>
                <div id="owl-counter"></div> 
           </div>
        </div>
    </div>
</div>
<?php
} ?> 

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