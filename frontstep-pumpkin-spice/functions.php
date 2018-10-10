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

add_action('customize_register', 'bluebird_customize_register', 1000);
function bluebird_customize_register($wp_customize) {
 	$wp_customize->remove_control( 'home-hide-gallery' );
 	$wp_customize->remove_section( 'aboutus_content' );
 	$wp_customize->remove_section( 'amenities_content' );
 	$wp_customize->remove_section( 'gallery_content' );
}

function remove_homefeature_widget() {
	unregister_widget('home_feature_Widget');
	unregister_sidebar( 'home-features' );
}

add_action( 'widgets_init', 'remove_homefeature_widget',11 );

function delete_post_type(){
    unregister_post_type( 'member' );
    unregister_post_type( 'amenity' );
    unregister_post_type( 'accreditation' );
    unregister_post_type( 'frontsteps-gallery' );
}
add_action('init','delete_post_type',100);

?>