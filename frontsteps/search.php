<?php

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
                    <h1 class="h1"><?php printf(
							/* translators:*/
							 esc_html__( 'Search Results for: %s', 'frontsteps' ),
								'<span>' . get_search_query() . '</span>' ); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-box section-community">
    <div class="container-fluid">          
        <div class="row">
            <?php if ( have_posts() ) : ?>
            <?php 
            $count = 1;
            while ( have_posts() ) : the_post();
			$meta = get_post_meta(get_the_id(), 'community', true );
	            if(!empty($meta))
	            {
	            	$linkurl = $meta['url'] ? $meta['url'] : "#";
		            $openin = "_self";
		            if(isset($meta['openin']) && $meta['openin']==1){
		                $openin = "_blank";
		            }
	            }else
	            {
	            	$linkurl = get_permalink() ;
	            }
	        ?>
            <a href="<?php echo $linkurl?>" target="<?php echo $openin?>">
                <div class="col-xs-12 col-sm-4">
                    <div class="box-block community-block text-center">
                         <div class="img-block">
                            <?php if( has_post_thumbnail() ){ 
                                the_post_thumbnail( 'full' );
                              } else { ?>
                                <img src="<?php echo get_template_directory_uri().'/img/amenities-placeholder-image.png';?>" class="img-responsive">
                              <?php } ?>

                        </div>
                        <div class="info-block">
                            <h3 class="h3"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
            </a>
            <?php if($count%3 == 0 ){?>
                    <div class="clearfix"></div>
            <?php } ?>                
            <?php
            $count++; endwhile; wp_reset_postdata();
            else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>
        </div>            
       
    </div>
</div>
<?php get_footer(); ?>