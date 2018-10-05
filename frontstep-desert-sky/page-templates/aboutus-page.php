<?php
/**
 * Template Name: Aboutus Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- HERO SECTION -->
<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'about-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'about-hero' ).")";
}?>

<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'about-title' ); ?></h1>
                    <?php echo get_theme_mod( 'about-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HERO SECTION -->

<div class="section section-intro">
   <div class="container-fluid">
      <?php if(get_theme_mod( 'about-section1-title' )!=""){ ?>
      <div class="row">
         <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="intro-block text-center">
                <h2 class="h2"><?php echo get_theme_mod( 'about-section1-title' ); ?></h2>
                <p><?php echo get_theme_mod( 'about-section1-desc' ); ?></p>
            </div>
         </div>
      </div>
      <?php }?>
   </div>
</div>
<?php
// If content is there on page fetched this content
while ( have_posts() ) : the_post();
    if ( !empty( get_the_content() ) ) { ?>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>        
<?php  } 
endwhile;
wp_reset_query();  // end of the loop. ?>
<?php 

$show_bod = get_theme_mod( 'show-team-section-bod' );
$show_employee = get_theme_mod( 'show-team-section-emplye' );
?>
<?php if($show_bod == 1)
{
?>
<!-- BOD SECTION -->
<div class="section section-box section-team">
    <div class="container">
        <?php if(get_theme_mod( 'bod-section-title' )!=""){?>
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark"><?php echo get_theme_mod( 'bod-section-title' ); ?></h2>
                </div>
            </div>
        </div>    
        <?php
        }?>   
        <div class="row">
            <?php
            $args = array( 
                            'post_type' => 'member',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'member_type',
                                    'field' => 'slug',
                                    'terms'    => array( 'member_board_of_directors'),
                                    )
                            ),
                            'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            
            //echo $loop->request;exit;

            while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="col-xs-12 col-sm-4">
                <div class="box-block team-block text-center">

                    <div class="img-block">
                       <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail(); 
                            }else{?>
                            <img src="<?php echo get_template_directory_uri().'/img/team-image-placeholder.png';?>">
                            <?php }?>
                    </div>
                    <div class="info-block">
                        <h4 class="h4 color-dark"><?php the_title(); ?></h4>
                        <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link">Read Bio</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal modal-team fade" id="team-modal-<?php echo get_the_ID();?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <a class="modal-close" href="" data-dismiss="modal">
                            <img src="<?php bloginfo('template_directory'); ?>/images/close-icon.png" class="img-responsive">
                        </a>

                        <div class="modal-body text-center">
                            <div class="title-block">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="content-block">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
<?php endwhile; wp_reset_postdata();?>

        </div>        
    </div>
</div>
<!-- BOD SECTION -->
<?php } ?>


<?php if($show_employee == 1)
{
?>
<!-- BOD SECTION -->
<div class="section section-box section-team">
    <div class="container">
        <?php if(get_theme_mod( 'emplyee-section-title' )!=""){?>
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark"><?php echo get_theme_mod( 'emplyee-section-title' ); ?></h2>
                </div>
            </div>
        </div>       
        <?php
        }?>
        <div class="row">
            <?php
            $args = array( 
                            'post_type' => 'member',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'member_type',
                                    'field' => 'slug',
                                    'terms'    => array( 'member_employee'),
                                    )
                            ),
                            'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="col-xs-12 col-sm-4">
                <div class="box-block team-block text-center">

                    <div class="img-block">
                       <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail(); 
                            }else{?>
                            <img src="<?php echo get_template_directory_uri().'/img/team-image-placeholder.png';?>">
                            <?php }?>
                    </div>
                    <div class="info-block">
                        <h4 class="h4 color-dark"><?php the_title(); ?></h4>
                        <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link">Read Bio</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal modal-team fade" id="team-modal-<?php echo get_the_ID();?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <a class="modal-close" href="" data-dismiss="modal">
                            <img src="<?php bloginfo('template_directory'); ?>/images/close-icon.png" class="img-responsive">
                        </a>

                        <div class="modal-body text-center">
                            <div class="title-block">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="content-block">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
<?php endwhile; wp_reset_postdata();?>

        </div>        
    </div>
</div>
<!-- BOD SECTION -->
<?php } ?>
<!-- TEAM SECTION -->
<?php get_footer(); ?>