<?php

/**
 * This functions returns a single string value form the bapi_solutiondata array
 *
 * @global array $bapi_solutiondata
 * @param String $key
 * @param String $defaultValue
 * @return String
 */
function getSolutionDataValue($key, $defaultValue = "")
{
    global $bapi_solutiondata;

    if(!is_array($bapi_solutiondata)){
        $bapi_data = get_option('bapi_solutiondata');
        $bapi_solutiondata  = json_decode($bapi_data, ARRAY_A);
    }

    if (is_array($bapi_solutiondata) && array_key_exists($key, $bapi_solutiondata)) {
        return $bapi_solutiondata[$key];
    }

    return $defaultValue;
}


/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
function slbd_count_widgets($sidebar_id)
{
    // If loading from front page, consult $_wp_sidebars_widgets rather than options
    // to see if wp_convert_widget_settings() has made manipulations in memory.
    global $_wp_sidebars_widgets;
    if (empty($_wp_sidebars_widgets)){
        $_wp_sidebars_widgets = get_option('sidebars_widgets', array());
    }

    $sidebars_widgets_count = $_wp_sidebars_widgets;

    if (isset($sidebars_widgets_count[$sidebar_id])) :
        $widget_count = count($sidebars_widgets_count[$sidebar_id]);
        $widget_classes = 'widget-count-' . count($sidebars_widgets_count[$sidebar_id]);
        if ($widget_count % 4 == 0 || $widget_count > 6) :
            // Four widgets per row if there are exactly four or more than six
            $widget_classes .= ' col-sm-3';
        elseif ($widget_count >= 3) :
            // Three widgets per row if there's three or more widgets
            $widget_classes .= ' col-sm-4';
        elseif (2 == $widget_count) :
            // Otherwise show two widgets per row
            $widget_classes .= ' col-sm-6';
        endif;

        return $widget_classes;
    endif;
}

/* Post meta helper */

function pmeta($key, $single = true, $id = false){
    return get_post_meta($id ? : get_the_ID(), $key, $single);
}

function debug($e){
    echo '<pre>';
    var_dump($e);
    die();
}

/* Get customizer setting default value */

function customizerDefault($setting){
    $value = '';
    $customizer_library = Customizer_Library::Instance();
    $options = $customizer_library->get_options();

    $value = isset($options[$setting]['default']) ? $options[$setting]['default'] : false;
    return $value;
}
