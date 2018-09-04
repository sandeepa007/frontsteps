<?php
/**
 * Plugin Name:   Example Widget Plugin
 * Plugin URI:    https://jonpenland.com
 * Description:   Adds an example widget that displays the site title and tagline in a widget area.
 * Version:       1.0
 * Author:        Jon Penland
 * Author URI:    https://www.jonpenland.com
 */
class home_feature_Widget_urbanchic extends WP_Widget {


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
    parent::__construct( 'home_feature_widget', 'Home Features (FrontSteps)', $widget_options, $control_ops );


  }


  // Create the widget output.
  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $desc = apply_filters( 'widget_title', $instance[ 'desc' ] );
    $image_uri = apply_filters( 'widget_title', $instance[ 'image_uri' ] );

    //$is_img_left = apply_filters( 'widget_title', $instance[ 'is_img_left' ] );
    ?>
    <div class="col-xs-12 col-sm-4">
      <div class="box-block">
         <div class="img-block">
            <img src="<?php echo $image_uri;?>" class="img-responsive">
         </div>
         <div class="info-block">
            <h3 class="h3"><?php echo $title;?></h3>
            <p><?php echo $desc;?></p>
         </div>
      </div>
    </div>
    
<?php
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $desc = ! empty( $instance['desc'] ) ? $instance['desc'] : ''; 
    $image_uri = ! empty( $instance['image_uri'] ) ? $instance['image_uri'] : ''; 
    //$is_img_left = isset( $instance['is_img_left'] ) ? (bool) $instance['is_img_left'] : false;
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

        <?php
            if ( $image_uri != '' ) :
                echo '<img class="custom_media_image" src="' . $image_uri . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>

        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>

   <!--  <p><input class="checkbox" type="checkbox"< ?php checked( $is_img_left ); ?> id="< ?php echo $this->get_field_id( 'is_img_left' ); ?>" name="< ?php echo $this->get_field_name( 'is_img_left' ); ?>" />
    <label for="< ?php echo $this->get_field_id( 'is_img_left' ); ?>">< ?php _e( 'Is image left?' ); ?></label></p> -->

      <script type="text/javascript">
  
  jQuery(document).ready( function($) {
    function media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        $('body').on('click', button_class, function(e) {
            var button_id ='#'+$(this).attr('id');
            var self = $(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(button_id);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) {
                    $(this).parent().find('.custom_media_id').val(attachment.id);
                    $(this).parent().find('.custom_media_url').val(attachment.url);
                    $(this).parent().find('.custom_media_image').attr('src',attachment.url).css('display','block');
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
          $(".button.widget-control-save").removeAttr("disabled");
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
    //$instance['is_img_left'] = isset( $new_instance['is_img_left'] ) ? (bool) $new_instance['is_img_left'] : false;
    return $instance;
  }

}

// Register the widget.
function home_register_home_features_widget_urbanchic() { 
  register_widget( 'home_feature_Widget_urbanchic' );
}
add_action( 'widgets_init', 'home_register_home_features_widget_urbanchic',20);

?>