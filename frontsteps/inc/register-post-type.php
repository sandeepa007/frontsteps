<?php
/**
 * Register a custom post type called "Member".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_Member_init() {
   
/****** Registered Team Post Type*******/
    $labels = array(
        'name'                  => _x( 'Team', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Team', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Teams', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Team', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Member', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Member', 'frontsteps' ),
        'new_item'              => __( 'New Member', 'frontsteps' ),
        'edit_item'             => __( 'Edit Member', 'frontsteps' ),
        'view_item'             => __( 'View Member', 'frontsteps' ),
        'all_items'             => __( 'All Members', 'frontsteps' ),
        'search_items'          => __( 'Search Members', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Members:', 'frontsteps' ),
        'not_found'             => __( 'No Members found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Members found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Member Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Member image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Member image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Member image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Members list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'member' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'Member', $args );


/****** Registered Amenity Post Type*******/

    $labels = array(
        'name'                  => _x( 'Amenity', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Amenity', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Amenities', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Amenity', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Amenity', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Amenity', 'frontsteps' ),
        'new_item'              => __( 'New Amenity', 'frontsteps' ),
        'edit_item'             => __( 'Edit Amenity', 'frontsteps' ),
        'view_item'             => __( 'View Amenity', 'frontsteps' ),
        'all_items'             => __( 'All Amenities', 'frontsteps' ),
        'search_items'          => __( 'Search Amenities', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Amenities:', 'frontsteps' ),
        'not_found'             => __( 'No Amenities found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Amenities found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Amenity Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Amenity image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Amenity image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Amenity image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Amenity archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Amenity', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Amenity', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Amenities list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Amenities list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Amenities list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'amenity' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-shield',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'Amenity', $args );

/****** Registered Resource Post Type*******/

    $labels = array(
        'name'                  => _x( 'Resource', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Resource', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Resources', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Resource', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Resource', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Resource', 'frontsteps' ),
        'new_item'              => __( 'New Resource', 'frontsteps' ),
        'edit_item'             => __( 'Edit Resource', 'frontsteps' ),
        'view_item'             => __( 'View Resource', 'frontsteps' ),
        'all_items'             => __( 'All Resources', 'frontsteps' ),
        'search_items'          => __( 'Search Resources', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Resources:', 'frontsteps' ),
        'not_found'             => __( 'No Resources found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Resources found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Resource Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Resource image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Resource image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Resource image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Resource archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Resource', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Resource', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Resources list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Resources list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Resources list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resource' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-star-half',
        'supports'           => array( 'title', 'editor'),
    );
 
    register_post_type( 'Resource', $args );

/****** Registered Accreditation Post Type*******/

$labels = array(
        'name'                  => _x( 'Accreditation', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Accreditation', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Accreditations', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Accreditation', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Accreditation', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Accreditation', 'frontsteps' ),
        'new_item'              => __( 'New Accreditation', 'frontsteps' ),
        'edit_item'             => __( 'Edit Accreditation', 'frontsteps' ),
        'view_item'             => __( 'View Accreditation', 'frontsteps' ),
        'all_items'             => __( 'All Accreditations', 'frontsteps' ),
        'search_items'          => __( 'Search Accreditations', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Accreditations:', 'frontsteps' ),
        'not_found'             => __( 'No Accreditations found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Accreditations found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Accreditation Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Accreditation image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Accreditation image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Accreditation image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Accreditation archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Accreditation', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Accreditation', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Accreditations list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Accreditations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Accreditations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'accreditation' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-universal-access',
        'supports'           => array( 'title', 'editor','thumbnail'),
    );
 
    register_post_type( 'Accreditation', $args );

/****** Registered Gallery Post Type*******/

$labels = array(
        'name'                  => _x( 'Gallery', 'Post type general name', 'frontsteps' ),
        'singular_name'         => _x( 'Gallery', 'Post type singular name', 'frontsteps' ),
        'menu_name'             => _x( 'Galleries', 'Admin Menu text', 'frontsteps' ),
        'name_admin_bar'        => _x( 'Gallery', 'Add New on Toolbar', 'frontsteps' ),
        'add_new'               => __( 'Add New Gallery', 'frontsteps' ),
        'add_new_item'          => __( 'Add New Gallery', 'frontsteps' ),
        'new_item'              => __( 'New Gallery', 'frontsteps' ),
        'edit_item'             => __( 'Edit Gallery', 'frontsteps' ),
        'view_item'             => __( 'View Gallery', 'frontsteps' ),
        'all_items'             => __( 'All Galleries', 'frontsteps' ),
        'search_items'          => __( 'Search Galleries', 'frontsteps' ),
        'parent_item_colon'     => __( 'Parent Galleries:', 'frontsteps' ),
        'not_found'             => __( 'No Galleries found.', 'frontsteps' ),
        'not_found_in_trash'    => __( 'No Galleries found in Trash.', 'frontsteps' ),
        'featured_image'        => _x( 'Gallery Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'set_featured_image'    => _x( 'Set Gallery image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'remove_featured_image' => _x( 'Remove Gallery image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'use_featured_image'    => _x( 'Use as Gallery image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frontsteps' ),
        'archives'              => _x( 'Gallery archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frontsteps' ),
        'insert_into_item'      => _x( 'Insert into Gallery', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frontsteps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Gallery', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frontsteps' ),
        'filter_items_list'     => _x( 'Filter Galleries list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frontsteps' ),
        'items_list_navigation' => _x( 'Galleries list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frontsteps' ),
        'items_list'            => _x( 'Galleries list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'frontsteps' ),
    );
 /*$posts_permition = false;
 if ( is_multisite() ) {
        $posts_permition = do_not_allow;
    }*/
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'frontsteps-gallery' ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array( 'title'),
        'capability_type'    => 'post',
        /*'capabilities' => array(
            'edit_posts' => true,
            'create_posts' => $posts_permition,
            'delete_post' => $posts_permition,
        ),*/
    );
 
    register_post_type( 'frontsteps-gallery', $args );

}

add_action( 'init', 'wpdocs_codex_Member_init' );

/****** Registered taxanomy for member type*******/
function member_taxonomy() {  
    register_taxonomy(  
        'member_type',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'member',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Member Type',  //Display name
            'query_var' => true,
            'show_ui'   => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'themes', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'member_taxonomy');

// Register Custom Taxonomy
function add_new_custom_taxonomy() {
   //CODE TO REGISTER TAXONOMY
if( !term_exists( 'Board of Director', 'member_type' ) ) {
       wp_insert_term(
            'Board of Director',   // the term 
            'member_type', // the taxonomy
            array(
                'slug'        => 'member_board_of_directors'
            )
        );
   }
if( !term_exists( 'Employee', 'member_type' ) ) {
       wp_insert_term(
            'Employee',   // the term 
            'member_type', // the taxonomy
            array(
                'slug'        => 'member_employee'
            )
        );
   }
}

// Hook into the 'init' action
add_action( 'init', 'add_new_custom_taxonomy');

/* to check if gallery post type have post */
$query = new WP_Query(array(
    'post_type' => 'frontsteps-gallery'
));

if( $query->have_posts() ){
} else {
    // Gather post data.
        $gallary_post = array(
            'post_title'    => 'Gallery Images',
            'post_content'  => '',
            'post_type'     => 'frontsteps-gallery',
            'post_status'   => 'publish',
            //'post_author'   => 1,
        );
    // Insert the post into the database.
    wp_insert_post( $gallary_post );
}


?>