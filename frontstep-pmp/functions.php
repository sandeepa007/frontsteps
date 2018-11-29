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

add_action('customize_register', 'pmp_customize_register', 1000);

function pmp_customize_register($wp_customize) {
    $wp_customize->remove_section( 'home_cta_section' );
    $wp_customize->remove_control( 'home-hide-accreditation' );
}

/**
 * New widget area For Home Feature Section.
 */
require get_stylesheet_directory() . '/inc/home-features-widget.php';

add_action( 'widgets_init', 'pmp_widgets_init' );
function pmp_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Logo', 'frontstep-pmp' ),
        'id' => 'footer-logo',
        'description' => __( '', 'frontstep-pmp' ),
        'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
    ) );
}

?>
