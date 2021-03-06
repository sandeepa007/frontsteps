<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package frontsteps
 */


$container = get_theme_mod( 'frontsteps_container_type' );
?>
<!-- Main Container -->
<!-- Call to Actions SECTION -->
<footer class="gradient-white">

	<div class="container ">
		<div class="row ">
			<div class="col-12 text-center wow fadeInUp">
				<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
			  	<?php dynamic_sidebar( 'footer-left' ); ?>
			  <?php endif; ?>
			</div>

			<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.4s">
				<ul class="list-inline margin-tb-20px margin-lr-0px text-center footer-social">
					<?php if(get_theme_mod( 'url-facebook' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="facebook" href="<?php echo get_theme_mod( 'url-facebook' )?>"><i class="fa fa-2x fa-facebook"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-twitter' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="twitter" href="<?php echo get_theme_mod( 'url-twitter' )?>"><i class="fa fa-2x fa-twitter"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-pinterest' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="pinterest" href="<?php echo get_theme_mod( 'url-pinterest' )?>"><i class="fa fa-2x fa-pinterest-p"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-instagram' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="instagram" href="<?php echo get_theme_mod( 'url-instagram' )?>"><i class="fa fa-2x fa-instagram"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-youtube' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="youtube" href="<?php echo get_theme_mod( 'url-youtube' )?>"><i class="fa fa-2x fa-youtube"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-linkedin' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="linkedin" href="<?php echo get_theme_mod( 'url-linkedin' )?>"><i class="fa fa-2x fa-linkedin"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-google' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="google" href="<?php echo get_theme_mod( 'url-google' )?>"><i class="fa fa-2x fa-google-plus"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-blog' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="rss" href="<?php echo get_theme_mod( 'url-blog' )?>"><i class="fa fa-2x fa-rss" aria-hidden="true"></i></a>
					</li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-yelp' )) { ?>
					<li class="list-inline-item">
						<a target="_blank" class="yelp" href="<?php echo get_theme_mod( 'url-yelp' )?>"><i class="fa fa-2x fa-yelp" aria-hidden="true"></i></a>
					</li>
					<?php } ?>
				</ul>
				<!-- // Social -->
			</div>

			<div class="col-12 text-center wow fadeInUp">
				<?php wp_nav_menu(
							array(
								'theme_location'  => 'footer_menu',
								'menu_class'      => 'footer-menu margin-0px padding-0px list-unstyled',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-links',
								'depth'           => 2,
								'walker'          => new Frontsteps_WP_Bootstrap_Navwalker(),
							)
						); ?>
			</div>

			<div class="col-12 text-center wow fadeInUp footer-logo">
				<?php if ( is_active_sidebar( 'footer-logo' ) ){
			  				dynamic_sidebar( 'footer-logo' );
			  			}
			  		else{?>
			  				<img class="footerFrontsteplogo" src="<?php echo get_stylesheet_directory_uri()?>/img/footer-logo.png">
			  		<?php	}	
			  			?>
			</div>

		</div>

		<div class="row padding-top-30px wow fadeInUp">
			<div class="col-12 text-xs-center text-right">
				<span class="text-sm-center text-lg-right text-grey-3 d-block padding-top-5px">
          Powered by <a href="https://www.frontsteps.com/" target="_blank"><img class="footerFrontsteplogo" src="<?php echo get_stylesheet_directory_uri()?>/img/frontstep-white.png"></a>
        </span>
			</div>
		</div>
	</div>
</footer>

</div>
<!-- Main Container -->

<?php wp_footer(); ?>

</body>

</html>
