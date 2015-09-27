<?php
/*
Plugin Name: Radyo Arabesk TURK Player
Plugin URI: http://www.radyoarabeskturk.com/
Description: Radyo Arabesk TÜRK Radyo Playeri İsterseniz yere Widget Olarak Ekleyebilirsiz.
Version: 2.2
Author: Radyo Arabesk TURK
Author URI: http://www.radyoarabeskturk.com
*/

//Define plugin directories
define( 'WP_RADYOARABESKTURK_URL_PLAYER', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)) );
define( 'WP_RADYOARABESKTURK_DIR_PLAYER', WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__)) );

function widget_Radyoarabeskturk_Com($args) {
    extract($args);
?>
        <?php echo $before_widget; ?>

<!--Radyoarabeskturk.com WP Player-->
<iframe height="200" scrolling="no" src="http://www.radyoarabeskturk.com/dinle/" width="100%"></iframe>


        <?php echo $after_widget; ?>
<?php
}
register_sidebar_widget('Radyoarabeskturk.Com Player', 'widget_Radyoarabeskturk_Com');
?>