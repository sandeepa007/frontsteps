<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Demo
 */
if (!function_exists('customizer_library_demo_build_styles') && class_exists('Customizer_Library_Styles')) :

    /**
     * Process user options to generate CSS needed to implement the choices.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function customizer_library_demo_build_styles()
    {

        // Text Color
        $setting = 'text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));
        if ($mod !== customizer_library_get_default($setting)) {
            $color = sanitize_hex_color($mod);
            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'body',
                    'button',
                    'input',
                    'select',
                    'textarea',
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));

            /*Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.property .price',
                ),
                'declarations' => array(
                    'background-color' => $color
                ),
                'media' => '(max-width:768px)'
            ));*/

        }

        // Body Color
        $setting = 'body-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'body',
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));
        }

        // Anchore Color
        $setting = 'anchore-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'a',
                    '.section-testimonials .testimonial-block .icon-block',
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header',
                ),
                'declarations' => array(
                    'border-bottom' => '1px solid '.$color
                )
            ));
        }

         // Anchore Color hover
        $setting = 'anchore-hover-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    'a:hover',
                    'footer .company-details .fa:hover',
                    'footer .footer-menu ul li a:hover',
                    '#header .container .navigation-column .navbar-default .navbar-nav li a:hover',
                    '#header .container .navigation-column .navbar-default .navbar-nav li.active a'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
        }

        // Navigation Background Color
        $setting = 'nav-bg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header',
                    '#header .container .navigation-column .navbar-default',
                    '.main-nav'
                ),
                'declarations' => array(
                    'background' => $color."!important;"
                )
            ));
            
        }
        // Navigation text Color
        $setting = 'nav-txt-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header .container .navigation-column .navbar-default .navbar-nav li a',
                    '#right-main li a',
                    '#header .container .right-column ul li a'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
            
        }
        
        // Navigation text hover and selected Color
        $setting = 'nav-txt-hover-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '#header .container .navigation-column .navbar-default .navbar-nav li a:hover',
                    '#header .container .navigation-column .navbar-default .navbar-nav li.active a',
                    '#right-main li a:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
            
        }

         // button_color Color
        $setting = 'button-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.button-primary',
                    '#header .container .right-column ul li.login a',
                    '.section-contact .container .gform_wrapper input[type="submit"]'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
            
        }

         // button_ background Color
        $setting = 'button-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.button-primary',
                    '#header .container .right-column ul li.login a',
                    '.section-contact .container .gform_wrapper input[type="submit"]'
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));
        }

        // button_  Color hover
        $setting = 'button-hover-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.button-primary:hover',
                    '#header .container .right-column ul li.login a:hover',
                    '.section-contact .container .gform_wrapper input[type="submit"]:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            ));
           
        }

         // button_  bkg Color hover
        $setting = 'button-hover-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

             Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.button-primary:hover',
                    '#header .container .right-column ul li.login a:hover',
                    '.section-contact .container .gform_wrapper input[type="submit"]:hover',
                    //'.section-resources:nth-child(odd)'
                ),
                'declarations' => array(
                    'background' => $color."!important;"
                )
            ));
        }

         // cta_text_color
        $setting = 'cta-text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-home-cta',
                    '.section-cta',
                    '.modal-team .modal-dialog .modal-body',
                    '.page-template-aboutus-page .billboard-section h3.color-dark',
                    '.page-template-aboutus-page .billboard-section p'
                ),
                'declarations' => array(
                    'color' => $color."!important;"
                )
            ));
           
        }

         // cta_bkg_color
        $setting = 'cta-bkg-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));

        if ($mod !== customizer_library_get_default($setting)) {

            $color = sanitize_hex_color($mod);

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-home-cta',
                    '.section-cta',
                    '.modal-team .modal-dialog .modal-content',
                    '.page-template-aboutus-page .billboard-section'
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));

            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.not_found_heading',
                    '.not_found_cotent p'
                ),
                'declarations' => array(
                    'color' => $color
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
                    'footer',
                    'footer .company-details .fa'
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
                    //'.section-resources:nth-child(odd)'
                ),
                'declarations' => array(
                    'color' => $color
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
                    /*'.section-resources:nth-child(odd)',*/
                    /*'.section-accredidations'*/
                ),
                'declarations' => array(
                    'background' => $color
                )
            ));

           Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    '.section-resources:nth-child(odd)',
                ),
                'declarations' => array(
                    'background' => '#F7F9FC'
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

add_action('customizer_library_styles', 'customizer_library_demo_build_styles');

if (!function_exists('customizer_library_demo_styles')) :
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
    function customizer_library_demo_styles()
    {

        do_action('customizer_library_styles');

        // Echo the rules
        $css = Customizer_Library_Styles()->build();

        if (!empty($css)) {
            echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"demo-custom-css\">\n";
            echo $css;
            echo "\n</style>\n<!-- End Custom CSS -->\n";
        }
    }
endif;

add_action('wp_head', 'customizer_library_demo_styles', 11);
