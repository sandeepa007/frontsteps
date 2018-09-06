<?php
/**
 * Template Name: Thank You Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 */

get_header();

$container   = get_theme_mod( 'frontsteps_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <div class="col-md-12 section section-intro " id="primary">
<?php while ( have_posts() ) : the_post(); ?>
                <main class="site-main" id="main">
                <section class=" not-found text-center">
                <?php
                    $page_content = get_theme_mod( 'ty_button_textdesc' );
                    $page_butn = get_theme_mod( 'ty_button_text' );
                    $page_url = get_theme_mod( 'ty_button_link' );
                ?>
                <h1 class="not_found_heading"><?php echo get_the_title() ; ?></h1>
                <i class="fa fa-check thank"></i>
                <div class="not_found_cotent">
                    <p><?php echo $page_content; ?></p>
                <?php if($page_butn != ""){ ?>

                    <div class="button-block text-center">
                        <a href="<?php echo $page_url; ?>" class="button button-primary"><?php echo $page_butn; ?></a>
                    </div>
                <?php } ?>
                </div>              
                </section><!-- .error-404 -->
                </main><!-- #main -->
<?php endwhile; // end of the loop. ?>
            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
