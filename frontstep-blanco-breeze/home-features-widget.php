<?php
/**
 * Plugin Name:   Example Widget Plugin
 * Plugin URI:    https://jonpenland.com
 * Description:   Adds an example widget that displays the site title and tagline in a widget area.
 * Version:       1.0
 * Author:        Jon Penland
 * Author URI:    https://www.jonpenland.com
 */
class home_feature_Widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 
                      'classname' => 'widget_text',
                      'description' => 'Display an image and text on home pages',
                      'customize_selective_refresh' => true,
                  );
    $control_ops = array(
      'width' => 400,
      'height' => 350,
    );
    parent::__construct( 'home_feature_Widget', 'Home Features (FrontSteps)', $widget_options, $control_ops );


  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $desc = apply_filters( 'widget_title', $instance[ 'desc' ] );
    $image_uri = apply_filters( 'widget_title', $instance[ 'image_uri' ] );
    $is_img_left = apply_filters( 'widget_title', $instance[ 'is_img_left' ] );
      $img_pos = "image-right";
      if($is_img_left == 1)
      {
        $img_pos = "image-left";
      ?>
      <div class="intro-block">
        <div class="col-xs-12 col-sm-6">
          <div class="image-block">
            <img src="<?php echo $image_uri;?>" alt="img" class="img-responsive">
          </div>
        </div>     
        <div class="col-xs-12 col-sm-6">
          <div class="content-block">
              <div class="title-block">
                  <h2 class="h2 color-dark text-bold"><?php echo $title;?></h2>
              </div>
              <p><?php echo $desc;?></p>
          </div>
        </div>
               
      </div>    
      <?php
      }else{
        ?>
     
      <div class="intro-block">
        <div class="col-xs-12 col-sm-6">
          <div class="content-block">
              <div class="title-block">
                  <h2 class="h2 color-dark text-bold"><?php echo $title;?></h2>
              </div>
              <p><?php echo $desc;?></p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="image-block">
            <img src="<?php echo $image_uri;?>" alt="img" class="img-responsive">
          </div>
        </div>            
      </div>
    
        <?php

      }
    ?>
    
   

<?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'desc' ] = strip_tags( $new_instance[ 'desc' ] );
    $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
    $instance['is_img_left'] = isset( $new_instance['is_img_left'] ) ? (bool) $new_instance['is_img_left'] : false;
    return $instance;
  }

}

// Register the widget.
function home_register_home_features_widget_child() { 
  register_widget( 'home_feature_Widget' );
}
add_action( 'widgets_init', 'home_register_home_features_widget_child', 20 );

?>