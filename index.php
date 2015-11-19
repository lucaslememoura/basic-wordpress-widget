<?php
/*
* Plugin Name: Basic WordPress Widget Plugin
* Description: This is a very basic widget plugin for WordPress. Meant as a starting point.
* Plugin URI: 
* Author Name: Eric Wallen
* Author URI: www.somewhere.com
* version: 1.1
*/
// Creating the widget 
class erics_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'erics_widget', 

// Widget name will appear in UI
__('Eric\'s Starter Widget', 'erics_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget for easliy getting started', 'erics_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'Hello, World!', 'erics_widget_domain' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'erics_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class erics_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'erics_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );