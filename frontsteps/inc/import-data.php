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

	// Contact page creation
	$contact_page_id = get_option("contact_page_id");
	if (!$contact_page_id) {
		
		// import gravity Contact form and insert into contact page
		$contct_formobj = json_decode('{"title":"Contact Us","description":"","labelPlacement":"top_label","descriptionPlacement":"below","button":{"type":"text","text":"Submit","imageUrl":""},"fields":[{"type":"name","id":1,"label":"Name","adminLabel":"","isRequired":false,"size":"medium","errorMessage":"","visibility":"visible","nameFormat":"advanced","inputs":[{"id":"1.2","label":"Prefix","name":"","choices":[{"text":"Mr.","value":"Mr.","isSelected":false,"price":""},{"text":"Mrs.","value":"Mrs.","isSelected":false,"price":""},{"text":"Miss","value":"Miss","isSelected":false,"price":""},{"text":"Ms.","value":"Ms.","isSelected":false,"price":""},{"text":"Dr.","value":"Dr.","isSelected":false,"price":""},{"text":"Prof.","value":"Prof.","isSelected":false,"price":""},{"text":"Rev.","value":"Rev.","isSelected":false,"price":""}],"isHidden":true,"inputType":"radio"},{"id":"1.3","label":"First","name":"","customLabel":"First Name"},{"id":"1.4","label":"Middle","name":"","isHidden":true},{"id":"1.6","label":"Last","name":"","customLabel":"Last Name"},{"id":"1.8","label":"Suffix","name":"","isHidden":true}],"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"email","id":2,"label":"Email","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","emailConfirmEnabled":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"phone","id":3,"label":"Phone","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"phoneFormat":"standard","formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","form_id":"","productField":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"textarea","id":4,"label":"Message","adminLabel":"","isRequired":false,"size":"medium","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","form_id":"","useRichTextEditor":false,"multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false}],"version":"2.3.3.6","id":1,"useCurrentUserAsAuthor":true,"postContentTemplateEnabled":false,"postTitleTemplateEnabled":false,"postTitleTemplate":"","postContentTemplate":"","lastPageButton":null,"pagination":null,"firstPageCssClass":null,"confirmations":[{"id":"5b76a660e365c","name":"Default Confirmation","isDefault":true,"type":"message","message":"Thanks for contacting us! We will get in touch with you shortly.","url":"","pageId":"","queryString":""}],"notifications":[{"id":"5b76a660dc8ac","to":"{admin_email}","name":"Admin Notification","event":"form_submission","toType":"email","subject":"New submission from {form_title}","message":"{all_fields}"}]}', true);

		$contct_form_id = GFAPI::add_form($contct_formobj);

		$contact_post = array(
			'post_title' => "Contact",
			'post_content' => '[gravityform id="'.$contct_form_id.'" title="false" description="false" ajax="true" tabindex="34"]',
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

		// Service page creation
		$services_page_id = get_option("services_page_id");
		if (!$services_page_id) {
			$blog_post = array(
				'post_title' => "Services",
				'post_content' => "",
				'post_status' => "publish",
				'post_type' => 'page',
				);
			
			$servicesID = wp_insert_post($blog_post, $error);
			update_post_meta($servicesID, "_wp_page_template", "page-templates/services-page.php");
			update_option("services_page_id", $servicesID);
		}

		// Request Proposal page creation
		$reqprposl_page_id = get_option("reqprposl_page_id");
		if (!$reqprposl_page_id) {

			// import gravity Contact form and insert into contact page
		$reqprop_formobj = json_decode('{"title":"Request Proposal","description":"","labelPlacement":"top_label","descriptionPlacement":"below","button":{"type":"text","text":"Submit","imageUrl":""},"fields":[{"type":"text","id":1,"label":"First Name","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"text","id":2,"label":"Last Name","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"email","id":3,"label":"Email","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","emailConfirmEnabled":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"phone","id":4,"label":"Phone","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"phoneFormat":"standard","formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","form_id":"","productField":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"text","id":5,"label":"Address","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"text","id":6,"label":"Address 2","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"text","id":7,"label":"City","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_third","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false},{"type":"text","id":8,"label":"State","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_middle_third","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false},{"type":"text","id":9,"label":"Zip","adminLabel":"","isRequired":false,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":2,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_third","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","maxLength":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false}],"version":"2.3.3.9","id":2,"useCurrentUserAsAuthor":true,"postContentTemplateEnabled":false,"postTitleTemplateEnabled":false,"postTitleTemplate":"","postContentTemplate":"","lastPageButton":null,"pagination":null,"firstPageCssClass":null,"confirmations":[{"id":"5b8fd6ec035d3","name":"Default Confirmation","isDefault":true,"type":"message","message":"Thanks for contacting us! We will get in touch with you shortly.","url":"","pageId":"","queryString":""}],"notifications":[{"id":"5b8fd6ebdf14a","to":"{admin_email}","name":"Admin Notification","event":"form_submission","toType":"email","subject":"New submission from {form_title}","message":"{all_fields}"}]}', true);

		$reqprop_form_id = GFAPI::add_form($reqprop_formobj);

			$blog_post = array(
				'post_title' => "Request Proposal",
				'post_content' => '[gravityform id="'.$reqprop_form_id.'" title="false" description="false" ajax="true" tabindex="34"]',
				'post_status' => "publish",
				'post_type' => 'page',
				);
			
			$reqprpID = wp_insert_post($blog_post, $error);
			update_post_meta($reqprpID, "_wp_page_template", "page-templates/request-proposal-page.php");
			update_option("reqprposl_page_id", $reqprpID);
		}

	}
	else
	{
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
    /*wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Home'),
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));*/

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

    if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
	{
		wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  __('Services'),
	        'menu-item-classes' => '',
	        'menu-item-url' => home_url( '/services/' ), 
	        'menu-item-status' => 'publish'));

		wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  __('Our Communities'),
	        'menu-item-classes' => '',
	        'menu-item-url' => home_url( '/communities/' ), 
	        'menu-item-status' => 'publish'));

		wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  __('Blog'),
	        'menu-item-classes' => '',
	        'menu-item-url' => home_url( '/blog/' ), 
	        'menu-item-status' => 'publish'));

		wp_update_nav_menu_item($menu_id, 0, array(
	        'menu-item-title' =>  __('Request Proposal'),
	        'menu-item-classes' => '',
	        'menu-item-url' => home_url( '/request-p	roposal/' ), 
	        'menu-item-status' => 'publish'));
	}
    else
    {
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
	}    

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
		$url_array = array('url' => '#');
		update_post_meta($community_post_id,"community",$url_array);

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

		if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
		{
			// Create Demo Blog posts
			$new_post = array(
		    'post_title' => 'Blog '.$i,
		    'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a nunc eu erat aliquam convallis sed eget erat. Morbi elit lorem, tristique non dolor et, semper pharetra metus. Nunc rutrum, lectus et vehicula molestie, ligula velit lobortis urna, ut aliquet dui metus ut metus. Sed mattis, metus a tempor suscipit, tortor risus aliquam sapien, vitae viverra augue odio ac ex. Nullam sollicitudin imperdiet quam, at molestie justo efficitur vitae. Ut ac nunc id leo dignissim efficitur. Proin at diam quis magna luctus condimentum. Ut cursus, nunc id tempor gravida, tortor velit gravida odio, a rhoncus diam magna eget orci. Aenean sem enim, dictum ut quam ut, posuere vestibulum lacus. Fusce feugiat tellus vitae mi rutrum egestas. Quisque finibus eu leo at mollis. Fusce nec dolor lacus. Nullam imperdiet elementum odio, et dictum nisi ultricies tempor. Phasellus sed egestas dui, eget convallis quam. Mauris ullamcorper nisi diam, eu aliquet ex consequat nec. Nulla vitae tristique turpis',
		    'post_status' => 'publish',
		    'post_date' => date('Y-m-d H:i:s'),
		    'post_author' => $user_ID,
		    'post_type' => 'post',
			);
			$post_id = wp_insert_post($new_post);
		
		}

	}

	$uploadfile = get_template_directory_uri()."/img/placeholder-logo.png";
	$herohome = get_template_directory_uri()."/img/hero-home.jpg";
	$heroabout = get_template_directory_uri()."/img/about-hero-bg.jpg";
	$heroresources = get_template_directory_uri()."/img/resources-hero-bg.jpg";
	$heroramenities = get_template_directory_uri()."/img/amenities-hero-bg.jpg";
	$herorcontact = get_template_directory_uri()."/img/contact-hero-bg.jpg";
	$herorservice = get_template_directory_uri()."/img/services-hero-bg.jpg";
	$herocommunities = get_template_directory_uri()."/img/hero-communities-bg.jpg";
	
	
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
	
	set_theme_mod('home-cta-title', 'Commitment and Experience');
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

	// Services settings
	set_theme_mod('services-title', 'Services');
	set_theme_mod('services-subtitle', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('services-hero',$herorservice);

	// Communities settings
	set_theme_mod('community-title', 'Our Communities');
	set_theme_mod('community-sub-title', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('community-hero',$herocommunities);
	set_theme_mod('community-info', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('community-info-subtitle', 'Nullam Fermentum Tellus Magna');

	// Request Proposal settings
	set_theme_mod('rq_proposal-title', 'Request Proposal');
	set_theme_mod('rq_proposal-subtitle', 'Nullam Fermentum Tellus Magna');
	set_theme_mod('rq_proposal-hero',$herorcontact);

	// Widget Import code - Ashok
	if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
	{

		$imgleft = get_template_directory_uri()."/img/widget/pmc/image-left.jpg";
		$imgcenter = get_template_directory_uri()."/img/widget/pmc/image-center.jpg";
		$imgright = get_template_directory_uri()."/img/widget/pmc/image-right.jpg";

		$widgetArr = array(
			"wp_inactive_widgets" => array(),
			"home-features" => array(
				0 => "home_feature_widget-2",
				1 => "home_feature_widget-3",
				2 => "home_feature_widget-4",
			),
			"right-sidebar" => array(
				0 => "search-2",
				1 => "recent-posts-2",
				2 => "recent-comments-2",
				3 => "archives-2",
				4 => "categories-2",
				5 => "meta-2",
			),
			"left-sidebar" => array(),
			"footer-left" => array(),
			"footer-right" => array(),
			"array_version" => 3,
		);
		update_option('sidebars_widgets', maybe_unserialize($widgetArr) );

		$homefeatureArr = array(
			2 => array(
				"title" => "Homeowners Associations", 
				"desc" => "We provide comprehensive property management services for HOAs including online dues and fees payments, resident engagement, security, and document storage.",
				"image_uri" => $imgleft,
			),
			3 => array(
				"title" => "Condominium Associations", 
				"desc" => "There are many moving parts in COAs and we’re here to help you manage these unique properties with features like pass-on logs, visitor management, parking permits, and package delivery.",
				"image_uri" => $imgcenter,
			),
			4 => array(
				"title" => "Homeowners Associations", 
				"desc" => "Collect dues and fees payments online through our NACHA-compliant payments platform. No more paper checks, bank lockboxes, and missing coupons.",
				"image_uri" => $imgright,
			),
			"_multiwidget" => 1,
		);
		update_option('widget_home_feature_widget', maybe_unserialize($homefeatureArr) );
	
	} else {

		$img1 = get_template_directory_uri()."/img/widget/coa/coa1.jpg";
		$img2 = get_template_directory_uri()."/img/widget/coa/coa2.jpg";
		$title = "Ultricies Euismod";
		// 1 - Modern Living, 2 - Room To Breathe
		$desc = "Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed diam eget risus varius blandit sit amet non magna.";
		// 1 - Each unit has been lovingly built with modern conveniences and special touches that welcome you and make you feel at home in every room. Any maintenance issues are quickly resolved with a few clicks on our site. Plus, residents can pay dues and fees online or from their mobile device, too.
		// 2 - Our open spaces and awesome amenities make living here even more special. It’s easy to login to our website or with a few clicks on your phone, and reserve the party room, tennis courts, or BBQ area.

		if($my_theme == "Citrus Pop" || $my_theme == "Summer Vibes" || $my_theme == "Blanco Breeze" ) {
			
			$img1 = get_template_directory_uri()."/img/widget/hoa/hoa1.jpg";
			$img2 = get_template_directory_uri()."/img/widget/hoa/hoa2.jpg";
			$title = "Nullam Parturient Tortor Lorem Ligula";
			$desc = "Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.  Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet."; 

		}

		$widgetArr = array(
			"wp_inactive_widgets" => array(),
			"home-features" => array(
				0 => "home_feature_widget-2",
				1 => "home_feature_widget-3",
			),
			"right-sidebar" => array(
				0 => "search-2",
				1 => "recent-posts-2",
				2 => "recent-comments-2",
				3 => "archives-2",
				4 => "categories-2",
				5 => "meta-2",
			),
			"left-sidebar" => array(),
			"footer-left" => array(),
			"footer-right" => array(),
			"array_version" => 3,
		);
		update_option('sidebars_widgets', maybe_unserialize($widgetArr) );

		$homefeatureArr = array(
			2 => array(
				"title" => $title, 
				"desc" => $desc,
				"image_uri" => $img1,
				"is_img_left" => false,
			),
			3 => array(
				"title" => $title, 
				"desc" => $desc,
				"image_uri" => $img2,
				"is_img_left" => true,
			),
			"_multiwidget" => 1,
		);
		update_option('widget_home_feature_widget', maybe_unserialize($homefeatureArr) );

	}
?>