<?php
$customizer_path = get_stylesheet_directory() . '/inc/customizer';
require $customizer_path.'/styles.php';
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

add_action('customize_register', 'paymntportl_customize_register', 1000);
function paymntportl_customize_register($wp_customize) {
    $wp_customize->remove_section( 'aboutus_content' );
    $wp_customize->remove_section( 'resources_content' );
    $wp_customize->remove_section( 'amenities_content' );
    $wp_customize->remove_section( 'gallery_content' );
    $wp_customize->remove_section( 'contact_content' );
    $wp_customize->remove_section( 'ty_content' );
    $wp_customize->remove_section( 'call-to-actions' );
    $wp_customize->remove_section( 'home_hero_slider_section' );
    $wp_customize->remove_section( 'home_cta_section' );
    $wp_customize->remove_control( 'home-hide-gallery' );
    $wp_customize->remove_control( 'home-hide-accreditation' );
}

function remove_menu_theme_locations()
{
   unregister_nav_menu( 'right_menu' );
}
add_action( 'after_setup_theme', 'remove_menu_theme_locations', 20 );

function remove_page_templates( $templates ) {
    unset( $templates['page-templates/aboutus-page.php'] );
    unset( $templates['page-templates/amenties-page.php'] ); 
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    unset( $templates['page-templates/contact-page.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/gallery-page.php'] );
    unset( $templates['page-templates/resources-page.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/thank-you.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'remove_page_templates' );


function customizer_library_paymntportal_options($wp_customize) {
    $options = array();
    $sections = array();
    $panels = array();

    $options['hero-cta-text'] = array(
        'id' => 'hero-cta-text',
        'label'   => __( 'CTA Button Text', 'frontstep-payment-portal' ),
        'section' => 'home_hero_section',
        'type'    => 'text',        
        'default' => 'PAY HERE',
        'priority'    => 90,
    );

    $options['hero-cta-url'] = array(
        'id' => 'hero-cta-url',
        'label'   => __( 'CTA Button Url', 'frontstep-payment-portal' ),
        'section' => 'home_hero_section',
        'type'    => 'text',        
        'default' => '#',
        'priority'    => 90,
    );

    $options['home_section1_cta_text'] = array(
        'id' => 'home_section1_cta_text',
        'label'   => __( 'Section 1 CTA Button Text', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'text',        
        'default' => 'REGISTER',
        'priority'    => 100,
    );
    $options['home_section1_cta_url'] = array(
        'id' => 'home_section1_cta_url',
        'label'   => __( 'Section 1 CTA Button URL', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'text',        
        'default' => '#',
        'priority'    => 100,
    );

    $options['home_section2_title'] = array(
        'id' => 'home_section2_title',
        'label'   => __( 'Section 2 Title', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'text',        
        'default' => 'NEW RESIDENTS',
        'priority'    => 100,
    );

    $options['home_section2_desc'] = array(
        'id' => 'home_section2_desc',
        'label'   => __( 'Section 2 Description', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'textarea',        
        'default' => 'New to this community? Simply register your account by clicking the button below to begin making digital payments via your smartphone, tablet, or computer. Once logged in, you can make a credit card, debit card, or ACH payment and will have the ability to setup recurring payments. If you were making payments through another site before, be sure to shut off those recurring payments to ensure youre not double charged. ',
        'priority'    => 100,
    );
    $options['home_section2_cta_text'] = array(
        'id' => 'home_section2_cta_text',
        'label'   => __( 'Section 2 CTA Button Text', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'text',        
        'default' => 'REGISTER',
        'priority'    => 100,
    );
    $options['home_section2_cta_url'] = array(
        'id' => 'home_section2_cta_url',
        'label'   => __( 'Section 2 CTA Button URL', 'frontstep-payment-portal' ),
        'section' => 'home_other_section',
        'type'    => 'text',        
        'default' => '#',
        'priority'    => 100,
    );

    $options['sections'] = $sections;
    $options['panels'] = $panels;
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );
}
add_action( 'init', 'customizer_library_paymntportal_options', 15 );


function unregister_post_type_pymnt_portal(){
    unregister_post_type( "amenity" );
	unregister_post_type( "member" );
	unregister_post_type( "frontsteps-gallery");
	unregister_post_type( "resource");
	unregister_post_type( "accreditation");
}

add_action( 'init', 'unregister_post_type_pymnt_portal',20 );


?>