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


<?php
// If content is there on page fetched this content
while ( have_posts() ) : the_post();
    if ( !empty( get_the_content() ) ) { ?>
        <div class="section section-intro section-resources">
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

<div class="resources">
    <?php
    $args = array( 'post_type' => 'resource', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <div class="section section-intro section-resources">
        <div class="bg-image fill" style=""></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-block">
                        <h3 class="h4 color-dark"><?php the_title(); ?></h3>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="content-block">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>    
    <?php
    endwhile;
    } wp_reset_postdata();
    ?>
</div>


<?php get_footer(); ?>