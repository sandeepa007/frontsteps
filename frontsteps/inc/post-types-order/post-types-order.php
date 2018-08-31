<?php
/*
Plugin Name: Post Types Order
*/

    define('CPTPATH',   get_template_directory().'/inc/post-types-order/');
    define('CPTURL',    get_template_directory_uri().'/inc/post-types-order/');
    
    include_once(CPTPATH . 'include/class.cpto.php');
    include_once(CPTPATH . 'include/class.functions.php');
  
    add_action( 'init', 'cpto_class_load');     
    function cpto_class_load()
        {
            global $CPTO;
            $CPTO   =   new CPTO();
        }
                

    add_action( 'init', 'cpto_load_textdomain'); 
    function cpto_load_textdomain() 
        {
            load_plugin_textdomain('post-types-order', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages');
        }
 
        
    add_action('wp_loaded', 'initCPTO' ); 	
    function initCPTO() 
        {
	        global $CPTO;

            $options          =     $CPTO->functions->get_options();

            if (is_admin())
                {
                    if(isset($options['capability']) && !empty($options['capability']))
                        {
                            if( current_user_can($options['capability']) )
                                $CPTO->init(); 
                        }
                    else if (is_numeric($options['level']))
                        {
                            if ( $CPTO->functions->userdata_get_user_level(true) >= $options['level'] )
                                $CPTO->init();
                        }
                        else
                            {
                                $CPTO->init();
                            }
                }        
        }
        
   

?>