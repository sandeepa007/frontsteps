<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package frontsteps
 */

$container = get_theme_mod( 'frontsteps_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php $faviconUrl = get_theme_mod('site-favicon', get_template_directory_uri() . '/img/favicons/favicon.png'); 
		echo '<link rel="apple-touch-icon" href="'.$faviconUrl.'">';
    	echo '<link rel="shortcut icon" type="image/png" href="'.$faviconUrl.'" />';
	?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<!-- Header -->
<!-- Main Container -->
<div class="main-container">