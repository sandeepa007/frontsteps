<?php
/**
 * Check and setup theme's default settings
 *
 * @package frontsteps
 *
 */

if ( ! function_exists ( 'frontsteps_setup_theme_default_settings' ) ) {
	function frontsteps_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$frontsteps_posts_index_style = get_theme_mod( 'frontsteps_posts_index_style' );
		if ( '' == $frontsteps_posts_index_style ) {
			set_theme_mod( 'frontsteps_posts_index_style', 'default' );
		}

		// Sidebar position.
		$frontsteps_sidebar_position = get_theme_mod( 'frontsteps_sidebar_position' );
		if ( '' == $frontsteps_sidebar_position ) {
			set_theme_mod( 'frontsteps_sidebar_position', 'right' );
		}

		// Container width.
		$frontsteps_container_type = get_theme_mod( 'frontsteps_container_type' );
		if ( '' == $frontsteps_container_type ) {
			set_theme_mod( 'frontsteps_container_type', 'container' );
		}
	}
}
