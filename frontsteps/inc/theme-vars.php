<?php

// Set default variables.
$logo_id = get_template_directory_uri()."/img/placeholder-logo.png";
$herohome = get_template_directory_uri()."/img/hero-home.jpg";
$heroabout = get_template_directory_uri()."/img/about-hero-bg.jpg";
$heroresources = get_template_directory_uri()."/img/resources-hero-bg.jpg";
$heroramenities = get_template_directory_uri()."/img/amenities-hero-bg.jpg";
$herorcontact = get_template_directory_uri()."/img/contact-hero-bg.jpg";

$themedefaults = array(
	'primary-color' => '#4CBDD7', 
	'secondary-color' => '#428FBB',
	'tertiary-color' => '#67afe1',
	'text-color' => '#33343C',
	'body-color' => '#FFFFFF',
	'anchore-color' => '#2D3340',
	'anchore-hover-color' => '#4ABDD9',
	'button-color' => '#FFFFFF',
	'button-bkg-color' => '#4BBDD7',
	'button-hover-color' => '#FFFFFF',
	'button-hover-bkg-color' => '#2F3543',
	'cta-text-color' => '#FFFFFF',
	'cta-bkg-color' => '#2F3543',
	'footer-text-color' => '#33343C',
	'footer-bkg-color' => '#F8F9FD',
	'box-text-color' => '#33343C',
	'box-bkg-color' => '#F8F9FD',
	'title-font' => 'Oswald',
	'body-font' => 'Nunito',
	'custom_logo' => $logo_id,
	'cta-desc' => 'We’d love to tell you our story and answer any questions about life in our community.',
	'cta-button-text' => 'Contact Us',
	'cta-button-url' => '#',
	'url-facebook' => '#',
	'url-twitter' => '#',
	'url-google' => '#',
	'url-linkedin' => '#',

	// home hero settings
	'home-hero-title' => 'Welcome Home',
	'home-hero-desc' => 'A Modern Community in the Heart of the City',
	'hero-overlay-color' => '#000000',
	'hero-overlay-opacity' => '50',
	'home-hero-image' => $herohome,
	/*for( $i=1 ; $i<=3 ; $i++){ 
		'home-hero-slide'.$i, get_template_directory_uri()."/img/home-hero-slier-".$i.".jpg",
		'home-hero-slider-title'.$i, 'Slider Title '.$i,
		'home-hero-slider-subtitle'.$i, 'Slider Subtitle '.$i,
		
	}*/
	'frontsteps_home_section1_title' => 'Connections that last',
	'frontsteps_home_section1_description' => 'We pride ourselves on keeping our residents connected through events and activities. Our on-site manager is engaged with the community, and through our website and mobile app keeps everyone informed about area happenings, maintenance, security, and more.',
	'home-cta-desc' => 'We’d love to tell you our story and answer any questions about life in our community.',
	'home-cta-button-text' => 'More About us',
	'home-cta-button-url' => '#',

	// about settings
	'about-hero' => $heroabout,
	'about-title' => 'About Us',
	'about-subtitle' => 'Communication, connections, and quality of life are the tenants we stand by.',
	'about-section1-title' => 'Value',
	'about-section1-desc' => 'You’ll quickly discover that our team is committed to making sure your investment is a good one.',
	'about-section2-title' => 'Integrity',
	'about-section2-desc' => 'We are good stewards of your money and have complete transparency when it comes to where your dues and fees are going.',
	'about-section3-title' => 'Experience ',
	'about-section3-desc' => 'With over 25 years of commitment to the management industry, our team has the experience needed to help keep our condo running smoothly.er that our team is committed to making sure your investment is a good one.',
	'show-team-section-bod' => '1',
	'bod-section-title' => 'Board of Directors',
	'emplyee-section-title' => 'Employee',
	
	// Resources settings
	'resources-title' => 'Resources',
	'resources-title2' => 'Nullam Fermentum Tellus Magna',
	'resources-leftcontent' => 'Nullam Fermentum Tellus Magna',
	'resources-rightcontent' => 'Nullam Fermentum Tellus Magna',
	'resources-subtitle' => 'Check our resources pages for helpful information and community updates',
	'resources-hero' => $heroresources,

	// Amenities settings
	'amenities-rightcontent' => 'Nullam Fermentum Tellus Magna',
	'amenities-title' => 'Amenities',
	'amenities-subtitle' => 'Take advantage of the unique facilities our community shares with each other',
	'amenities-hero' => $heroramenities,
	'amenities-section1-title' => 'Nulla vitae elit libero, a pharetra augue dolor nibh.',
	'amenities-section1-subtitle' => 'Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	
	// Gallery settings
	'gallery-rightcontent' => 'Nullam Fermentum Tellus Magna',
	'gallery-leftcontent' => 'Nullam Fermentum Tellus Magna',
	'gallery-title' => 'Explore our community',
	'gallery-subtitle' => 'We know location is important, but our community is special in many other ways. Take a look at some photos from our recent events! You’ll quickly get a sense of what it’s like to live here.',

	// Contact settings
	'contact-title' => 'Contact Us',
	'contact-subtitle' => 'What Makes Us Unique.',
	'contact-hero' => $herorcontact,
	'contact-address' => '1234 Any Street, Denver, CO 80202',
	'contact-phone' => '333-333-3333',
	'contact-map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936626512!2d-104.99519803822619!3d39.764518674878275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C+CO%2C+USA!5e0!3m2!1sen!2sin!4v1535462660990',
);

