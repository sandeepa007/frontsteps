<?php
/**
 * Frontsteps functions and definitions
 *
 * @package frontsteps
 */

/*-- REMOVE PAGES FROM SEARCH --*/
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');

/**
 * Initialize theme default variables.
 */
require get_template_directory() . '/inc/theme-vars.php';

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Register the required plugins for this theme.
 */
require get_template_directory() . '/inc/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * New widget area For Home Feature Section.
 */
require get_template_directory() . '/inc/home-features-widget.php';

/**
 * New widget area For Home Feature Section.
 */
require get_template_directory() . '/inc/register-post-type.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';


/**
 * Load gallery cutom fileds file.
 */
require get_template_directory() . '/inc/frontsteps-gallery/index.php';

/**
 * Load post type order drag and drop.
 */
require get_template_directory() . '/inc/post-types-order/post-types-order.php';


$my_theme = wp_get_theme();
if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
  {
  /**
   * Load Csv Importer.
   */
    require get_template_directory() . '/inc/wp-csv-importer.php';
  }
/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';
require 'inc/helpers.php';
require 'inc/customizer/customizer.php';

add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {
   $html = str_replace( 'img-fluid', 'img-responsive', $html );
    return $html;
}
/*-- REGISTER MENUS --*/
register_nav_menus( array(
    'right_menu'   => __( 'Right Menu', 'COA Theme' ),
    'footer_menu'   => __( 'Footer Menu', 'COA Theme' )
));


function enqueue_my_scripts() { ?>

<script type="text/javascript">
/* Themes warning */
    if( jQuery( 'body.themes-php' ).length ){
        var warningText = 'Changing themes may cause a loss of settings and data within the customizer and widgets, activate at your own discretion.';
        var themesBlock = document.querySelector('.theme-browser');
        themesBlock.insertAdjacentHTML('beforebegin', '<div class="notice notice-warning"><p>' + warningText + '</p></div>');
    }
</script>
<?php 
} 
add_action( 'in_admin_footer', 'enqueue_my_scripts' );
function add_blog_to_pagination( $query ) {
    
    $default_posts_per_page = (get_option('posts_per_page')) ? get_option('posts_per_page') : 10;
    if ( !is_admin() && $query->is_category()) {
        $query->set( 'posts_per_page',$default_posts_per_page);
    }
}
add_action( 'pre_get_posts', 'add_blog_to_pagination' );

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add your extension to the mimes array as below
    $existing_mimes['zip'] = 'application/zip';
    $existing_mimes['gz'] = 'application/x-gzip';
    return $existing_mimes;
}

/*function search_filter($query) {

  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      //echo $_GET['s'];exit;
      $query->set('post_type', array( 'post', 'movie' ) );
    }
  }
}

add_action('pre_get_posts','search_filter');*/

?>