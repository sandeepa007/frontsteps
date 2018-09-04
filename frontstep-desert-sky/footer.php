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
<?php if (!is_front_page() && get_page_template_slug() != "page-templates/contact-page.php") :
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
<?php wp_footer(); ?>
<footer>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12 col-sm-6">
            <div class="company-details">
               	<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
	            	<?php dynamic_sidebar( 'footer-left' ); ?>
	    		<?php endif; ?>
				<p></p>
               	<div class="social-block">
               		<?php if(get_theme_mod( 'url-facebook' )) { ?>
					<a class="facebook fa fa-facebook" href="<?php echo get_theme_mod( 'url-facebook' )?>"><i class="">Facebook</i></a>
					<?php } ?>
					<?php if(get_theme_mod( 'url-youtube' )) { ?>
					<a class="youtube fa fa-youtube" href="<?php echo get_theme_mod( 'url-youtube' )?>"><i class="">Youtube</i></a>
					<?php } ?>
					<?php if(get_theme_mod( 'url-linkedin' )) { ?>
					<a class="linkedin fa fa-linkedin" href="<?php echo get_theme_mod( 'url-linkedin' )?>"><i class="">Linkedin</i></a>
					<?php } ?>
					<?php if(get_theme_mod( 'url-google' )) { ?>
					<a class="google fa fa-google-plus" href="<?php echo get_theme_mod( 'url-google' )?>"><i class="">Google</i></a>
					<?php } ?>
					<?php if(get_theme_mod( 'url-twitter' )) { ?>
					<a class="twitter fa fa-twitter" href="<?php echo get_theme_mod( 'url-twitter' )?>"><i class="">Twitter</i></a>
					<?php } ?>
					<?php if(get_theme_mod( 'url-blog' )) { ?>
					<a class="rss fa fa-rss" href="<?php echo get_theme_mod( 'url-blog' )?>"><i class="" aria-hidden="true">Blog</i></a>
					<?php } ?>               
               	</div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6">
            <div class="credits">
               <p>Powered by <a href="#" target="_blank"><img class="footerFrontsteplogo"  src="<?php echo get_template_directory_uri()?>/images/frontsteps-logo.png"></a></p>
            </div>
         </div>
         <div class="col-xs-12">
            <div class="footer-menu">
               <div class="widget">
               		<div class="menu-footer-menu-container">
               			<ul id="menu-footer-menu" class="menu">
               				<li id="menu-item-146" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146">	<a href="#">Privacy Policy</a>
               				</li>
               				<li id="menu-item-147" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-147">	<a href="#">Terms</a>
               				</li>
               			</ul>
               		</div>
               	</div>            
            </div>
         </div>
      </div>
   </div>
</footer>





</div>
<!-- Main Container -->
<script src='<?php echo get_stylesheet_directory_uri(); ?>/js/owl-slider.js'></script>
<?php if (is_front_page()) :?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/page-home.js"></script>    
<?php endif; ?>
<link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/css/owl-slider.css' type='text/css' media='all' />
</body>

</html>

