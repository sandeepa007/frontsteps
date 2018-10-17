<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package frontsteps
 */

add_filter( 'body_class', 'frontsteps_body_classes' );

if ( ! function_exists( 'frontsteps_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function frontsteps_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'frontsteps_adjust_body_class' );

if ( ! function_exists( 'frontsteps_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function frontsteps_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'frontsteps_change_logo_class' );

if ( ! function_exists( 'frontsteps_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function frontsteps_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"' , $html );

		return $html;
	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists ( 'frontsteps_post_nav' ) ) {
	function frontsteps_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
				<nav class="container navigation post-navigation">
					<h2 class="sr-only"><?php _e( 'Post navigation', 'frontsteps' ); ?></h2>
					<div class="row nav-links justify-content-between">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'frontsteps' ) );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next">%link</span>',     _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'frontsteps' ) );
							}
						?>
					</div><!-- .nav-links -->
				</nav><!-- .navigation -->

		<?php
	}
}

/* Custom Instasite Dashboard */

function frontsteps_welcome_panel() {
/*
 Hide the defaul welcome message and put the custom Instansite block.
*/
?>
<script type="text/javascript">
/* Hide default welcome message */
jQuery(document).ready( function($)
{
	$('#wpbody .wrap h1:first-child').prepend('<img src="<?php echo get_template_directory_uri();?>/img/dashbord-logo.png" align="absbottom" />&nbsp;');
	$('#welcome-panel .welcome-panel-content-custom h2').prepend('<img src="<?php echo get_template_directory_uri();?>/img/dashbord-logo-white.png" /><br>');
	$('#welcome-panel .welcome-panel-content').hide();
	$('#welcome-panel .welcome-panel-close').hide();
	$('#welcome-panel.custom .welcome-panel-close').show();

});
</script>
<div id="welcome-panel" class="welcome-panel custom">
		<?php wp_nonce_field( 'welcome-panel-nonce', 'welcomepanelnonce', false ); ?>
        <div class="btn-close">
		<a class="welcome-panel-close" href="<?php echo esc_url( admin_url( '?welcome=0' ) ); ?>"><?php _e( 'Close' ); ?></a>
		</div>
        <div class="welcome-panel-content-custom">
        <h2><?php _e( ( 'Welcome To Your Frontsteps Site!' ) ); ?></h2>
        <p class="about-description"><?php _e( 'If this is your first time here, review the sections below for more information on setting up and customizing your site.' ); ?><br /><?php _e( 'If you are tired of seeing this message simply close it at the top right.' ); ?></p>
        </div>
</div>
<?php
}
add_action( 'welcome_panel', 'frontsteps_welcome_panel' );

function frontsteps_dashboard_custom_footer() {
		return; // Do not display the footer fo the newapp users
}
add_filter( 'admin_footer_text', 'frontsteps_dashboard_custom_footer' );

function hide_dashboard_metabox() {
/* Put off the wordpress dashboard default metabox*/
   $hide = array(
      0 => 'dashboard_recent_comments',
      1 => 'dashboard_incoming_links',
      2 => 'dashboard_activity',
      3 => 'dashboard_quick_press',
      4 => 'dashboard_primary',
      5 => 'dashboard_secondary',
	  6 => 'dashboard_recent_drafts',
	  7 => 'dashboard_right_now',
	  8 => 'wpe_dify_news_feed',
	  
   );
   return $hide;
}
add_filter('get_user_option_metaboxhidden_dashboard', 'hide_dashboard_metabox', 1);

function frontsteps_register_dashboard_metabox() {
/* Add the custom Instansite Metaboxes */
	global $wp_meta_boxes;
	  add_meta_box('bapi-gs', 'Getting Started', 'register_started_box', 'dashboard', 'normal', 'high');
	  add_meta_box('bapi-action', 'Advanced Actions', 'register_action_box', 'dashboard', 'side', 'high');
	  add_meta_box('bapi-tips', 'Helpful Links', 'register_tips_box', 'dashboard', 'side', 'high');
	  wp_enqueue_style( 'custom-dashboard', get_template_directory_uri(). '/css/custom-dashboard.css');
	}
add_action('wp_dashboard_setup', 'frontsteps_register_dashboard_metabox',2);

function register_started_box() {
/* Getting Started Metabox */
	$items = array(
				array( 'url' => admin_url( "themes.php" ),
					  'icon' => "welcome-icon dashicons-images-alt2",
					  'name' => "Choose your theme"
					),
				array( 'url' => admin_url( "/edit.php?post_type=member" ),
					  'icon' => "welcome-icon dashicons-groups",
					  'name' => "Add a Team Member"
					),
				array( 'url' => admin_url( "/edit.php?post_type=amenity" ),
					  'icon' => "welcome-icon dashicons-shield",
					  'name' => "Add a Amenities"
					),
				array( 'url' => admin_url( "/edit.php?post_type=resource" ),
					  'icon' => "welcome-icon dashicons-star-half",
					  'name' => "Add a Resource"
					),
				array( 'url' => admin_url( "/edit.php?post_type=accreditation" ),
					  'icon' => "welcome-icon dashicons-universal-access",
					  'name' => "Add a Accreditation"
					),
				array( 'url' => admin_url( "nav-menus.php" ),
					  'icon' => "welcome-icon dashicons-menu",
					  'name' => "Manage your menu"
					),
				array( 'url' => admin_url( "post-new.php?post_type=page" ),
					  'icon' => "welcome-icon dashicons-welcome-add-page",
					  'name' => "Add a page"
					)
			 );
	// Display the container
	echo '<div class="welcome-panel rss-widget custom">';
   echo '<ul>';
   for($i = 0; $i < count($items) ; $i++ ){
				echo '<li>';
				echo '<a href="' . $items[$i]['url'] . '" class="' . $items[$i]['icon'] . '">';
				echo $items[$i]['name'];
				echo '</a>';
				echo '</li>';
	}
	echo '<li><a class="button button-primary button-hero" href="'.home_url( '/' ).'" target="_blank">View your site</a></li>';
	echo '</ul></div>';
}

