<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Demo
 */
if (!function_exists('customizer_library_demo_build_styles_im')) :

    /**
     * Process user options to generate CSS needed to implement the choices.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function customizer_library_demo_build_styles_im()
    {

        // Text Color
        $setting = 'text-color';
        $mod = get_theme_mod($setting, customizer_library_get_default($setting));
        if ($mod !== customizer_library_get_default($setting)) {
            $color = sanitize_hex_color($mod);
            Customizer_Library_Styles()->add(array(
                'selectors' => array(
                    ''
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
                    '',
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
                    ''
                ),
                'declarations' => array(
                    'color' => $color
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
                    ''
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
                ),
                'declarations' => array(
                    'border' => '1px solid '.$color,
                    'background' => $color.'!important;'
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
                ),
                'declarations' => array(
                    'border' => '1px solid '.$color,
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
                    '.section-contact .container .gform_wrapper input[type="submit"]'
                ),
                'declarations' => array(
                    'color' => $color
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
                    '.section-contact .container .gform_wrapper input[type="submit"]'
                ),
                'declarations' => array(
                    'background' => $color
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
                    '.section-resources:nth-child(odd)'
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
                    '.section-resources:nth-child(odd)'
                ),
                'declarations' => array(
                    'background' => $color
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

add_action('customizer_library_styles_im', 'customizer_library_demo_build_styles_im');

if (!function_exists('customizer_library_demo_styles_im')) :
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
    function customizer_library_demo_styles_im()
    {

        do_action('customizer_library_styles_im');

        // Echo the rules
        $css = Customizer_Library_Styles()->build();

        if (!empty($css)) {
            echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"demo-custom-css-im\">\n";
            echo $css;
            echo "\n</style>\n<!-- End Custom CSS -->\n";
        }
    }
endif;

add_action('wp_head', 'customizer_library_demo_styles_im', 20);
