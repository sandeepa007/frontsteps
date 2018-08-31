<?php 
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
	include_once( $parse_uri[0] . 'wp-admin/includes/media.php' );
	include_once( $parse_uri[0] . 'wp-admin/includes/file.php' );
	include_once( $parse_uri[0] . 'wp-admin/includes/image.php' );
		
	
	// Home page creation
	$home_page_id = get_option("home_page_id");
	
	if (!$home_page_id) {
		$home_post = array(
			'post_title' => "Home",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$homeID = wp_insert_post($home_post, $error);
		update_post_meta($homeID, "_wp_page_template", "page-templates/front-page.php");
		update_option("home_page_id", $homeID);
		update_option( 'page_on_front', $homeID );
		update_option( 'show_on_front', 'page' );
	}

	// About page creation
	$about_page_id = get_option("about_page_id");
	if (!$about_page_id) {
		$about_post = array(
			'post_title' => "About",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$aboutID = wp_insert_post($about_post, $error);
		update_post_meta($aboutID, "_wp_page_template", "page-templates/aboutus-page.php");
		update_option("about_page_id", $aboutID);
	}

	// Resources page creation
	$resources_page_id = get_option("resources_page_id");
	if (!$resources_page_id) {
		$resourc_post = array(
			'post_title' => "Resources",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$resourcesID = wp_insert_post($resourc_post, $error);
		update_post_meta($resourcesID, "_wp_page_template", "page-templates/resources-page.php");
		update_option("resources_page_id", $resourcesID);
	}

	// Amenties page creation
	$amenties_page_id = get_option("amenties_page_id");
	if (!$amenties_page_id) {
		$amenties_post = array(
			'post_title' => "Amenities",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$amentyID = wp_insert_post($amenties_post, $error);
		update_post_meta($amentyID, "_wp_page_template", "page-templates/amenties-page.php");
		update_option("amenties_page_id", $amentyID);
	}

	

	// Gallery page creation
	$gallery_page_id = get_option("gallery_page_id");
	if (!$gallery_page_id) {
		$gallery_post = array(
			'post_title' => "Gallery",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$galleryID = wp_insert_post($gallery_post, $error);
		update_post_meta($galleryID, "_wp_page_template", "page-templates/gallery-page.php");
		update_option("gallery_page_id", $galleryID);
	}

	// Contact page creation
	$contact_page_id = get_option("contact_page_id");
	if (!$contact_page_id) {
		$contact_post = array(
			'post_title' => "Contact",
			'post_content' => "",
			'post_status' => "publish",
			'post_type' => 'page',
			);
		
		$contactID = wp_insert_post($contact_post, $error);
		update_post_meta($contactID, "_wp_page_template", "page-templates/contact-page.php");
		update_option("contact_page_id", $contactID);
	}

	$my_theme = wp_get_theme();
	if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
	{

		// Communities page creation
		$communities_page_id = get_option("communities_page_id");
		if (!$communities_page_id) {
			$blog_post = array(
				'post_title' => "Communities",
				'post_content' => "",
				'post_status' => "publish",
				'post_type' => 'page',
				);
			
			$communitiesID = wp_insert_post($blog_post, $error);
			update_post_meta($communitiesID, "_wp_page_template", "page-templates/communities-page.php");
			update_option("communities_page_id", $communitiesID);
		}

		// Blog page creation
		$blog_page_id = get_option("blog_page_id");
		if (!$blog_page_id) {
			$blog_post = array(
				'post_title' => "Blog",
				'post_content' => "",
				'post_status' => "publish",
				'post_type' => 'page',
				);
			
			$blogID = wp_insert_post($blog_post, $error);
			update_post_meta($blogID, "_wp_page_template", "page-templates/blog-page.php");
			update_option("blog_page_id", $blogID);
		}

	}


	// Create custom menu
	$menuname = 'Main Menu';
	$primrymenulocation = 'primary';
	// Does the menu exist already?
	$menu_exists = wp_get_nav_menu_object( $menuname );

	// If it doesn't exist, let's create it.
	if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menuname);

    // Set up default BuddyPress links and add them to the menu.
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Home'),
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('About'),
        'menu-item-classes' => '',
        'menu-item-url' => home_url( '/about/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Resources'),
        'menu-item-classes' => '',
        'menu-item-url' => home_url( '/resources/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Amenities'),
        'menu-item-classes' => '',
        'menu-item-url' => home_url( '/amenities/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Gallery'),
        'menu-item-classes' => 'forums',
        'menu-item-url' => home_url( '/gallery/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Contact'),
        'menu-item-classes' => '',
        'menu-item-url' => home_url( '/contact/' ), 
        'menu-item-status' => 'publish'));

	    // Grab the theme locations and assign our newly-created menu
	    if( !has_nav_menu( $primrymenulocation ) ){
	        $locations = get_theme_mod('nav_menu_locations');
	        $locations[$primrymenulocation] = $menu_id;
	        set_theme_mod( 'nav_menu_locations', $locations );
	    }
	}

	// Create custom right menu
	$rmenuname = 'Header Right Menu';
	$rightmenulocation = 'right_menu';
	// Does the menu exist already?
	$rmenu_exists = wp_get_nav_menu_object( $rmenuname );

	// If it doesn't exist, let's create it.
	if( !$rmenu_exists){
    $rmenu_id = wp_create_nav_menu($rmenuname);

    // Set up default BuddyPress links and add them to the menu.
    wp_update_nav_menu_item($rmenu_id, 0, array(
        'menu-item-title' =>  __('Pay Online'),
        'menu-item-url' => '#',
        'menu-item-classes' => '',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($rmenu_id, 0, array(
        'menu-item-title' =>  __('Login'),
        'menu-item-classes' => 'login',
        'menu-item-url' => '#', 
        'menu-item-status' => 'publish'));

    // Grab the theme locations and assign our newly-created menu
	    if( !has_nav_menu( $rightmenulocation ) ){
	        $locations = get_theme_mod('nav_menu_locations');
	        $locations[$rightmenulocation] = $rmenu_id;
	        set_theme_mod( 'nav_menu_locations', $locations );
	    }
	}

	// Create custom footer menu
	$fmenuname = 'Footer Menu';
	$fmenulocation = 'footer_menu';
	// Does the menu exist already?
	$fmenu_exists = wp_get_nav_menu_object( $fmenuname );

	// If it doesn't exist, let's create it.
	if( !$fmenu_exists){
    $fmenu_id = wp_create_nav_menu($fmenuname);

    // Set up default BuddyPress links and add them to the menu.
    wp_update_nav_menu_item($fmenu_id, 0, array(
        'menu-item-title' =>  __('Privacy Policy'),
        'menu-item-url' => '#',
        'menu-item-classes' => '',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($fmenu_id, 0, array(
        'menu-item-title' =>  __('Terms'),
        'menu-item-classes' => 'login',
        'menu-item-url' => '#', 
        'menu-item-status' => 'publish'));

    // Grab the theme locations and assign our newly-created menu
	    if( !has_nav_menu( $fmenulocation ) ){
	        $locations = get_theme_mod('nav_menu_locations');
	        $locations[$fmenulocation] = $fmenu_id;
	        set_theme_mod( 'nav_menu_locations', $locations );
	    }
	}

	// Create Custom Posts
	global $user_ID;
	
	for($i=1 ;$i<=6 ;$i++)
	{
		// Create Demo Team posts
		$new_team_post = array(
	    'post_title' => 'Member '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'member',
		);
		$team_post_id = wp_insert_post($new_team_post);
		$member_type = array ('member_board_of_directors','member_employee');
		wp_set_object_terms($team_post_id,$member_type,'member_type');

		// Create Demo Amenity posts
		$new_amnty_post = array(
	    'post_title' => 'Amenity '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'amenity',
		);
		$amnt_post_id = wp_insert_post($new_amnty_post);

		// Create Demo Resource posts
		$new_rsource_post = array(
	    'post_title' => 'Resource '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'resource',
		);
		$rsource_post_id = wp_insert_post($new_rsource_post);

		// Create Demo Testimonial posts
		$new_testimonial_post = array(
	    'post_title' => 'Testimonial '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'testimonial',
		);
		$testmnila_post_id = wp_insert_post($new_testimonial_post);

		// Create Demo Service posts
		$new_service_post = array(
	    'post_title' => 'Service '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'service',
		);
		$service_post_id = wp_insert_post($new_service_post);

		// Create Demo Community posts
		$new_community_post = array(
	    'post_title' => 'Community '.$i,
	    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at felis vitae velit scelerisque laoreet. Maecenas a fringilla leo, et malesuada dolor. Ut feugiat laoreet dui, sed suscipit ligula sodales non. Sed ultricies massa eu ante facilisis, in molestie justo dapibus. Nullam ex massa, ornare nec dolor vitae, congue semper massa. Nullam dui ipsum, blandit nec dui tristique, tincidunt condimentum eros. In hac habitasse platea dictumst.',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'community',
		);
		$community_post_id = wp_insert_post($new_community_post);
		update_post_meta($community_post_id,"community","a:1:{s:3:'url';s:9:'#';}");

		// Create Demo Accreditation posts
		$new_accrd_post = array(
	    'post_title' => 'Accreditation '.$i,
	    'post_content' => '',
	    'post_status' => 'publish',
	    'post_date' => date('Y-m-d H:i:s'),
	    'post_author' => $user_ID,
	    'post_type' => 'accreditation',
		);
		$accred_post_id = wp_insert_post($new_accrd_post);

	}

	$uploadfile = get_template_directory_uri()."/img/placeholder-logo.png";
	$herohome = get_template_directory_uri()."/img/hero-home.jpg";
	$heroabout = get_template_directory_uri()."/img/about-hero-bg.jpg";
	$heroresources = get_template_directory_uri()."/img/resources-hero-bg.jpg";
	$heroramenities = get_template_directory_uri()."/img/amenities-hero-bg.jpg";
	$herorcontact = get_template_directory_uri()."/img/contact-hero-bg.jpg";
	
	$media_id = media_sideload_image( $uploadfile,'','','src');
	//$homehero_id = media_sideload_image( $herohome,'','','src');
	
	global $wpdb;
  	
  	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$media_id'";
  	$logo_id = $wpdb->get_var($query);

  	/*$query1 = "SELECT ID FROM {$wpdb->posts} WHERE guid='$homehero_id'";
  	$homehero_name = $wpdb->get_var($query1);*/
  	
	
	// insert default values in cutomization
	set_theme_mod('primary-color', '#4CBDD7');
	set_theme_mod('secondary-color', '#428FBB');
	set_theme_mod('tertiary-color', '#67afe1');
	set_theme_mod('text-color', '#33343C');
	set_theme_mod('body-color', '#FFFFFF');
	set_theme_mod('anchore-color', '#2D3340');
	set_theme_mod('anchore-hover-color', '#4ABDD9');
	set_theme_mod('button-color', '#FFFFFF');
	set_theme_mod('button-bkg-color', '#4BBDD7');
	set_theme_mod('button-hover-color', '#FFFFFF');
	set_theme_mod('button-hover-bkg-color', '#2F3543');
	set_theme_mod('cta-text-color', '#FFFFFF');
	set_theme_mod('cta-bkg-color', '#2F3543');
	set_theme_mod('footer-text-color', '#33343C');
	set_theme_mod('footer-bkg-color', '#F8F9FD');
	set_theme_mod('box-text-color', '#33343C');
	set_theme_mod('box-bkg-color', '#F8F9FD');
	set_theme_mod('title-font', 'Oswald');
	set_theme_mod('body-font', 'Nunito');
	set_theme_mod( 'custom_logo',$logo_id);
	set_theme_mod('cta-desc','We’d love to tell you our story and answer any questions about life in our community.');
	set_theme_mod('cta-button-text', 'Contact Us');
	set_theme_mod('cta-button-url', '#');
	
	set_theme_mod('url-facebook', '#');
	set_theme_mod('url-twitter', '#');
	set_theme_mod('url-google', '#');
	set_theme_mod('url-linkedin', '#');
	
	

	// home hero settings
	set_theme_mod('home-hero-title', 'Welcome Home');
	set_theme_mod('home-hero-desc', 'A Modern Community in the Heart of the City');
	set_theme_mod('hero-overlay-color', '#000000');
	set_theme_mod('hero-overlay-opacity', '50');
	set_theme_mod('home-hero-image',$herohome);
	for( $i=1 ; $i<=3 ; $i++){ 
		set_theme_mod('home-hero-slide'.$i, get_template_directory_uri()."/img/home-hero-slier-".$i.".jpg");
		set_theme_mod('home-hero-slider-title'.$i, 'Slider Title '.$i);
		set_theme_mod('home-hero-slider-subtitle'.$i, 'Slider Subtitle '.$i);
		
	}
	set_theme_mod('frontsteps_home_section1_title', 'Connections that last');
	set_theme_mod('frontsteps_home_section1_description', 'We pride ourselves on keeping our residents connected through events and activities. Our on-site manager is engaged with the community, and through our website and mobile app keeps everyone informed about area happenings, maintenance, security, and more.');
	set_theme_mod('home-cta-desc', 'We’d love to tell you our story and answer any questions about life in our community.');
	set_theme_mod('home-cta-button-text', 'More About us');
	set_theme_mod('home-cta-button-url', '#');
	
	// about settings
	set_theme_mod('about-hero',$heroabout);
	set_theme_mod('about-title', 'About Us');
	set_theme_mod('about-subtitle', 'Communication, connections, and quality of life are the tenants we stand by.');
	set_theme_mod('about-section1-title', 'Value');
	set_theme_mod('about-section1-desc', 'You’ll quickly discover that our team is committed to making sure your investment is a good one.');
	set_theme_mod('about-section2-title', 'Integrity');
	set_theme_mod('about-section2-desc', 'We are good stewards of your money and have complete transparency when it comes to where your dues and fees are going.');
	set_theme_mod('about-section3-title', 'Experience ');
	set_theme_mod('about-section3-desc', 'With over 25 years of commitment to the management industry, our team has the experience needed to help keep our condo running smoothly.er that our team is committed to making sure your investment is a good one.');
	set_theme_mod('show-team-section-bod', '1');
	set_theme_mod('bod-section-title', 'Board of Directors');
	set_theme_mod('emplyee-section-title', 'Employee');
	
	// Resources settings
	set_theme_mod('resources-title', 'Resources');
	set_theme_mod('resources-title2', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('resources-leftcontent', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('resources-rightcontent', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('resources-subtitle', 'Check our resources pages for helpful information and community updates');
	set_theme_mod('resources-hero',$heroresources);

	// Amenities settings
	set_theme_mod('amenities-rightcontent', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('amenities-title', 'Amenities');
	set_theme_mod('amenities-subtitle', 'Take advantage of the unique facilities our community shares with each other');
	set_theme_mod('amenities-hero',$heroramenities);
	set_theme_mod('amenities-section1-title', 'Nulla vitae elit libero, a pharetra augue dolor nibh.');
	set_theme_mod('amenities-section1-subtitle', 'Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	
	// Gallery settings
	set_theme_mod('gallery-rightcontent', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('gallery-leftcontent', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('gallery-title', 'Explore our community');
	set_theme_mod('gallery-subtitle', 'We know location is important, but our community is special in many other ways. Take a look at some photos from our recent events! You’ll quickly get a sense of what it’s like to live here.');

	// Contact settings
	set_theme_mod('contact-title', 'Contact Us');
	set_theme_mod('contact-subtitle', 'What Makes Us Unique.');
	set_theme_mod('contact-hero',$herorcontact);
	set_theme_mod('contact-address','1234 Any Street, Denver, CO 80202');
	set_theme_mod('contact-phone','333-333-3333');
	set_theme_mod('contact-map','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936626512!2d-104.99519803822619!3d39.764518674878275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C+CO%2C+USA!5e0!3m2!1sen!2sin!4v1535462660990');

?>