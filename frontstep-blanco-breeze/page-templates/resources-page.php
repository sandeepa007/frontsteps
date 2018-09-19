<?php
/**
 * Template Name: Resources Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header(); ?>
<!-- Page title --->

<?php 
$style = "background-image: url(".get_template_directory_uri()."/img/default-hero-bg.jpg)";
if( get_theme_mod( 'resources-hero' ) )
{
    $style = "background-image: url(".get_theme_mod( 'resources-hero' ).")";
}?>
<div class="section section-hero section-inner-hero">
    <div class="bg-image fill" style="<?php echo $style;?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hero-block color-white text-center">
                    <h1 class="h1"><?php echo get_theme_mod( 'resources-title' ); ?></h1>
                    <?php echo get_theme_mod( 'resources-subtitle' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-intro">
  <div class="bg-image fill" style=""></div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="title-block text-center">
          <h2 class="h2 color-dark"><?php echo get_theme_mod( 'resources-title2' ); ?></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        $full_class = "col-sm-12 text-center";
        
        if(get_theme_mod( 'resources-leftcontent')!="" && get_theme_mod( 'resources-rightcontent')!="")
        {
          $full_class = "col-sm-6";
        }
      ?>
      <?php  if(get_theme_mod( 'resources-leftcontent')!="")
      { ?>
        <div class="col-xs-12 <?php echo $full_class;?>">
            <div class="text-block">
              <p><?php echo get_theme_mod( 'resources-leftcontent' ); ?></p>
            </div>
        </div>
    <?php } ?>
      <?php  if(get_theme_mod( 'resources-rightcontent')!="")
      { ?>
      <div class="col-xs-12 <?php echo $full_class;?>">
          <div class="text-block">
              <p><?php echo get_theme_mod( 'resources-rightcontent' ); ?></p>
          </div>
      </div>
      <?php } ?>
    </div>

  </div>
</div>
<div class="resources">
  <div class="section section-intro section-resources bg-lightgrey">
    <div class="bg-image fill" style=""></div>
    <div class="container">
      <div class="row">
        <?php
        $args = array( 'post_type' => 'resource', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <div class="col-xs-12 col-sm-4">
          <div class="resources-block">
            <div class="title-block">
              <h3 class="h3 color-dark text-bold"><?php the_title(); ?></h3>
            </div>
            <div class="content-block">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php
        endwhile; wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>