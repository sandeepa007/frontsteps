<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package frontsteps
 */

$container = get_theme_mod( 'frontsteps_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php $faviconUrl = get_theme_mod('site-favicon', get_template_directory_uri() . '/img/favicons/favicon.png'); 
		echo '<link rel="apple-touch-icon" href="'.$faviconUrl.'">';
    	echo '<link rel="shortcut icon" type="image/png" href="'.$faviconUrl.'" />';
	?>

	<?php 
	wp_head(); 
	$colortext = "#FFF";
	$colorbkg1 ="#98C97E";
	$colorbkg2 ="#E3860A";
	if(get_theme_mod( 'cta-text-color' )!=""){
		$colortext = get_theme_mod( 'cta-text-color' );
	}
	if(get_theme_mod( 'cta-bkg-color' )!=""){
		$colorbkg1 = get_theme_mod( 'cta-bkg-color' );
	}
	if(get_theme_mod( 'cta-bkg-color-2' )!=""){
		$colorbkg2 = get_theme_mod( 'cta-bkg-color-2' );
	}
	?>
	<style type="text/css">

		.section-testimonials, .section-cta,
		.cta_bg_img .col-xs-12.col-sm-6.col-sm-offset-3  {		  
		  background-image: linear-gradient(to right, <?php echo $colorbkg1;?>,  <?php echo $colorbkg2;?>);
		  color:<?php echo $colortext;?>;
		  padding: 40px 0px!important;
		}
		.section-cta .button-primary, .section-cta a.button-primary{
			background: #fff;
			color:<?php echo $colorbkg1;?>;
		}	
		.section-cta .button-primary:hover, .section-cta a.button-primary:hover{
			background: #fff;
			color:<?php echo $colorbkg2;?>;
		}
		/*.page-template-front-page .section-cta
		{
			background:transparent;
		   color:transparent;
		}
		.page-template-front-page .section-cta .button-primary, .section-cta a.button-primary{
			background: transparent;
			color:transparent;
		}
		.page-template-front-page .section-cta .button-primary:hover, .section-cta a.button-primary:hover{
			background: transparent;
			color:transparent;
		}*/
		
	</style>
</head>

<body <?php body_class(); ?>>

<!-- Header -->
<header id="header">

   <!-- Logo & Nav Banner -->
   <div class="container container-full relative clearfix">

      <div class="logo-column">

      	<!-- Your site title as branding in the menu -->
						<?php if ( ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="navbar-brand custom-logo-link"><?php bloginfo( 'name' ); ?></a>

							<?php else : ?>

								<a class="d-inline-block margin-tb-10px navbar-brand custom-logo-link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

							<?php endif; ?>


						<?php } else {
							the_custom_logo();
						} ?><!-- end custom logo -->

         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu">
               <span class="sr-only animated-normal">Toggle navigation</span>
               <span class="icon-bar top-bar"></span>
               <span class="icon-bar middle-bar"></span>
               <span class="icon-bar bottom-bar"></span>
            </button>
         </div>
         <div class="clear"></div>
      </div>

      <div class="navigation-column" >
         <div role="navigation" class="navbar navbar-default">                
            <div class="navbar-collapse collapse no-padding" id="mobile-menu">
               <?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'menu_class'      => 'nav navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'menu-main',
								'depth'           => 2,
								'walker'          => new Frontsteps_WP_Bootstrap_Navwalker(),
							)
						); ?>
            </div>
         </div>
      </div>
        
	</div>
   <!-- Logo & Nav Banner -->
</header>
<!-- Header -->
<!-- Main Container -->
<div class="main-container">