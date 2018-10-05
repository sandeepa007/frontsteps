<?php
$customizer_path = get_stylesheet_directory() . '/inc/customizer';
require $customizer_path.'/styles.php';

require get_stylesheet_directory() . '/home-features-widget.php';

/**Custom Option for theme**/


add_action('customize_register', 'citrus_customize_register', 1000);
add_action( 'init', 'customizer_library_citrus_options', 1000 );
function citrus_customize_register($wp_customize) {
  $wp_customize->remove_control( 'about-section2-title' );
  $wp_customize->remove_control( 'about-section3-title' );
  $wp_customize->remove_control( 'about-section3-desc' );  
  $wp_customize->remove_control( 'gallery-subtitle' );  
  
}

/**
 * Defines image sizes
 */
function blanco_breeze_setup() {
    add_image_size( 'home-gallery', 341, 172, true );
}
add_action( 'after_setup_theme', 'blanco_breeze_setup' );

/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_citrus_options() {

	$options['resources-title2'] = array(
        'id' => 'resources-title2',
        'label'   => __( 'Title 2', 'frontsteps' ),
        'section' => 'resources_content',
        'type'    => 'text',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $options['resources-leftcontent'] = array(
        'id' => 'resources-leftcontent',
        'label'   => __( 'Left Content', 'frontsteps' ),
        'section' => 'resources_content',
        'type'    => 'textarea',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $options['resources-rightcontent'] = array(
        'id' => 'resources-rightcontent',
        'label'   => __( 'Right Content', 'frontsteps' ),
        'section' => 'resources_content',
        'type'    => 'textarea',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $options['amenities-rightcontent'] = array(
        'id' => 'amenities-rightcontent',
        'label'   => __( 'Right Content', 'frontsteps' ),
        'section' => 'amenities_content',
        'type'    => 'textarea',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $options['gallery-rightcontent'] = array(
        'id' => 'gallery-rightcontent',
        'label'   => __( 'Right Content', 'frontsteps' ),
        'section' => 'gallery_content',
        'type'    => 'textarea',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $options['gallery-leftcontent'] = array(
        'id' => 'gallery-leftcontent',
        'label'   => __( 'Left Content', 'frontsteps' ),
        'section' => 'gallery_content',
        'type'    => 'textarea',        
        'default' => 'Nullam Fermentum Tellus Magna',
        'priority' => '500'
    );
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );
}
?>
