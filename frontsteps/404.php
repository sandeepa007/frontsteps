<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package frontsteps
 **/

get_header();

$container   = get_theme_mod( 'frontsteps_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 section section-intro " id="primary">

				<main class="site-main" id="main">
				<section class="error-404 not-found text-center">
				<?php
					$page_content = get_theme_mod( '404_desc' );
					$page_butn = get_theme_mod( '404_button_text' );
					$page_url = get_theme_mod( '404_button_link' );
				?>
				<h3 class="not_found_heading">404</h3>
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

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
