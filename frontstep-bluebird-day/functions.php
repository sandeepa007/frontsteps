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

function bluebird_day_setup() {
    add_image_size( 'accredition-logo', 0, 63 );
}
add_action( 'after_setup_theme', 'bluebird_day_setup' );

/**
 * New widget area For Home Feature Section.
 */
require get_stylesheet_directory() . '/inc/home-features-widget.php';

?>
