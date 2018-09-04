<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Demo
 */
if (!function_exists('customizer_library_demo_build_styles_bb')) :

    /**
     * Process user options to generate CSS needed to implement the choices.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function customizer_library_demo_build_styles_bb()
    {

        
         // cta_text_color
        $setting = 'nav-text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header .container .navigation-column .navbar-default .navbar-nav li a',
                    '#header .container .navigation-column .navbar-default .navbar-nav li.active a'                   
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
           
        }

         // cta_bkg_color
        $setting = 'nav-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header'
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));


        }
         // footer_text_color
        $setting = 'cta-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-testimonials'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            ));
           
        }
        
         // footer_text_color
        $setting = 'footer-text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'footer'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
           
        }

         // footer_bkg_color
        $setting = 'footer-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'footer',
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));
        }

         // box_text_color
        $setting = 'box-text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-image-text',
                    '.section-resources:nth-child(even)'
                ),
                'declarations' => array(
                    'color' => $color .'!important',
                )
            ));
            
        }

         // box_bkg_color
        $setting = 'box-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

           Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-image-text',
                    '.bg-lightgrey',
                    '.section-resources:nth-child(even)',
                    '.section-accredidations'
                ),
                'declarations' => array(
                    'background' => $color .'!important',
                )
            ));
        }

     
        // Body Font
        $setting = 'body-font';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));
        $stack = customizer_library_get_font_stack($mod);

        if ($mod != customizer_library_get_default($setting)) {

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'body',
                    'button',
                    'input',
                    'select',
                    'textarea',
                    'p',
                    'a'
                ),
                'declarations' => array(
                    'font-family' => $stack
                )
            ));

        }

        // Title Font
        $setting = 'title-font';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));
        $stack = customizer_library_get_font_stack($mod);

        if ($mod != customizer_library_get_default($setting)) {

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'h1',
                    'h2',
                    'h3',
                    'h4',
                    'h5',
                    'h6'
                ),
                'declarations' => array(
                    'font-family' => $stack." !important;"
                )
            ));

        }

        // Home Title Font
        $setting = 'home-title-font';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));
        $stack = customizer_library_get_font_stack($mod);

        if ($mod != customizer_library_get_default($setting)) {

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'body.home .page-hero h1'
                ),
                'declarations' => array(
                    'font-family' => $stack
                )
            ));

        }

    }
endif;

add_action('customizer_library_styles_bb', 'customizer_library_demo_build_styles_bb');

if (!function_exists('customizer_library_demo_styles_bb')) :
    /**
     * Generates the style tag and CSS needed for the theme options.
     *
     * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
     * It is organized this way to ensure there is only one "style" tag.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function customizer_library_demo_styles_bb()
    {

        do_action('customizer_library_styles_bb');

        // Echo the rules
        $css = Customizer_Library_Styles()->build();

        if (!empty($css)) {
            echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"demo-custom-css-bb\">\n";
            echo $css;
            echo "\n</style>\n<!-- End Custom CSS -->\n";
        }
    }
endif;

add_action('wp_head', 'customizer_library_demo_styles_bb', 20);