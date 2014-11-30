<?php 
/*
Plugin Name: Radyo Arabesk TÜRK HTML5 Player
Plugin URI: http://www.radyoarabeskturk.com/
Description: Radyo Arabesk TÜRK HTML5 Radyo Playeri İsterseniz Widget Olarak İsterseniz Kısa Kodu Kullanarak Sayfanıza Yada Yazılarınıza Ekleyebilirsiniz [radyoarabeskturk].
Author: Radyo Arabesk TÜRK
Author URI: http://www.radyoarabeskturk.com
Version: 2.1
*/

/*-- Create Sortcode Radyo Arabeskturk --*/
function radyo_arabeskturk_source( $atts ){
?>
<!--Radyoarabeskturk.com WP Player-->
<iframe height="350" scrolling="no" src="http://www.radyoarabeskturk.com/dinle/" width="100%"></iframe>

<?php
}
add_shortcode('radyoarabeskturk', 'radyo_arabeskturk_source');
add_filter('widget_text', 'do_shortcode');


/*-- Widget  Radyoarabeskturk Player --*/
class radyoarabeskturkwidget extends WP_Widget
{
  function radyoarabeskturkwidget()
  {
    $widget_ops = array('classname' => 'radyoarabeskturkwidget', 'description' => 'Radyoarabeskturk Player widget.' );
    $this->WP_Widget('radyoarabeskturkwidget', 'Radyo Arabesk TURK', $widget_ops);
  }
 
  function form($instance) 
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    //echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
    echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
  ?>
<!--Radyoarabeskturk.com WP Player-->
<iframe height="200" scrolling="no" src="http://www.radyoarabeskturk.com/dinle/" width="100%"></iframe>
 <?php
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("radyoarabeskturkwidget");') );
?>