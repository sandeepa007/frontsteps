<?php 
$selected_theme = wp_get_theme();
if( $selected_theme == "Blanco Breeze")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#242626';$button_bkg_color =  '#ffffff';$button_hover_color =  '#242626';$button_hover_bkg_color =  '#ffffff';
	$cta_text_color =  '#ffffff';$cta_bkg_color =  '#242626';$footer_text_color =  '#242626';$footer_bkg_color =  '#ffffff';$box_text_color =  '#242626';$box_bkg_color =  '#F9F9F9';
}
if( $selected_theme == "Summer Vibes")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#5F8ED5';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#5f96d5';
	$cta_text_color =  '#ffffff';$cta_bkg_color = '#5F8ED5';$footer_text_color =  '#242626';$footer_bkg_color =  '#ffffff';$box_text_color =  '#242626';$box_bkg_color =  '#F9F9F9';
}
if( $selected_theme == "Citrus Pop")
{
	$text_color =  '#4C4C4C';$body_color =  '#FFFFFF';$button_color =  '#ffffff';$button_bkg_color =  '#E14E3F';$button_hover_color =  '#ffffff';$button_hover_bkg_color =  '#E14E3F';
	$cta_text_color =  '#ffffff';$cta_bkg_color = '#E14E3F';$footer_text_color =  '#242626';$footer_bkg_color =  '#ffffff';$box_text_color =  '#242626';$box_bkg_color =  '#F9F9F9';
	set_theme_mod('cta-bkg-img', get_stylesheet_directory_uri()."/img/cta.jpg");
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
	$home_hero_title =  'Welcome Home!';
	$home_hero_desc =  'A Friendly Community That You can Call Home';
	$hero_overlay_color =  '#000000';
	$hero_overlay_opacity =  '50';
	$home_hide_gallery =  '1';
	$home_hide_accrediation =  '1';

	$frontsteps_home_section1_title =  'Get Connected';
	$frontsteps_home_section1_description =  'We pride ourselves on building lasting releationships between residents through family-
	friendly events and activities. With an on-site manager who is engaged with the community, as
	well an informative website and convenient mobile app, you’ll always be in the loop on
	community happenings, news, security, and more.';

	$home_cta_title =  'Commitment and Experience';
	$home_cta_desc =  'We’d love to tell you our story and answer any questions about life in our community.';
	$home_cta_button_text =  'DISCOVER OUR COMMUNITY';
	$home_cta_button_url =  '#';

	// about settings
	$about_hero = $heroabout;
	$about_title =  'About Us';
	$about_subtitle =  '';
	$about_section1_title =  'Hello, Neighbor!';
	$about_section1_desc =  'We understand that your home is likely the largest investment you’ll make in your
	lifetime. You’ll quickly discover that our team is committed to making sure your investment is a
	great one. Communication, connections, and quality of life are the tenants we stand by. We are
	good stewards of your money and have complete transparency when it comes to where your
	dues and fees are going. Get to know our HOA board.';
	$about_section2_title =  '';
	$about_section2_desc =  '';
	$about_section3_title =  '';
	$about_section3_desc =  '';
	$show_team_section_bod =  '1';
	$bod_section_title =  'Board of Directors';
	$emplyee_section_title =  'Employee';

	// Resources settings
	$resources_title =  'Resources';
	$resources_title2 =  'Get More Out of Community Living';
	$resources_leftcontent =  'We’re here to help make your experience living in our community nothing short of exceptional. From details on how to submit work orders to recommendations on the best local restaurants, browse our comprehensive list of resources below.';
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
	$gallery_subtitle =  'Haven’t visited our community in person yet? Take a digital tour through our homes,
	streets, and open spaces using our vitual photo gallery.';

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
	$community_info =  'Our community portfolio ranges from homes to high-rises.';
	$community_info_subtitle =  'Visit some of the premiere properties that we manage.';

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