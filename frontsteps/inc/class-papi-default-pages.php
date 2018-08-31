<?php

/**
 * Class Papi_Default_Pages
 * 
 * Generate the default pages when called through /papi.init
 */
class Papi_Default_Pages {
	const MENU_NAME =			'Main Navigation Menu';
	const MENU_LOCATION =		'primary';
	
	const PARAM_DISPLAY_LOGS	= 'display';
	const DISPLAY_JSON			= 'json';
	const DISPLAY_HTML			= 'html';

	private static $default_pages = array (
		array (
			'title'		=> 'Home',
			'url'		=> '',
			'intid'		=> 'bapi_home',
			'parent'	=> null,
			'order'		=> 1,
			'template'	=> 'page-templates/front-page.php',
			'content'	=> '/default-content/home.php',
			'addtomenu'	=> true
		),
		array (
			'title'		=> 'For Rent',
			'url'		=> 'rentals',
			'intid'		=> 'bapi_forrent',
			'parent'	=> null,
			'order'		=> 2,
			'template'	=> 'page-templates/search-page.php',
			'content'	=> '[forrentpage]',
			'addtomenu'	=> true
		),
		array (
			'title'		=> 'For Sale',
			'url'		=> 'for-sale',
			'intid'		=> 'bapi_forsale',
			'parent'	=> null,
			'order'		=> 2,
			'template'	=> 'page-templates/search-page.php',
			'content'	=> '[forsalepage]',
			'addtomenu'	=> true
		),
		array (
			'title'		=> 'Contact',
			'url'		=> 'contact',
			'intid'		=> 'bapi_contact',
			'parent'	=> null,
			'order'		=> 4,
			'template'	=> 'page-templates/contact-page.php',
			'content'	=> '/default-content/contactus.php',
			'addtomenu'	=> true
		),
		array (
			'title'		=> 'About Us',
			'url'		=> 'about-us',
			'intid'		=> 'bapi_about_us',
			'parent'	=> null,
			'order'		=> 5,
			'template'	=> 'page-templates/aboutus-page.php',
			'content'	=> '/default-content/aboutus.php',
			'addtomenu'	=> true
		),	
		array (
			'title'		=> 'Blog',
			'url'		=> 'blog',
			'intid'		=> 'bapi_blog',
			'parent'	=> 'company',
			'order'		=> 7,
			'template'	=> '',
			'content'	=> '',
			'addtomenu'	=> false
		),
		array (
			'title'		=> 'Privacy Policy',
			'url'		=> 'privacypolicy',
			'intid'		=> 'bapi_privacy_policy',
			'parent'	=> null,
			'order'		=> 13,
			'template'	=> 'page-templates/full-width.php',
			'content'	=> '/default-content/privacypolicy.php',
			'addtomenu'	=> false
		),
		array (
			'title'		=> 'Terms of Use',
			'url'		=> 'termsofuse',
			'intid'		=> 'bapi_tos',
			'parent'	=> null,
			'order'		=> 14,
			'template'	=> 'page-templates/full-width.php',
			'content'	=> '/default-content/termsofuse.php',
			'addtomenu'	=> false
		)
	);
	private static $logs = array();


	/**
	 * End point of papi.init
	 * The success/error logs are either echo in JSON or HTML (default JSON) according to the get param passed
	 */
	static public function url_handler() {
		
		if( strtolower( get_relative( $_SERVER['REQUEST_URI'] ) ) !== '/papi.init' ) {
			return;
		}
		
		if( !is_int( $menu_id = self::init_menu() ) ) {
			self::log( false, 'Unable to initialize the menu', array( 'menu_id' => $menu_id ) );
			self::render_logs_json();
		}
		
		foreach ( self::$default_pages as $page_info ) {

			if( !is_array( $post = self::add_page( $page_info ) ) ) {
				self::log( false, 'Unable to create/update page <b>' . $page_info[ 'title' ] . '</b>' , array( 'error' => $post ) );
				continue;
			}
			self::log( true, 'Page <b>' . $page_info[ 'title' ] . '</b> succssefuly created/updated.' );
			
			if(
				$page_info[ 'addtomenu' ] &&
				!self::is_in_nav_menu( $menu_id, $post[ 'ID' ] )
			) {
				if( !is_int( $menu_item_id = self::add_page_to_nav_menu( $menu_id, $post, $page_info[ 'parent' ] ) ) ) {
					self::log( false, 'Unable to add page <b>' . $page_info[ 'title' ] . '</b> to navigation menu' , array( 'menu_id' => $menu_id, 'post' => $post ) );
				}
				else {
					self::log( true, 'Page <b>' . $page_info[ 'title' ] . '</b> succssefuly added to navigation menu.' );
				}
			}

		}
		self::render_logs_json();
	}

