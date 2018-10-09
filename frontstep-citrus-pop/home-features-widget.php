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

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $desc = ! empty( $instance['desc'] ) ? $instance['desc'] : '';
    $image_uri = ! empty( $instance['image_uri'] ) ? $instance['image_uri'] : '';
    $is_img_left = isset( $instance['is_img_left'] ) ? (bool) $instance['is_img_left'] : false;
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label><br />
      <input style="width: 100%" type="text" class="text-widget-fields" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'desc' ); ?>">Description</label><br />
      <textarea rows="5" cols="45" placeholder="Description" class="text-widget-fields" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo esc_attr( $desc ); ?></textarea>
    </p>

     <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />

        <div class="custom_media_image">
                <?php
                if ( $image_uri != '' ) : ?>
                    <img src="<?php echo $image_uri;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php endif; ?>
        </div>

        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>

    <p><input class="checkbox" type="checkbox"<?php checked( $is_img_left ); ?> id="<?php echo $this->get_field_id( 'is_img_left' ); ?>" name="<?php echo $this->get_field_name( 'is_img_left' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'is_img_left' ); ?>"><?php _e( 'Is image left?' ); ?></label></p>

<script type="text/javascript">
  
  jQuery(document).ready( function($) {
    function media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
        //alert(button_class);
        //$('body').on('click', button_class, function(e) {
          $(button_class).click(function(e) {
            var button_id ='#'+$(this).attr('id');
            var self = $(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(button_id);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) {
                    //$(this).parent().find('.custom_media_id').val(attachment.id);
                    //$(this).parent().find('.custom_media_url').val(attachment.url);
                    //$(this).parent().find('.custom_media_image').attr('src',attachment.url).css('display','block');
                    $( e.target ).siblings( '.custom_media_id' ).val( attachment.id )
                    $( e.target ).siblings( '.custom_media_url' ).val( attachment.url )
                    $( e.target ).siblings( '.custom_media_image' ).html('<img src="'+attachment.url+'" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />').css('display','block');

                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }

              $('.custom_media_url').trigger('change');
              
            }
            
            wp.media.editor.open(button);
            return false;
        });
    }
    media_upload('.custom_media_button.button');
});


</script>

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