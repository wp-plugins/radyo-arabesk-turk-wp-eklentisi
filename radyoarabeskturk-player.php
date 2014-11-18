<?php
/*
 * Plugin Name: Radyo Arabesk TÜRK PLAYER 
 * Plugin URI: http://www.radyoarabeskturk.com
 * Description: Radyo Arabesk TÜRK Dinletebilmek icin Wp Eklentisi
 * Version: 1.0
 * Author: Radyoarabeskturk.com
 * Author URI: http://www.radyoarabeskturk.com
 */

//add function to widget_init to load
add_action( 'widgets_init', 'radyo_arabeskturk_widgets' );

//register widget
function radyo_arabeskturk_widgets() {
	register_widget( 'radyo_arabeskturk_widget' );
}

//widget class
class radyo_arabeskturk_widget extends WP_Widget {

	function radyo_arabeskturk_widget() {
	
		$widget_ops = array( 'classname' => 'widget_radyo', 'description' => __('Radyo Arabesk TÜRk Dinletebilmek için Wp Eklentisidir', 'radyoarabeskturk') );
		$this->WP_Widget( 'radyo_arabeskturk_widget', __('Radyo Arabesk TÜRK Dinle', 'radyoarabeskturk'), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		//get values from widget.
		$title = apply_filters('widget_title', $instance['title'] );
		$genis = $instance['genis'];
		$yuksek = $instance['yuksek'];
		
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

				//<!-- Radyo Kodu Buraya Geliyor-->
	echo '	<iframe src="http://www.radyoarabeskturk.com/wp-yayin/index.php" height="'.$yuksek.'" width="'.$genis.'" frameborder="0" marginwidth="0" marginheight="0" scrolling="No"></iframe>';
		echo $after_widget;
	}// function widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['genis'] = $new_instance['genis'];
		$instance['yuksek'] = $new_instance['yuksek'];
		return $instance;
	}
	
	function form( $instance ) {
	
		$defaults = array(
		'title' => 'Radyo Arabesk TÜRK Dinle',
		'genis' => '250',
		'yuksek' => '90',
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults );?>
		<!-- Radyo Arabesk TÜRK Logo -->
		<p>
			<?php
			echo '<img src="' . plugins_url( '/radyoarabeskturk-logo.png' , __FILE__ ) . '" > ';
			?>
			
		</p>
		<!-- widget title -->
		<p>
			
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Başlık:', 'radyoarabeskturk') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Genişlik-->
		<p>
			<label for="<?php echo $this->get_field_id( 'genis' ); ?>"><?php _e('Genişliği Giriniz:', 'gazpo') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'genis' ); ?>" name="<?php echo $this->get_field_name( 'genis' ); ?>" value="<?php echo $instance['genis']; ?>" />
		</p>
		
		<!-- Yükseklik -->
		<p>
			<label for="<?php echo $this->get_field_id( 'yuksek' ); ?>"><?php _e('Yüksekliği Giriniz:', 'gazpo') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'yuksek' ); ?>" name="<?php echo $this->get_field_name( 'yuksek' ); ?>" value="<?php echo $instance['yuksek']; ?>" />
		</p>
		
	<?php }
}?>