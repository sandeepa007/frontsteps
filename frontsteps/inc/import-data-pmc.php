<?php 
$selected_theme = wp_get_theme();

/*if( $selected_theme == "Urban Chic" || $selected_theme == "Modern Pro")
{*/

	$herohome = get_stylesheet_directory_uri()."/img/hero-home.jpg";
	$heroabout = get_stylesheet_directory_uri()."/img/about-hero-bg.jpg";
	$heroresources = get_stylesheet_directory_uri()."/img/resources-hero-bg.jpg";
	$heroramenities = get_stylesheet_directory_uri()."/img/amenities-hero-bg.jpg";
	$herorcontact = get_stylesheet_directory_uri()."/img/contact-hero-bg.jpg";
	$herorservice = get_stylesheet_directory_uri()."/img/services-hero-bg.jpg";
	$herocommunities = get_stylesheet_directory_uri()."/img/hero-communities-bg.jpg";

/*}*/
echo $herohome;

$primary_color =  '#4CBDD7';
$secondary_color =  '#428FBB';
$tertiary_color =  '#67afe1';
$text_color =  '#33343C';
$body_color =  '#FFFFFF';
$anchore_color =  '#2D3340';
$anchore_hover_color =  '#4ABDD9';
$button_color =  '#FFFFFF';
$button_bkg_color =  '#4BBDD7';
$button_hover_color =  '#FFFFFF';
$button_hover_bkg_color =  '#2F3543';
$cta_text_color =  '#FFFFFF';
$cta_bkg_color =  '#2F3543';
$footer_text_color =  '#33343C';
$footer_bkg_color =  '#F8F9FD';
$box_text_color =  '#33343C';
$box_bkg_color =  '#F8F9FD';
$title_font =  'Oswald';
$body_font =  'Nunito';
$custom_logo = $logo_id;
$cta_desc = 'We’d love to tell you our story and answer any questions about life in our community.';
$cta_button_text =  'Contact Us';
$cta_button_url =  '#';

$url_facebook =  '#';
$url_twitter =  '#';
$url_google =  '#';
$url_linkedin =  '#';



// home hero settings
$home_hero_title =  'Trust in [Company Name]';
$home_hero_desc =  'Modern and Efficient Property Management Services';
$hero_overlay_color =  '#000000';
$hero_overlay_opacity =  '50';
$home_hide_gallery =  '1';

$frontsteps_home_section1_title =  'Commitment and Experience';
$frontsteps_home_section1_description =  'The [Company Name] team prides itself on building long-term relationships with our clients and providing best-in-class service for our communities—from budgets to operations, maintenance, and resident engagement—we provide an exceptional experience for you, and most importantly, your residents.';

$home_cta_title =  'Commitment and Experience';
$home_cta_desc =  'The [Company Name] team prides itself on building long-term relationships with our clients and providing best-in-class service for our communities—from budgets to operations, maintenance, and resident engagement—we provide an exceptional experience for you, and most importantly, your residents.';
$home_cta_button_text =  'More About us';
$home_cta_button_url =  '#';

// about settings
$about_hero = $heroabout;
$about_title =  'About Us';
$about_subtitle =  '';
$about_section1_title =  'Experience Matters';
$about_section1_desc =  'It’s why we hire team members who share our culture and our commitment to honesty, fiscal
responsibility, and responsible property management.';
$about_section2_title =  '';
$about_section2_desc =  '';
$about_section3_title =  '';
$about_section3_desc =  '';
$show_team_section_bod =  '1';
$bod_section_title =  'Board of Directors';
$emplyee_section_title =  'Employee';

// Resources settings
$resources_title =  'Resources';
$resources_title2 =  'Nullam Fermentum Tellus Magna';
$resources_leftcontent =  'Nullam Fermentum Tellus Magna';
$resources_rightcontent =  'Nullam Fermentum Tellus Magna';
$resources_subtitle =  'Check our resources pages for helpful information and community updates';
$resources_hero = $heroresources;

// Amenities settings
$amenities_rightcontent =  'Nullam Fermentum Tellus Magna';
$amenities_title =  'Amenities';
$amenities_subtitle =  'Take advantage of the unique facilities our community shares with each other';
$amenities_hero = $heroramenities;
$amenities_section1_title =  'Nulla vitae elit libero, a pharetra augue dolor nibh.';
$amenities_section1_subtitle =  'Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

// Gallery settings
$gallery_rightcontent =  'Nullam Fermentum Tellus Magna';
$gallery_leftcontent =  'Nullam Fermentum Tellus Magna';
$gallery_title =  'Explore our community';
$gallery_subtitle =  'We know location is important, but our community is special in many other ways. Take a look at some photos from our recent events! You’ll quickly get a sense of what it’s like to live here.';

// Contact settings
$contact_title =  'Contact Us';
$contact_subtitle =  'What Makes Us Unique.';
$contact_hero = $herorcontact;
$contact_address = '1234 Any Street, Denver, CO 80202';
$contact_phone = '333_333_3333';
$contact_map = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936626512!2d_104.99519803822619!3d39.764518674878275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C+CO%2C+USA!5e0!3m2!1sen!2sin!4v1535462660990';

// Services settings
$services_title =  'Services';
$services_subtitle =  'Resident Engagement';
$services_hero = $herorservice;

// Communities settings
$community_title =  'Our Communities';
$community_sub_title =  'Nullam Fermentum Tellus Magna';
$community_hero = $herocommunities;
$community_info =  'Nullam Fermentum Tellus Magna';
$community_info_subtitle =  'Nullam Fermentum Tellus Magna';

// Request Proposal settings
$rq_proposal_title =  'Request Proposal';
$rq_proposal_subtitle =  'Nullam Fermentum Tellus Magna';
$rq_proposal_hero = $herorcontact;

// 404 Page settings
$desc_404 =  'Oops.. We couldn’t find this page.';
$button_text_400 =  'Go Back';
$button_link_400 =  '#';


// Thank you Page settings
$ty_desc =  'We will look over your message and get back to you.';
$ty_button_text =  'Go Home';
$ty_button_link =  '#';
?>