	/**
	 * Test the existence of the menu, create it if needed and return it's id
	 * 
	 * @param string $menu_name
	 * @param string $menu_location
	 *
	 * @return int|null
	 */
	static private function init_menu( $menu_name = self::MENU_NAME, $menu_location = self::MENU_LOCATION ) {
		// Check if the menu exist
		if(
			!is_object( $nav_menu = wp_get_nav_menu_object( $menu_name ) ) ||
			is_wp_error( $nav_menu ) ||
			!is_string( $nav_menu->taxonomy ) ||
			'nav_menu' !== $nav_menu->taxonomy ||
			!is_int( $menu_id = $nav_menu->term_id )
		) {
			// Create the menu if it doesn't exist
			if( !is_int( $menu_id = wp_create_nav_menu( $menu_name ) ) ) {
				return null;
			}
		}

		if( !has_nav_menu( $menu_location ) ){
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations[ $menu_location ] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		return $menu_id;
	}

	/**
	 * Add a new post type page, with all the needed information, content etc..
	 * The default content/info of pages are defined in $default_pages
	 * The 'content' parameter of $default_pages accept short codes.
	 * Return a post array or a string in case of error
	 * 
	 * @param $page_info
	 *
	 * @return array|string
	 */
	static private function add_page( $page_info ) {
		// Post default values
		$post = array(
			'menu_order'		=>  $page_info[ 'order' ],
			'post_title'		=>  $page_info[ 'title' ],
			'post_status'		=>  'publish',
			'comment_status'	=>  'closed',
			'post_type'			=>  'page',
		);
		
		// Set the post name 
		if(
			is_string( $page_info[ 'url' ] ) &&
			strlen( $page_info[ 'url' ] )
		) {
			$post[ 'post_name' ] = $page_info[ 'url' ];
		}
		
		// Get the parent id if a parent is defined
		if(
			is_string( $page_info[ 'parent' ] ) &&
			strlen( $page_info[ 'parent' ] ) &&
			
			is_a( ( $parent_post = get_page_by_path( $page_info[ 'parent' ], ARRAY_A ) ), 'WP_Post' ) &&
			is_int( $parent_post[ 'ID' ] )
		) {
			$post[ 'post_parent' ] = $parent_post[ 'ID' ];
		}
		
		// Set the default content if provided
		if(
			is_string( $page_info[ 'content' ] ) &&
			strlen( $page_info[ 'content' ] )
		) {
			// Check if the content is a shortcode
			if( preg_match( '#^\[[\w\s="]*\]$#i', $page_info[ 'content' ] ) ) {
				$post[ 'post_content' ] = $page_info[ 'content' ];
			}
			else {
				bapi_wp_site_options();/* we need to call this function so the $bapi_all_options gets populated */
				$mustache = new Mustache_Engine();
				
				if( !is_array( $datas = getpapisolutiondata() ) ) {
					return 'Unable to retrieve solution/site datas' . print_r( $datas, true );
				}
				
				// First check if the dafault file is overwritten by the theme
				if(
					!file_exists( get_template_directory() . DIRECTORY_SEPARATOR . $page_info[ 'content' ] ) ||
					!is_string( $template = file_get_contents( get_template_directory() . DIRECTORY_SEPARATOR . $page_info[ 'content' ] ) ) ||
					!is_string( $content = $mustache->render( $template, $datas ) )
				) {
					if(
						!file_exists(  get_papi_plugin_path( $page_info[ 'content' ] ) ) ||
						!is_string( $template = file_get_contents( get_papi_plugin_path( $page_info[ 'content' ] ) ) ) ||
						!is_string( $content = $mustache->render( $template, $datas ) )
					) {
						return print_r( array( $datas, $template, $content, get_papi_plugin_path( $page_info[ 'content' ] ) ), true );
					}
				}
				
				$post[ 'post_content' ] = str_replace( array( "\t", "\n", "\r" ), '', $content );
			}
		}
		
		// try to find if this page already exists
		if( !is_int( $post[ 'ID' ] = self::get_page_id( $page_info[ 'parent' ], $page_info[ 'url' ], $page_info[ 'title' ] ) ) ) {
			if( !is_int( $post[ 'ID' ] = wp_insert_post( $post, true ) ) ) {
				return 'Error insert: ' . print_r( $post[ 'ID' ], true );
			}
		}
		else {
			if( !is_int( $ret = wp_update_post( $post, true ) ) ) {
				return 'Error update: ' . print_r( $ret, true );
			}
		}
		
		
		add_post_meta( $post[ 'ID' ], 'bapi_page_id', $page_info[ 'intid' ], true );
		if( file_exists( get_template_directory() . DIRECTORY_SEPARATOR . $page_info[ 'template' ] ) ) {
			update_post_meta( $post[ 'ID' ], '_wp_page_template', $page_info[ 'template' ] );
		}
		
		if( $post[ 'post_title' ] === 'Home' ) {
			update_option( 'page_on_front', $post[ 'ID' ] );
			update_option( 'show_on_front', 'page' );
		}
		elseif( $post[ 'post_title' ] === 'Blog' ) {
			update_option( 'page_for_posts', $post[ 'ID' ] );
		}
		
		return $post;
	}

	/**
	 * Test the existence of a page and return its id or nul
	 * 
	 * @param $parent_page
	 * @param $page_url
	 * @param $page_title
	 *
	 * @return int|null
	 */
	static private function get_page_id( $parent_page, $page_url, $page_title ) {

		if(
			is_a( ( $page = get_page_by_path( $parent_page . '/' . $page_url ) ), 'WP_Post' ) &&
			is_int( $page->ID )
		) {
			return $page->ID;
		}
		
		if(
			is_a( ( $page = get_page_by_title( $page_title ) ), 'WP_Post' ) &&
			is_int( $page->ID )
		) {
			return $page->ID;
		}
		
		return null;
	}

	/**
	 * Test whether a page id is part of a menu
	 * 
	 * @param $menu_id
	 * @param $page_id
	 *
	 * @return bool
	 */
	static private function is_in_nav_menu( $menu_id, $page_id ) {
		if( !is_array( $menu_items = wp_get_nav_menu_items( $menu_id ) ) ) {
			return false;
		}
		
		foreach( $menu_items as $item ) {
			if( $item->object_id == $page_id ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Add a page to a navigation menu
	 * 
	 * @param $menu_id
	 * @param $post
	 * @param $parent
	 *
	 * @return int|null|WP_Error
	 */
	static private function add_page_to_nav_menu( $menu_id, $post, $parent ) {
		global $navmap;
		$menu_item = array(
			'menu-item-title'		=> $post[ 'post_title' ],
			'menu-item-object'		=> 'page',
			'menu-item-object-id'	=> $post[ 'ID' ],
			'menu-item-type'		=> 'post_type',
			'menu-item-status'		=> 'publish',
			'menu-item-position'	=> $post[ 'menu_order' ]
		);
		
		// Check if there is a parent
		if(
			is_array( $navmap ) &&
			is_string( $parent ) &&
			strlen( $parent ) &&
			is_int( $navmap[ $parent ] )
		) {
			$menu_item[ 'menu-item-parent-id' ] = $navmap[ $parent ];
		}
		
		if( !is_int( $menu_item_id = wp_update_nav_menu_item( $menu_id, 0, $menu_item ) ) ) {
			return null;
		}
		
		$navmap[ $post[ 'post_name' ] ] = $menu_item_id;
		
		return $menu_item_id;
	}

	/**
	 * Stores the execution logs into the array $logs
	 * 
	 * @param $success
	 * @param $msg
	 * @param null $data
	 */
	static private function log( $success, $msg, $data = null ) {
		$log = array(
			'success'	=> $success,
			'msg'		=> $msg
		);

		if( is_array( $data ) ) {
			$log[ 'data' ] = $data;
		}

		self::$logs[] = $log;
	}

	/**
	 * Render the logs contained in $logs in JSON or HTML (default JSON) according to the get param passed and exit
	 */
	static private function render_logs_json() {
		if(
			!is_string( $_GET[ self::PARAM_DISPLAY_LOGS ] ) ||
			self::DISPLAY_JSON === $_GET[ self::PARAM_DISPLAY_LOGS ]
		) {
			header( 'Content-Type: application/json' );
			echo json_encode( self::$logs );
			exit();
		}

		//TODO see the following, it's in case the website is accessed before default pages are created,
		//TODO we could maybe automatically re-direct the site to the home page if there are not error (every log has success = true)
		echo '<table>';
		echo '<tr><th>Success</th><th>Message</th></tr>';
		foreach ( self::$logs as $log ) {
			echo '<tr><td>' . $log[ 'success' ] . '</td><td>' . $log[ 'msg' ] . '</td></tr>';
		}
		echo '</table>';
		echo '<br><h2><a href="' . get_home_url() . '">Home Page</a></h2>';
		exit();
	}
 }
