<?php

function customizer_options(){

    // Theme defaults TO DO
    $text_color = '#33343C';
    $body_color = '#FFFFFF';
    $anchore_color = '#2D3340';
    $anchore_hover_color = "#4ABDD9";
    $button_color = '#FFFFFF';
    $button_bkg_color = "#4BBDD7";
    $button_hover_color = '#FFFFFF';
    $button_hover_bkg_color = "#2F3543";
    $cta_text_color = '#FFFFFF';
    $cta_bkg_color = "#2F3543";
    $footer_text_color =  $text_color;
    $footer_bkg_color = "#F8F9FD";
    $box_text_color =  $text_color;
    $box_bkg_color = $footer_bkg_color;

    $font_choices = customizer_library_get_font_choices();

    $start_choices = array(
        'option-1' => 'Start after page loads',
        'option-2' => 'Display as an user scrolls',
    );

    $customizer_structure = [
        /* Site Style Options */
        ['id' => 'style_options', 'title' => __('Site Style Options'), 'sections' => [
            ['id' => 'colors', 'title' => __('Colors'), 'options' => [
                ['id' => 'text-color', 'label' => __('Text Color'), 'type' => 'color', 'default' => $text_color, 'description' => 'This affects the default color for your text on your site.'],
                ['id' => 'body-color', 'label' => __('Body Background Color'), 'type' => 'color', 'default' => $body_color, 'description' => 'This affects the body background color for your pages.'],
                ['id' => 'anchore-color', 'label' => __('Anchor Color'), 'type' => 'color', 'default' => $anchore_color, 'description' => 'This affects the anchore text color in your site.'],
                ['id' => 'anchore-hover-color', 'label' => __('Anchor Hover Color'), 'type' => 'color', 'default' => $anchore_hover_color, 'description' => 'This affects the anchore text color in your site on rollover.'],
                ['id' => 'button-color', 'label' => __('Button Text Color'), 'type' => 'color', 'default' => $button_color, 'description' => 'This affects the button text color in your site.'],
                ['id' => 'button-bkg-color', 'label' => __('Button Background Color'), 'type' => 'color', 'default' => $button_bkg_color, 'description' => 'This affects the button Background color in your site.'],
                ['id' => 'button-hover-color', 'label' => __('Button Color(hover)'), 'type' => 'color', 'default' => $button_hover_color, 'description' => 'This affects the button text color in your site on rollover.'],
                ['id' => 'button-hover-bkg-color', 'label' => __('Button Background Color(hover)'), 'type' => 'color', 'default' => $button_hover_bkg_color, 'description' => 'This affects the button Background color in your site  on rollover.'],
                ['id' => 'cta-text-color', 'label' => __('CTA Text Color'), 'type' => 'color', 'default' => $cta_text_color, 'description' => 'This affects the default color for your CTA text on your site.'],
                ['id' => 'cta-bkg-color', 'label' => __('CTA Background Color'), 'type' => 'color', 'default' => $cta_bkg_color, 'description' => 'This affects the CTA background color for your pages.'],
                ['id' => 'cta-bkg-img', 'label' => __('CTA Background Image'), 'type' => 'upload', 'default' => get_stylesheet_directory_uri() . '/images/hero-about.jpg'],
                ['id' => 'footer-text-color', 'label' => __('Footer Text Color'), 'type' => 'color', 'default' => $footer_text_color, 'description' => 'This affects the default color for footer text on your site.'],
                ['id' => 'footer-bkg-color', 'label' => __('Footer Background Color'), 'type' => 'color', 'default' => $footer_bkg_color, 'description' => 'This affects the footer background color for your pages.'],   
                  ['id' => 'box-text-color', 'label' => __('Box Text Color'), 'type' => 'color', 'default' => $box_text_color, 'description' => 'This affects the default color for your box text on your site.'],
                ['id' => 'box-bkg-color', 'label' => __('Box Background Color'), 'type' => 'color', 'default' => $box_bkg_color, 'description' => 'This affects the box background color for your pages.'],            
            ]],
            /* Social Settings */
            ['id' => 'social_settings', 'title' => __('Social Settings'), 'options' => [
                ['id' => 'url-facebook', 'label' => __('Facebook URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-twitter', 'label' => __('Twitter URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-google', 'label' => __('Google+ URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-youtube', 'label' => __('Youtube URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-pinterest', 'label' => __('Pinterest URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-linkedin', 'label' => __('Linkedin URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-instagram', 'label' => __('Instagram URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-yelp', 'label' => __('Yelp URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],
                ['id' => 'url-blog', 'label' => __('Blog URL'), 'type' => 'url', 'description' => '(Leave empty to hide it)'],

            ]],
            ['id' => 'typography', 'title' => __('Typography'), 'options' => [
                ['id' => 'title-font', 'label' => __('Title Font'), 'type' => 'select', 'choices' => $font_choices, 'default' => 'Roboto Slab', 'description' => 'Default: Roboto Slab'],
                ['id' => 'body-font', 'label' => __('Body Font'), 'type' => 'select', 'choices' => $font_choices, 'default' => 'Open Sans', 'description' => 'Default: Open Sans' ],
            ]],
            ]],
       
        /* About Us Page */
            ['id' => 'aboutus_content', 'title' => __('About Us Settings'), 'options' => [
            ['id' => 'about-title', 'label' => __('Title'), 'type' => 'text', 'default' => __('What Makes Us Unique.')],
            ['id' => 'about-subtitle', 'label' => __('Subtitle'), 'type' => 'textarea'],
            ['id' => 'about-hero', 'label' => __('Hero Image'), 'type' => 'upload', 'default' => get_stylesheet_directory_uri() . '/images/hero-about.jpg'],
            ['id' => 'about-section1-title', 'label' => __('Section 1 Title'), 'type' => 'text', 'default' => __('Value')],
            ['id' => 'about-section1-desc', 'label' => __('Section 1 Description'), 'type' => 'textarea', 'default' => __('You’ll quickly discover that our team is committed to making sure your investment is a good one.')],
            ['id' => 'about-section2-title', 'label' => __('Section 2 Title'), 'type' => 'text', 'default' => __('Integrity')],
            ['id' => 'about-section2-desc', 'label' => __('Section 2 Description'), 'type' => 'textarea', 'default' => __('We are good stewards of your money and have complete transparency when it comes to where your dues and fees are going.')],
            ['id' => 'about-section3-title', 'label' => __('Section 3 Title'), 'type' => 'text', 'default' => __('Experience ')],
            ['id' => 'about-section3-desc', 'label' => __('Section 3 Description'), 'type' => 'textarea', 'default' => __('With over 25 years of commitment to the management industry, our team has the experience needed to help keep our condo running smoothly.')],
            ['id' => 'show-team-section-bod', 'label' => __('Show Board of Director'), 'type' => 'checkbox', 'default' => 1],
            ['id' => 'show-team-section-emplye', 'label' => __('Show Employee'), 'type' => 'checkbox', 'default' => 0],
            ['id' => 'bod-section-title', 'label' => __('Board of Director Section Title'), 'type' => 'text', 'default' => __('Board of Directors')],
            ['id' => 'emplyee-section-title', 'label' => __('Employee Section Title'), 'type' => 'text', 'default' => __('Employee')],
        ]],
        /* Resources Page */
        ['id' => 'resources_content', 'title' => __('Resources Settings'), 'options' => [
            ['id' => 'resources-title', 'label' => __('Title'), 'type' => 'text', 'default' => __('What Makes Us Unique.')],
            ['id' => 'resources-subtitle', 'label' => __('Subtitle'), 'type' => 'textarea'],
            ['id' => 'resources-hero', 'label' => __('Hero Image'), 'type' => 'upload', 'default' => get_stylesheet_directory_uri() . '/images/hero-about.jpg'],            
        ]],
        /* Amenity Page */
        ['id' => 'amenities_content', 'title' => __('Amenities Settings'), 'options' => [
            ['id' => 'amenities-title', 'label' => __('Title'), 'type' => 'text', 'default' => __('What Makes Us Unique.')],
            ['id' => 'amenities-subtitle', 'label' => __('Subtitle'), 'type' => 'textarea'],
            ['id' => 'amenities-hero', 'label' => __('Hero Image'), 'type' => 'upload', 'default' => get_stylesheet_directory_uri() . '/images/hero-about.jpg'],            
            ['id' => 'amenities-section1-title', 'label' => __('Section 1 Title'), 'type' => 'text', 'default' => __('What Makes Us Unique.')],
            ['id' => 'amenities-section1-subtitle', 'label' => __('Section 1 Content'), 'type' => 'textarea'],
        ]],
        /* Gallery Page */
        ['id' => 'gallery_content', 'title' => __('Gallery Settings'), 'options' => [
            ['id' => 'gallery-title', 'label' => __('Section Title'), 'type' => 'text', 'default' => __('What Makes Us Unique.')],
            ['id' => 'gallery-subtitle', 'label' => __('Section Subtitle'), 'type' => 'textarea'],            
        ]],
        /* Contact Us Page */
        ['id' => 'contact_content', 'title' => __('Contact Settings'), 'options' => [
            ['id' => 'contact-title', 'label' => __('Title'), 'type' => 'text', 'default' => __('Drop Us A Line.')],
            ['id' => 'contact-subtitle', 'label' => __('Subtitle'), 'type' => 'textarea'],
            ['id' => 'contact-hero', 'label' => __('Hero Image'), 'type' => 'upload', 'default' => get_stylesheet_directory_uri() . '/images/hero-contact.jpg'],
            ['id' => 'contact-address', 'label' => __('Contact Address'), 'type' => 'textarea'],
            ['id' => 'contact-phone', 'label' => __('Contact Phone'), 'type' => 'text'],
            ['id' => 'contact-map', 'label' => __('Map (Embed Code URL)'), 'type' => 'textarea'],
        ]],
        /* 404 Page */
        ['id' => '404_content', 'title' => __('404 Page Setting'), 'options' => [
            ['id' => '404_desc', 'label' => __('Page Content'), 'type' => 'textarea', 'default' => __('Oops.. We couldn’t find this page.')],
            ['id' => '404_button_text', 'label' => __('Button Text'), 'type' => 'text','default' => __('Go Home')],
            ['id' => '404_button_link', 'label' => __('Button Link'), 'type' => 'text','default' => __('#')],
            
        ]],

         /* Thank You Page */
        ['id' => 'ty_content', 'title' => __('Thank You Page Setting'), 'options' => [
            ['id' => 'ty_desc', 'label' => __('Page Content'), 'type' => 'textarea', 'default' => __('We will look over your message and get back to you.')],
            ['id' => 'ty_button_text', 'label' => __('Button Text'), 'type' => 'text','default' => __('Go Home')],
            ['id' => 'ty_button_link', 'label' => __('Button Link'), 'type' => 'text','default' => __('#')],
            
        ]],
    ];

    $options = process_customizer_hirearchy($customizer_structure);

    $frontsteps_customizer = Customizer_Library::instance();
    $frontsteps_customizer->add_options($options);

    // To delete custom mods use: customizer_library_remove_theme_mods();
}

add_action('init', 'customizer_options', 10);


/*
Deconstruct hierarchical customizer structure.
Takes a multi-dimensional array like the above, simulating customizer panel-section-option structure
and turns it into customizer-compatible 1 dimensional array
*/
function process_customizer_hirearchy($customizer_structure = []){

    $panels = $sections = $options = [];

    foreach($customizer_structure as $priority => $top_level){
        if(isset($top_level['sections'])){
            // If it has sections, it's a panel
            $panels[$top_level['id']] = ['id' => $top_level['id'], 'title' => $top_level['title'], 'priority' => $priority + 200];
            foreach($top_level['sections'] as $priority => $section){
                $sections[$section['id']] = ['id' => $section['id'], 'title' => $section['title'], 'panel' => $top_level['id']];
                if(isset($section['options'])){
                    foreach($section['options'] as $option){
                        $options[$option['id']] = $option + ['section' => $section['id']];
                    }
                }
            }
        }else if(isset($top_level['options'])){
            // If it has options, it's a section
            $sections[$top_level['id']] = ['id' => $top_level['id'], 'title' => $top_level['title'], 'priority' => $priority + 200];
            foreach($top_level['options'] as $priority => $option){
                $options[$option['id']] = $option + ['section' => $top_level['id']];
            }
        }
    }
    $options['panels'] = $panels;
    $options['sections'] = $sections;

    return $options;
}
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

    // Theme defaults TO DO
    $text_color = '#4CBDD7';
    $body_color = '#428FBB';
    $anchore_color = '#4CBDD7';

    $options = array();
    $sections = array();
    $panels = array();

    // Panel Style Site Option
    $panel = 'style_options';
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Site Style Options', 'frontsteps' ),
        'priority' => '15'
    );
    // Color Option
    $section = 'colors';
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Colors', 'frontsteps' ),
        'priority' => '30',
        'panel' => $panel
    );

    /*$options['primary-color'] = array(
        'id' => 'primary-color',
        'label'   => __( 'Primary Color', 'frontsteps' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $text_color,
        'description' => 'This affects the default color for your accent color'
    );
    $options['secondary-color'] = array(
        'id' => 'secondary-color',
        'label'   => __( 'Secondary Color', 'frontsteps' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_color,
        'description' => 'This affects on body font color'
    );
    $options['tertiary-color'] = array(
        'id' => 'tertiary-color',
        'label'   => __( 'Tertiary Color', 'frontsteps' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $anchore_color,
    );*/

    // Background Colors Option
    $section = 'bg-colors';
    $options['bg-getstarted'] = array(
        'id' => 'bg-getstarted',
        'label'   => __( 'Background Color - Get Started Form', 'frontsteps' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#2e4c33'
    );  

    $font_choices = customizer_library_get_font_choices();

    // Panel Style Site Option
    $panel = 'home_content';
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Home Settings', 'frontsteps' ),
        'priority' => '200'
    );

    // Home Hero
    $section = 'home_hero_section';
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Hero Settings', 'frontsteps' ),
        'priority' => '30',
        'panel' => $panel
    );

    $options['home-hero-image'] = array(
        'id' => 'home-hero-image',
        'label'   => __( 'Hero Image', 'frontsteps' ),
        'section' => $section,
        'type'    => 'upload',
        'default' => get_stylesheet_directory_uri() .'/img/hero-home.jpg',
    );
    $options['home-hero-title'] = array(
        'id' => 'home-hero-title',
        'label'   => __( 'Hero Title', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'welcome Home',
    );

     $options['home-hero-desc'] = array(
        'id' => 'home-hero-desc',
        'label'   => __( 'Hero Description', 'frontsteps' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => 'A Modern Community in the Heart of the City',
    );
     $options['hero-overlay'] = array(
        'id' => 'hero-overlay',
        'label'   => __( 'Hide Overlay', 'frontsteps' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );      
    $options['hero-overlay-color'] = array(
        'id' => 'hero-overlay-color',
        'label'   => __( 'Hero Overlay Color', 'frontsteps' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#000000',
    );  
    $options['hero-overlay-opacity'] = array(
        'id' => 'hero-overlay-opacity',
        'label'   => __( 'Hero Overlay Transparence', 'frontsteps' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 99,
            'step'  => 10,
            'style' => 'color:#a8a8a8',
        ),
        'default' => '40',
        'description' => 'This affects the transparence of Hero Overlay.'
    );
    
    // Home Hero Slider Settings
    $section = 'home_hero_slider_section';
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Hero Slider Settings', 'frontsteps' ),
        'priority' => '30',
        'panel' => $panel
    );

    $options['is-hero-slider'] = array(
        'id' => 'is-hero-slider',
        'label'   => __( 'Activate Hero Slider', 'frontsteps' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    ); 

    for( $i=1 ; $i<=10 ; $i++)
    {
        $options['home-hero-slide'.$i] = array(
        'id' => 'home-hero-slide'.$i,
        'label'   => __( 'Slide '.$i, 'frontsteps' ),
        'section' => $section,
        'type'    => 'upload',
        'default' => get_stylesheet_directory_uri() .'/img/hero-home.jpg',
        );

        $options['home-hero-slider-title'.$i] = array(
            'id' => 'home-hero-slider-title'.$i,
            'label'   => __( 'Slider '.$i.' Title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'Welcome Home',
        );

        $options['home-hero-slider-subtitle'.$i] = array(
            'id' => 'home-hero-slider-subtitle'.$i,
            'label'   => __( 'Slider '.$i.' Subtitle', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'A Modern Community in the Heart of the City',
        );
    }

    // Home Other
    $section = 'home_other_section';
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Other Settings', 'frontsteps' ),
        'priority' => '30',
        'panel' => $panel
    );
    $options['home-hide-gallery'] = array(
        'id' => 'home-hide-gallery',
        'label'   => __( 'Show Gallery Section', 'frontsteps' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['home-section1-title'] = array(
        'id' => 'frontsteps_home_section1_title',
        'label'   => __( 'Section 1 Title', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Connections that last',
    );
    $options['home-section1-description'] = array(
        'id' => 'frontsteps_home_section1_description',
        'label'   => __( 'Section 1 Description', 'frontsteps' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => 'We pride ourselves on keeping our residents connected through events and activities. Our on-site manager is engaged with the community, and through our website and mobile app keeps everyone informed about area happenings, maintenance, security, and more.',
    );

    // Home CTA Settings
    $section = 'home_cta_section';
    
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Call to Action Settings', 'frontsteps' ),
        'priority' => '30',
        'panel' => $panel
    );
    $options['home-cta-desc'] = array(
        'id' => 'home-cta-desc',
        'label'   => __( 'Description', 'frontsteps' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => 'We’d love to tell you our story and answer any questions about life in our community.',
    );

    $options['home-cta-button-text'] = array(
        'id' => 'home-cta-button-text',
        'label'   => __( 'Button Text', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'More Aboutus',
    );
    $options['home-cta-button-url'] = array(
        'id' => 'home-cta-button-url',
        'label'   => __( 'Button Url', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '#',
    );

    
    // Call to Action settings
    $section = 'call-to-actions';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Global Call to Action', 'frontsteps' ),
        'priority' => '180'
    );

    $options['cta-desc'] = array(
        'id' => 'cta-desc',
        'label'   => __( 'Description', 'frontsteps' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => 'We’d love to tell you our story and answer any questions about life in our community.',
    );

    $options['cta-button-text'] = array(
        'id' => 'cta-button-text',
        'label'   => __( 'Button Text', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'More Aboutus',
    );
    $options['cta-button-url'] = array(
        'id' => 'cta-button-url',
        'label'   => __( 'Button Url', 'frontsteps' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '#',
    );

    $my_theme = wp_get_theme();
    if($my_theme == "Modern Pro" || $my_theme == "Desert Sky" || $my_theme == "Urban Chic" )
    {
        // Service settings
        $section = 'services_content';

        $sections[] = array(
            'id' => $section,
            'title' => __( 'Services Settings', 'frontsteps' ),
            'priority' => '400'
        );

        $options['services-hero'] = array(
            'id' => 'services-hero',
            'label'   => __( 'Hero Image', 'frontsteps' ),
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
        $options['services-title'] = array(
            'id' => 'services-title',
            'label'   => __( 'Title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'Services',
        );
        $options['services-subtitle'] = array(
            'id' => 'services-subtitle',
            'label'   => __( 'Sub title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'Nullam Fermentum Tellus Magna',
        );
        
        // Communities settings
        $section = 'community_content';
        
        $sections[] = array(
            'id' => $section,
            'title' => __( 'Communities Settings', 'frontsteps' ),
            'priority' => '400'
        );

        $options['community-hero'] = array(
            'id' => 'community-hero',
            'label'   => __( 'Hero Image', 'frontsteps' ),
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
        $options['community-title'] = array(
            'id' => 'community-title',
            'label'   => __( 'Title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text', 
            'default' => 'Our Communities',
        );

        $options['community-sub-title'] = array(
            'id' => 'community-sub-title',
            'label'   => __( 'Sub Title', 'frontsteps-desert-sky' ),
            'section' => $section,
            'type'    => 'text',        
            'default' => 'Nullam Fermentum Tellus Magna'
        );
        $options['community-info'] = array(
            'id' => 'community-info',
            'label'   => __( 'Info', 'frontsteps-desert-sky' ),
            'section' => $section,
            'type'    => 'text',        
            'default' => 'Nullam Fermentum Tellus Magna'
        );
        $options['community-info-subtitle'] = array(
            'id' => 'community-info-subtitle',
            'label'   => __( 'Info Subtitle', 'frontsteps-desert-sky' ),
            'section' => $section,
            'type'    => 'text',        
            'default' => 'Nullam Fermentum Tellus Magna'
        );

        // Request Proposal settings
        $section = 'rq_proposal';

        $sections[] = array(
            'id' => $section,
            'title' => __( 'Request Proposal', 'frontsteps' ),
            'priority' => '400'
        );

        $options['rq_proposal-hero'] = array(
            'id' => 'rq_proposal-hero',
            'label'   => __( 'Hero Image', 'frontsteps' ),
            'section' => $section,
            'type'    => 'upload',
            'default' => '',
        );
        $options['rq_proposal-title'] = array(
            'id' => 'rq_proposal-title',
            'label'   => __( 'Title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'Request Proposal',
        );
        $options['rq_proposal-subtitle'] = array(
            'id' => 'rq_proposal-subtitle',
            'label'   => __( 'Sub title', 'frontsteps' ),
            'section' => $section,
            'type'    => 'text',
            'default' => 'Nullam Fermentum Tellus Magna',
        );
    }
    
    $options['sections'] = $sections;
    $options['panels'] = $panels;

    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );

    // To delete custom mods use: customizer_library_remove_theme_mods();
}
add_action( 'init', 'customizer_library_demo_options', 10 );

add_action('customize_register', 'themename_customize_register');

function themename_customize_register($wp_customize) {
  $wp_customize->remove_section( 'static_front_page' );
}