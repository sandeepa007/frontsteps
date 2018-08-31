<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

$wp_version = get_bloginfo( 'version' );

if ( ( defined( 'ATTACHMENTS_LEGACY' ) && ATTACHMENTS_LEGACY === true ) || version_compare( $wp_version, '3.5', '<' ) ) {
  // load deprecated version of Attachments
  require_once get_template_directory().'/inc/frontsteps-gallery/deprecated/attachments.php';
} else {

  define( 'ATTACHMENTS_DIR', get_template_directory().'/inc/frontsteps-gallery/' );
  define( 'ATTACHMENTS_URL', get_template_directory_uri().'/inc/frontsteps-gallery/' );

  // load current version of Attachments
  require_once get_template_directory().'/inc/frontsteps-gallery/classes/class.attachments.php';
}
