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
    <div class="bg-image fill" style=""></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark text-bold"><?php echo get_theme_mod( 'about-section1-title' ); ?></h2>
                </div>
            </div>
        </div>
        <?php
        $full_class = "col-sm-12 text-center";
        
        if(get_theme_mod( 'about-section1-desc')!="" && get_theme_mod( 'about-section2-desc')!="")
        {
          $full_class = "col-sm-6";
        }
      ?>
        <div class="row">
             <?php  if(get_theme_mod( 'about-section1-desc')!="")
            { ?>
                <div class="col-xs-12 <?php echo $full_class;?>">
                    <div class="text-block">
                      <p><?php echo get_theme_mod( 'about-section1-desc' ); ?></p>
                    </div>
                </div>
            <?php } ?>
              <?php  if(get_theme_mod( 'about-section2-desc')!="")
              { ?>    
            <div class="col-xs-12 <?php echo $full_class;?>">
                <div class="text-block">
                    <p><?php echo get_theme_mod( 'about-section2-desc' ); ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php 

$show_bod = get_theme_mod( 'show-team-section-bod' );
$show_employee = get_theme_mod( 'show-team-section-emplye' );
?>
<!-- TEAM SECTION -->
<?php if($show_bod == 1)
{
?>
<div class="section section-box section-team bg-lightgrey">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark"><?php echo get_theme_mod( 'bod-section-title' ); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
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
                $count = 1;
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="box-block team-block text-center">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="img-block">
                                <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link">
                                   <?php the_post_thumbnail(); ?>
                               </a>
                            </div>
                        <?php }else{?>
                             <div class="img-block">
                                <img src="<?php echo get_template_directory_uri().'/img/team-image-placeholder.png';?>">
                              </div>  
                            <?php }?>   
                        
                        <div class="info-block">
                            <h4 class="h4 color-dark"><?php the_title(); ?></h4>
                            <p><?php 
                                $content = get_the_content();
                                $content = strip_tags($content);
                                echo substr($content, 0, 100);?>
                            </p>
                            <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link"><?php echo get_theme_mod( 'bod-section-rdmore' ); ?></a>
                        </div>
                    </div>
                </div>

                <!-- Team Modal -->
                <div class="modal modal-team fade" id="team-modal-<?php echo get_the_ID();?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a class="modal-close" href="" data-dismiss="modal">
                                <img src="http://hoadev.wpengine.com/wp-content/themes/hoa/images/close-icon.png" class="img-responsive">
                            </a>

                            <div class="modal-body text-center">
                                <div class="title-block">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="content-block">
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($count%3 == 0 ){?>
                    <div class="clearfix"></div>
                <?php } ?>
                <?php $count++; endwhile; wp_reset_postdata();?>
                <!-- Team Modal -->
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php if($show_employee == 1)
{
?>
<div class="section section-box section-team bg-lightgrey">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <div class="title-block text-center">
                    <h2 class="h2 color-dark"><?php echo get_theme_mod( 'emplyee-section-title' ); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
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
                $count = 1;
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="box-block team-block text-center">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="img-block">
                                <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link">
                                   <?php the_post_thumbnail(); ?>
                               </a>
                            </div>
                        <?php }else{?>
                             <div class="img-block">
                                <img src="<?php echo get_template_directory_uri().'/img/team-image-placeholder.png';?>">
                              </div>  
                            <?php }?>
                        
                        <div class="info-block">
                            <h4 class="h4 color-dark"><?php the_title(); ?></h4>
                            <p><?php 
                                $content = get_the_content();
                                $content = strip_tags($content);
                                echo substr($content, 0, 100);?>
                            </p>
                            <a href="javascript: void(0)" data-toggle="modal" data-target="#team-modal-<?php echo get_the_ID();?>" class="bio-link"><?php echo get_theme_mod( 'emplyee-section-rdmore' ); ?></a>
                        </div>
                    </div>
                </div>

                <!-- Team Modal -->
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
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($count%3 == 0 ){?>
                    <div class="clearfix"></div>
                <?php } ?>
                <?php $count++; endwhile; wp_reset_postdata();?>
                <!-- Team Modal -->
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!-- TEAM SECTION -->
<?php get_footer(); ?>