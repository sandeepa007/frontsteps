<?php 
$selected_theme = wp_get_theme();


if( $selected_theme == "Irish Morning")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#5DBC7A';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#5DBC7A';
	$cta_text_color =  '#ffffff';$cta_bkg_color =  '#5DBC7A';$footer_text_color =  '#242626';$footer_bkg_color =  '#F9F9F9';$box_text_color =  '#ffffff';$box_bkg_color =  '#3B473E';
	set_theme_mod('cta-bkg-img', get_stylesheet_directory_uri()."/img/cta.jpg");
}
if( $selected_theme == "Bluebird Day")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#4EBCD6';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#4EBCD6'; $cta_text_color =  '#333844'; $cta_bkg_color = '#ffffff';$footer_text_color =  '#ffffff';$footer_bkg_color =  '#363636';$box_text_color =  '#242626';$box_bkg_color =  '#F7F9FC';
}
if( $selected_theme == "Euro Contempo")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#4EBCD6';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#4EBCD6';
	$cta_text_color =  '#ffffff';$cta_bkg_color =  '#333844';$footer_text_color =  '#242626';$footer_bkg_color =  '#F7F9FC';$box_text_color =  '#242626';$box_bkg_color =  '#F7F9FC';
}
if( $selected_theme == "Payment Portal")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#188FDF';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#4EBCD6';
	$cta_text_color =  '#ffffff';$cta_bkg_color =  '#333844';$footer_text_color =  '#242626';$footer_bkg_color =  '#F7F9FC';$box_text_color =  '#242626';$box_bkg_color =  '#F7F9FC';
}
if( $selected_theme == "PMP Template")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#4EBCD6';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#4EBCD6'; $cta_text_color =  '#333844'; $cta_bkg_color = '#ffffff';$footer_text_color =  '#ffffff';$footer_bkg_color =  '#363636';$box_text_color =  '#242626';$box_bkg_color =  '#F7F9FC';
}
	

	$herohome = get_stylesheet_directory_uri()."/img/home/home-hero.jpg";
	
	$heroabout = get_stylesheet_directory_uri()."/img/about/hero-header.jpg";
	$heroresources = get_stylesheet_directory_uri()."/img/resources/hero-header.jpg";
	$herorcontact = get_stylesheet_directory_uri()."/img/contact-us/hero-header.jpg";
	$heroramenities = get_stylesheet_directory_uri()."/img/amenities/hero-header.jpg";
	
	// home featured section image
	$img1 = get_stylesheet_directory_uri()."/img/home/hoa1.jpg";
	$img2 = get_stylesheet_directory_uri()."/img/home/hoa2.jpg";


$title_font =  'Oswald';
$body_font =  'Nunito';
$custom_logo = $logo_id;
$cta_desc = 'Interested in learning more about our community? Get in touch with a member of our team today!';
$cta_button_text =  'Contact Us';
$cta_button_url =  '#';

$url_facebook =  '#';
$url_twitter =  '#';
$url_google =  '#';
$url_linkedin =  '#';



// home hero settings
if( $selected_theme != "Payment Portal")
{
	$home_hero_title =  'Welcome Home!';
	$home_hero_desc =  'A Modern Community in the Heart of the City';
	$frontsteps_home_section1_title =  'Connections that last';
	$frontsteps_home_section1_description =  'We pride ourselves on keeping our residents connected through events and activities.
Our on-site manager is engaged with the community, and through our website and mobile app
keeps everyone informed about area happenings, maintenance, security, and more.';
}
else
{
	$home_hero_title =  'MAKE DUES AND FEES PAYMENTS FOR COMMUNITY';	
	$home_hero_desc =  '';
	$frontsteps_home_section1_title =  'WHO IS FRONTSTEPS?';
	$frontsteps_home_section1_description =  'Your community uses FRONTSTEPS to accept digital dues and fees payments from residents like you. FRONTSTEPS serves over 27,000 single and multi-family residential communities with its industry-leading community management software. Your information is safe with FRONTSTEPS as their payment solution is NACHA and PCI Level 1 compliant, which are top certifications in the data security industry. ';
}

$hero_overlay_color =  '#000000';
$hero_overlay_opacity =  '50';
$home_hide_gallery =  '1';
$home_hide_accrediation =  '1';


$home_cta_title =  'We Hope You Feel Like You’re Home!';
$home_cta_desc =  'We’d love to tell you our story and answer any questions about life in our community.';
$home_cta_button_text =  'DISCOVER OUR COMMUNITY';
$home_cta_button_url =  '#';

// about settings
$about_hero = $heroabout;
$about_title =  'About Us';
$about_subtitle =  'Communication, connections, and quality of life are the tenants we stand by.';
$about_section1_title =  'Value';
$about_section1_desc =  'You’ll quickly discover that our team is committed to making sure your investment is a
good one.';
$about_section2_title =  'Integrity';
$about_section2_desc =  'We are good stewards of your money and have complete transparency when it comes to
where your dues and fees are going.';
$about_section3_title =  'Experience';
$about_section3_desc =  'With over 25 years of commitment to the management industry, our team has the
experience needed to help keep our condo running smoothly.';
$show_team_section_bod =  '1';
$bod_section_title =  'Board of Directors';
$emplyee_section_title =  'Employee';

// Resources settings
$resources_title =  'Resources';
$resources_title2 =  'Get More Out of Community Living';
$resources_leftcontent =  'We’re here to help make your experience living in our community nothing short of exceptional.
From details on how to submit work orders to recommendations on the best local restaurants,
browse our comprehensive list of resources below.';
$resources_rightcontent =  '';
$resources_subtitle =  '';
$resources_hero = $heroresources;

// Amenities settings
$amenities_rightcontent =  '';
$amenities_title =  'Amenities';
$amenities_subtitle =  '';
$amenities_hero = $heroramenities;
$amenities_section1_title =  'World-Class Amenities. Exceptional Experiences.';
$amenities_section1_subtitle =  '';

// Gallery settings
$gallery_rightcontent =  'Nullam Fermentum Tellus Magna';
$gallery_leftcontent =  'Nullam Fermentum Tellus Magna';
$gallery_title =  'Explore Our Community';
$gallery_subtitle =  'We know location is important, but our community is special in many other ways. Take a
look at some photos from our recent events! You’ll quickly get a sense of what it’s like to live
here.';

// Contact settings
$contact_title =  'Won’t You be Our Neighbor?';
$contact_subtitle =  '';
$contact_hero = $herorcontact;
$contact_address = '1234 Any Street, Denver, CO 80202';
$contact_phone = '333-333-3333';
$contact_map = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936626512!2d_104.99519803822619!3d39.764518674878275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C+CO%2C+USA!5e0!3m2!1sen!2sin!4v1535462660990';

// Services settings
$services_title =  'Services';
$services_subtitle =  'Nullam Fermentum Tellus Magna';
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