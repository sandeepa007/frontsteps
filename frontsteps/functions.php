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
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

$formobj = json_decode('{"title":"Contact Us","description":"","labelPlacement":"top_label","descriptionPlacement":"below","button":{"type":"text","text":"Submit","imageUrl":""},"fields":[{"type":"name","id":1,"label":"Name","adminLabel":"","isRequired":false,"size":"medium","errorMessage":"","visibility":"visible","nameFormat":"advanced","inputs":[{"id":"1.2","label":"Prefix","name":"","choices":[{"text":"Mr.","value":"Mr.","isSelected":false,"price":""},{"text":"Mrs.","value":"Mrs.","isSelected":false,"price":""},{"text":"Miss","value":"Miss","isSelected":false,"price":""},{"text":"Ms.","value":"Ms.","isSelected":false,"price":""},{"text":"Dr.","value":"Dr.","isSelected":false,"price":""},{"text":"Prof.","value":"Prof.","isSelected":false,"price":""},{"text":"Rev.","value":"Rev.","isSelected":false,"price":""}],"isHidden":true,"inputType":"radio"},{"id":"1.3","label":"First","name":"","customLabel":"First Name"},{"id":"1.4","label":"Middle","name":"","isHidden":true},{"id":"1.6","label":"Last","name":"","customLabel":"Last Name"},{"id":"1.8","label":"Suffix","name":"","isHidden":true}],"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"email","id":2,"label":"Email","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_left_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","emailConfirmEnabled":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"phone","id":3,"label":"Phone","adminLabel":"","isRequired":true,"size":"large","errorMessage":"","visibility":"visible","inputs":null,"phoneFormat":"standard","formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"gf_right_half","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","form_id":"","productField":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"displayOnly":""},{"type":"textarea","id":4,"label":"Message","adminLabel":"","isRequired":false,"size":"medium","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","form_id":"","useRichTextEditor":false,"multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false}],"version":"2.3.3.6","id":1,"useCurrentUserAsAuthor":true,"postContentTemplateEnabled":false,"postTitleTemplateEnabled":false,"postTitleTemplate":"","postContentTemplate":"","lastPageButton":null,"pagination":null,"firstPageCssClass":null,"confirmations":[{"id":"5b76a660e365c","name":"Default Confirmation","isDefault":true,"type":"message","message":"Thanks for contacting us! We will get in touch with you shortly.","url":"","pageId":"","queryString":""}],"notifications":[{"id":"5b76a660dc8ac","to":"{admin_email}","name":"Admin Notification","event":"form_submission","toType":"email","subject":"New submission from {form_title}","message":"{all_fields}"}]}', true);

//$result = GFAPI::add_form($formobj);
//print_r($result);
//exit;

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

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

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
?>