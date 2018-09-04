<?php
/**
 * Template Name: Communities Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- HERO SECTION -->
<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'community-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'community-hero' ).")";
}?>

<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'community-title' ); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INTRO SECTION -->
<div class="section section-intro communities-intro">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="intro-block text-center">
               <?php if(get_theme_mod( 'community-sub-title' )!=""){?>
               <h2 class="h2"><?php echo get_theme_mod( 'community-sub-title' ); ?></h2>
               <?php }?>
               <?php if(get_theme_mod('community-info')!=""){?>
               <?php echo get_theme_mod('community-info');?>
               <?php }?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- INTRO SECTION -->
<div class="section section-box section-community">
    <div class="container-fluid">          
        <div class="row">
            <?php
            $args = array( 'post_type' => 'community', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();

            $meta = get_post_meta(get_the_id(), 'community', true );
            
            $linkurl = $meta['url'] ? $meta['url'] : "#";
            $openin = "_self";
            if(isset($meta['openin']) && $meta['openin']==1){
                $openin = "_blank";
            }
            
            ?>
            <a href="<?php echo $linkurl?>" target="<?php echo $openin?>">
                <div class="col-xs-12 col-sm-4">
                    <div class="box-block community-block text-center">
                         <div class="img-block">
                            <?php if(the_post_thumbnail( 'full' )){ ?>
                                <img src="<?php  the_post_thumbnail( 'full' )?>" class="img-responsive">
                                    <?php }else{?>
                                <img src="<?php echo get_template_directory_uri().'/img/amenities-placeholder-image.png';?>" class="img-responsive">
                     <?php } ?>

                        </div>
                        <div class="info-block">
                            <h3 class="h3"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
            </a>                   
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