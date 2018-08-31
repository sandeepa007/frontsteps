<?php

$customizer_path = get_template_directory() . '/inc/customizer';

// Helper library for the theme customizer.
require $customizer_path.'/customizer-library/customizer-library.php';
// Define options for the theme customizer.
require $customizer_path.'/options.php';
// Output inline styles based on theme customizer selections.
require $customizer_path.'/styles.php';
// Additional filters and actions based on theme customizer selections.
require $customizer_path.'/mods.php';


/**
 * Remove default Sections from Customizer
 */
//function customize_register_init($wp_customize)
//{
//    $wp_customize->remove_section('title_tagline');
//    $wp_customize->remove_section('static_front_page');
//    $wp_customize->remove_section('nav');
//    $wp_customize->remove_section('background_color');
//}
//
//add_action('customize_register', 'customize_register_init');


