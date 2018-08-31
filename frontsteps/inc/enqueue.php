<?php
/**
 * Frontsteps enqueue scripts
 *
 * @package frontsteps
 */

if ( ! function_exists( 'frontsteps_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function frontsteps_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		wp_enqueue_style( 'vendor-bootstrap', get_template_directory_uri() . '/inc/vendor/bootstrap/bootstrap.min.css');
		/*$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/style.css');
		wp_enqueue_style( 'frontsteps-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), $css_version );*/
		wp_enqueue_style( 'vendor-fontawesome', get_template_directory_uri() . '/inc/vendor/font-awesome/css/font-awesome.css');

		wp_enqueue_style( 'gallery_css', get_template_directory_uri() . '/inc/gallery.css');

		wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/inc/custom.css');
		wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri() . '/style.css');

		//wp_enqueue_script( 'jquery');
		
		wp_enqueue_script( 'latest-jquery',get_template_directory_uri() . '/js/jquery-2.2.0.min.js',array(), "", true );
		if( is_front_page() )
    	{
	        wp_enqueue_script( 'frontsteps-slickjs', get_template_directory_uri() . '/js/slick.js', array(), $js_version, true );
    	}

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/vendor/bootstrap/bootstrap.min.js', array(), "", true );
		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/custom.js');
		wp_enqueue_script( 'frontsteps-scripts', get_template_directory_uri() . '/js/custom.js', array(), $js_version, true );
		wp_enqueue_script( 'frontsteps-gallery', get_template_directory_uri() . '/js/page-gallery.js', array(), "", true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
} // endif function_exists( 'frontsteps_scripts' ).

add_action( 'wp_enqueue_scripts', 'frontsteps_scripts' );

function frontsteps_login_logo() { 
	?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_template_directory_uri() . '/img/dashbord-logo.png';?>);
			background-size:auto auto;
            width:auto;
        }
        body.login h1 a {
    		height: 30px;
    	}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'frontsteps_login_logo', 11 );

add_filter( 'login_headerurl', 'frontsteps_admin_logo_url' );
function frontsteps_admin_logo_url($url) {
    return 'https://www.frontsteps.com/';
}

add_filter( 'login_headertitle', 'frontsteps_admin_logo_title' );
function frontsteps_admin_logo_title($title) {
    return 'Frontsteps Websites - Powered by Frontsteps';
}

function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function home_accrediation_carasol() {
  if( is_front_page() ){
?>
<script type="text/javascript">
jQuery(document).ready(function(){
  
  	if (jQuery(".section-accredidations").length > 0)
  	{
	  jQuery('.accredidations-logos').slick({
	    slidesToShow: 5,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 1000,
	    arrows: false,
	    dots: false,
	    pauseOnHover: false,
	    responsive: [{
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 4
	      }
	    }, {
	      breakpoint: 520,
	      settings: {
	        slidesToShow: 3
	      }
	    }]
	  });
	}

if (jQuery(".section-home-hero-slider").length > 0)
{
// Homes Slideshow Slider & Similar Homes
    var basicSlider = $("#home-hero-gallery");
    basicSlider.royalSlider({
        autoScaleSlider: true,
        autoScaleSliderWidth: 1440,
        autoScaleSliderHeight: 728,
        fullscreen: {
            enabled: false,
            nativeFS: true
        },
        controlNavigation: 'none',
        loop: true,
        imageScaleMode: 'fill',
        transitionType: 'fade',
        imageScalePadding: 0,
        slidesSpacing: 0,
        navigateByClick: true,
        allowCSS3: true,
        autoPlay: {
            enabled: true,
            pauseOnHover: false,
            delay: 5000
        },
        numImagesToPreload: 2,
        arrowsNav: true,
        arrowsNavAutoHide: true,
        arrowsNavHideOnTouch: false,
        keyboardNavEnabled: true,
        fadeinLoadedSlide: true,
        globalCaption: true,
        globalCaptionInside: true,
        thumbs: {
            appendSpan: true,
            firstMargin: false,
            slidesSpacing: 0,
            paddingBottom: 0,
            paddingTop: 0,
            firstMargin: 0,
            spacing: 1
        }
    });
}    

});
</script>
<?php
  }
}
add_action( 'wp_footer', 'home_accrediation_carasol',99);