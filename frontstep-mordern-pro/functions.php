<?php
require get_stylesheet_directory() . '/inc/home-features-widget.php';

$customizer_path = get_stylesheet_directory() . '/inc';
require $customizer_path.'/styles.php';
/**Custom Option for theme**/


add_action('customize_register', 'modernpro_customize_register', 1000);

function modernpro_customize_register($wp_customize) {
  $wp_customize->remove_control( 'about-section2-title' );
  $wp_customize->remove_control( 'about-section2-desc' );
  $wp_customize->remove_control( 'about-section3-title' );
  $wp_customize->remove_control( 'about-section3-desc' );  
  $wp_customize->remove_section( 'amenities_content' );  
  $wp_customize->remove_section( 'gallery_content' );    
}

/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_modernpro_options($wp_customize) {

    
    $sections = array();
    $panels = array();	
    
    $options['home-cta-title'] = array(
        'id' => 'home-cta-title',
        'label'   => __( 'Title', 'frontsteps' ),
        'section' => 'home_cta_section',
        'type'    => 'text',        
        'default' => 'Nullam Fermentum Tellus Magna'
    );
    
    $options['sections'] = $sections;
    $options['panels'] = $panels;
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );
}
add_action( 'init', 'customizer_library_modernpro_options', 15 );
/**
 * Register a custom post type called "Member".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_testimonial_init() {
   
/****** Registered Team Post Type*******/
    $labels = array(
        'name'                  => _x( 'Testimonial', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Testimonial', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Testimonial', 'frontsteps' ),
        'new_item'              => __( 'New Testimonial', 'frontsteps' ),
        'edit_item'             => __( 'Edit Testimonial', 'frontsteps' ),
        'view_item'             => __( 'View Testimonial', 'frontsteps' ),
        'all_items'             => __( 'All Testimonial', 'frontsteps' ),
        'search_items'          => __( 'Search Testimonial', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Testimonial:', 'frontsteps' ),
        'not_found'             => __( 'No Testimonials found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Testimonial Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Testimonial image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Testimonial image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as testimonial image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Testimonial archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Testimonial', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Testimonial', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'Testimonial', $args );

    $labels = array(
        'name'                  => _x( 'Service', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Service', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Service', 'frontsteps' ),
        'new_item'              => __( 'New Service', 'frontsteps' ),
        'edit_item'             => __( 'Edit Service', 'frontsteps' ),
        'view_item'             => __( 'View Service', 'frontsteps' ),
        'all_items'             => __( 'All Service', 'frontsteps' ),
        'search_items'          => __( 'Search Service', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Service:', 'frontsteps' ),
        'not_found'             => __( 'No Services found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Services found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Service Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Service image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Service image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Service image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-screenoptions',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'Service', $args );
    $labels = array(
        'name'                  => _x( 'Community', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Community', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Communities', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Community', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Community', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Community', 'frontsteps' ),
        'new_item'              => __( 'New Community', 'frontsteps' ),
        'edit_item'             => __( 'Edit Community', 'frontsteps' ),
        'view_item'             => __( 'View Community', 'frontsteps' ),
        'all_items'             => __( 'All Community', 'frontsteps' ),
        'search_items'          => __( 'Search Community', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Community:', 'frontsteps' ),
        'not_found'             => __( 'No Communities found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Communities found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Community Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Community image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Community image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Community image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Community archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Community', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Community', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Communities list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Communities list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Communities list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'community' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'community', $args );
    

    unregister_post_type( "amenity" );
    unregister_post_type( "frontsteps-gallery");
    //unregister_post_type( "accreditation");

}
add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
function my_title_place_holder($title , $post){

    if( $post->post_type == 'testimonial' ){
        $my_title = "Testimonial Name";
        return $my_title;
    }

    return $title;

}
add_action( 'init', 'wpdocs_codex_testimonial_init',20 );

/**/
function add_communities_meta_box() {
    add_meta_box(
        'communities_meta_box', // $id
        'Community Details', // $title
        'show_communities_meta_box', // $callback
        'community', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_communities_meta_box' );
function show_communities_meta_box() {
    global $post;  
    $meta = get_post_meta( $post->ID, 'community', true ); ?>
    <input type="hidden" name="community_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <!-- All fields will go here -->
    <p>
        <label for="community[url]">Link(URL)</label>
        <br>
        <input type="text" name="community[url]" id="community[url]" class="regular-text" value="<?php echo @$meta['url']; ?>">
    </p>
    <p>
        <label for="community[openin]">Open In New Window
            <input type="checkbox" name="community[openin]" value="1" <?php if ( @$meta['openin'] === '1' ) echo 'checked'; ?>>
        </label>
    </p>
<?php }

function save_communities_meta( $post_id ) {   
    // verify nonce
    if ( !wp_verify_nonce( $_POST['community_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id; 
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }  
    }
    
    $old = get_post_meta( $post_id, 'community', true );
    $new = $_POST['community'];

    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'community', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'community', $old );
    }
}
add_action( 'save_post', 'save_communities_meta' );

?>