function register_action_box() {
/* Advanced Options Metabox */
	$items = array(
                array( 'url' => admin_url( "/customize.php"),
                      'icon' => "welcome-icon dashicons-admin-generic",
                      'name' => "Customize Theme"
                    ),
                array( 'url' => admin_url( "/admin.php?page=site_settings_sync"),
                      'icon' => "welcome-icon dashicons-screenoptions",
                      'name' => "Demo Import"
                    ),
            );
	// Display the container
	echo '<div class="welcome-panel rss-widget custom">';
echo '<ul>';
   for($i = 0; $i < count($items) ; $i++ ){
				echo '<li>';
				echo '<a href="' . $items[$i]['url'] . '" class="' . $items[$i]['icon'] . '">';
				echo $items[$i]['name'];
				echo '</a>';
				echo '</li>';
	}
	echo '</ul></div>';
?>
<?php
}
function register_tips_box() {
/* Tips Metabox */
	
	$items = array( 

				array(
					'url' => "https://www.frontsteps.com/support",
                    'icon' => "welcome-icon dashicons-editor-help",
                    'name' => "FRONTSTEPS Support",
                    ),
				array(
					'url' => "https://app.evercondo.com/login",
                    'icon' => "welcome-icon 
dashicons-admin-network",
                    'name' => "FRONTSTEPS Login",
                    )
             );
	// Display the container
	echo '<div class="welcome-panel rss-widget custom">';
		echo '<ul>';
   for($i = 0; $i < count($items) ; $i++ ){
				echo '<li>';
				echo '<a href="'.$items[$i]['url'].'" class="'.$items[$i]['icon'].'" target="_blank">';
				echo $items[$i]['name'];
				echo '</a>';
				echo '</li>';
	}
	echo '</ul></div>';
}

add_action( 'wp_dashboard_setup', 'frontsteps_add_dashboard_widget' );

function frontsteps_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'bapi_dashboard_widget',
        'How To Videos',
        'prefix_dashboard_widget',
        'prefix_dashboard_widget_handle'
    );
}

function prefix_dashboard_widget() {
    # get saved data
    if( !$widget_options = get_option( 'bapi_dashboard_widget_options' ) )
        $widget_options = array( );

    # default output
    $output = sprintf(
        '<h2 style="text-align:right">%s</h2>',
        __( 'Please, configure the widget ☝' )
    );
    $my_theme = wp_get_theme();	
	//echo $my_theme;

    # check if saved data contains content
    $saved_feature_post = isset( $widget_options['feature_post'] ) ? $widget_options['feature_post'] : false;

    if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic")
	{
		$output = '<ol>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/SpBaXIknB6Y">How to Login and Edit Header, Footer.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/ek5tusuGVLQ">How to Edit Site Colors and Fonts.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/pp8nQIhZw8o">Home Page - How to edit content and images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/Eo-QQboYyDw">About Page - How to edit content and images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/3X0h3iLNVak">Services page - How to edit content and images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/ZEgvP4l2bTM">Blogs - How to add and edit single Blog.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/CcsCBmwNllM">Resources Page - How to Add Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/gm0wsSsUcKM">Request a Proposal, Contact us page - How to edit Images and content.</a>
		    			</li>
		    			
    				</ol>';

	}
	else
	{
		
		$output = '<ol>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/_iHlzwI8JKo">How to Login and Edit Header, Footer.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/Yz8HhTGv9lg">How to Edit Colors and Fonts.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/BDPG4ntCb4A">Home Page - How to edit Content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/w2SGJUkL0kc">About us Page - How to Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/Ylzsq3LC4C8">Amenities Page - How to Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/kb2RKHIYM6w">Resources Page - How to Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/Ezvuwlr-GDY">Gallery Page - How to Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/W8oc95BVqTI">Contact us Page - How to Edit content and Images.</a>
		    			</li>
		    			<li>
		    				<a target="_blank" href="https://youtu.be/jFjD0pwP_KA">How to Add  New - Board of Directors, Employees, Amenities, Resources.</a>
		    			</li>
    			</ol>';

	}

    echo "<div class='feature_post_class_wrap'>
        		<label style='background:#ccc;'>$output</label>
    		</div>
    ";
}
// To hide update notifications to non-admin users
function hide_update_notice_to_non_admin_users()
{
    if(!is_super_admin() )
		{
 			remove_action( 'admin_notices', 'update_nag', 3 );
 			remove_action( 'network_admin_notices', 'update_nag', 3 );
 		}
}

function frontsteps_create_menu() {
	
	$parentSlug = '#';

	//create new top-level menu
	add_menu_page( ( 'Frontsteps sites Settings' ), ( 'Frontsteps' ), 'administrator', $parentSlug, '', get_template_directory_uri().'/img/fs-icon.png');
	
	add_submenu_page( $parentSlug, 'Install Demo Data','Install Demo Data','administrator','site_settings_sync',function(){ require get_template_directory().'/inc/setup-sync.php';} );

	//add_submenu_page( $parentSlug, 'Import Communities','Import Communities','administrator','site_import_communities',function(){ require get_template_directory().'/inc/import-communities.php';} );
	
}
add_action('admin_menu', 'frontsteps_create_menu');

?>