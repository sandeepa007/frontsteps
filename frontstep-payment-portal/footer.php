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
<?php if (!is_front_page() && get_page_template_slug() != "page-templates/contact-page.php" && !is_404()  && get_page_template_slug() != "page-templates/thank-you.php") :
$cta_bg_img = get_theme_mod( 'cta-bkg-img' );
$cta_bg_color = get_theme_mod( 'cta-bkg-color' );
$cta_bg_txt_colr = get_theme_mod( 'cta-text-color' );

$ctabgimgclass = "";
if($cta_bg_img != "")
{
	$ctabgimgclass = "cta_bg_img";
}
?>
<style type="text/css">
	.cta_bg_img{
		background: url("<?php echo $cta_bg_img;?>")!important;
		background-repeat: no-repeat;
		background-size: cover!important;
		background-position: center;
	}
	.cta_bg_img .col-sm-offset-3,
	.section.section-cta
	{
		background: <?php echo $cta_bg_color;?>;
		color: <?php echo $cta_bg_txt_colr;?>;
		padding: 80px 0px!important;
	}
</style>
<?php if(get_theme_mod( 'cta-desc' )!=""){ ?>
<div class="section section-cta <?php echo $ctabgimgclass;?>">
   <div class="container-fluid">

      <div class="row">
         <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="cta-block text-center">
               <p><?php echo get_theme_mod( 'cta-desc' ); ?></p>
            </div>
            <div class="button-block text-center">
               <a href="<?php echo get_theme_mod( 'cta-button-url' ); ?>" class="button button-primary"><?php echo get_theme_mod( 'cta-button-text' ); ?></a>
            </div>
         </div>
      </div>

   </div>
</div>
<?php } ?>
<?php endif; ?>
<footer class="gradient-white">	

	<div class="container ">
		<div class="row ">
			<div class="col-lg-12 col-xs-12 col-md-12 text-center col-sm-6 sm-mb-30px wow fadeInUp">
				<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
			            <?php dynamic_sidebar( 'footer-left' ); ?>
			    <?php endif; ?>			
			
			
				<ul class="list-inline text-center margin-tb-20px margin-lr-0px text-grey-2 text-xs-center footer-social">
					<?php if(get_theme_mod( 'url-facebook' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="facebook" href="<?php echo get_theme_mod( 'url-facebook' )?>"><i class="fa fa-2x fa-facebook"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-youtube' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="youtube" href="<?php echo get_theme_mod( 'url-youtube' )?>"><i class="fa fa-2x fa-youtube"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-linkedin' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="linkedin" href="<?php echo get_theme_mod( 'url-linkedin' )?>"><i class="fa fa-2x fa-linkedin"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-google' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="google" href="<?php echo get_theme_mod( 'url-google' )?>"><i class="fa fa-2x fa-google-plus"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-twitter' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="twitter" href="<?php echo get_theme_mod( 'url-twitter' )?>"><i class="fa fa-2x fa-twitter"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-blog' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="rss" href="<?php echo get_theme_mod( 'url-blog' )?>"><i class="fa fa-2x fa-rss" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-pinterest' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="pinterest" href="<?php echo get_theme_mod( 'url-pinterest' )?>"><i class="fa fa-2x fa-pinterest-p" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-instagram' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="instagram" href="<?php echo get_theme_mod( 'url-instagram' )?>"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a></li>
					<?php } ?>
					<?php if(get_theme_mod( 'url-yelp' )) { ?>
					<li class="list-inline-item"><a target="_blank" class="yelp" href="<?php echo get_theme_mod( 'url-yelp' )?>"><i class="fa fa-2x fa-yelp" aria-hidden="true"></i></a></li>
					<?php } ?>
				</ul>
				
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

				<!-- // Social -->
			</div>

		</div>
		
		<div class="row padding-top-30px wow fadeInUp">
			
			<div class="col-lg-4 col-lg-offset-8 col-sm-4 col-sm-offset-8 col-xs-12 text-xs-center text-right">
				<span class="text-sm-center text-lg-right text-grey-3 d-block padding-top-5px">
                    Powered by <a href="https://www.frontsteps.com/" target="_blank"><img class="footerFrontsteplogo"  src="<?php echo get_template_directory_uri()?>/images/frontsteps-logo.png"></a>
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

