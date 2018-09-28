<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package frontsteps
 */

$container   = get_theme_mod( 'frontsteps_container_type' );
?>
<main class="site-main" id="main">
	<section class="error-404 not-found text-center search-content">
		<h3 class="not_found_heading"><?php esc_html_e( 'Nothing Found', 'frontsteps' ); ?></h3>
			<div class="not_found_cotent">
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'frontsteps' ); ?></p>
			

				<div class="button-block text-center">
		       		<a href="<?php echo home_url( '/' ); ?>" class="button button-primary">Go Home</a>
		    	</div>
		    
			</div>
	</section><!-- .error-404 -->
</main><!-- #main -->