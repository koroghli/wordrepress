<?php
/* Plugin Name: example plugin
*/
function custom_css()
{
wp_register_style('baseCss',plugins_url('/css/base.css',__FILE__));
wp_enqueue_style('baseCss');
};
/*shortcode*/
function init_shortcode()
{
   function content_shortcode($atts=[],$content=null)
   {
     return"<p>Hello world!</p>";
   }
   add_shortcode('baseShortcode','content_shortcode');
}
add_action('init','init_shortcode');
add_action('wp_enqueue_scripts','custom_css');
?>
