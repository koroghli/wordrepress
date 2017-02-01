<?php
/*Plugin Name: tp plugin*/
function custom_css()
{
wp_register_style('tpCss',plugins_url('/css/tp.css',__FILE__)); // integrer le css dans la page
wp_enqueue_style('tpCss');
}

add_action('wp_enqueue_scripts','custom_css');// excuter le fichier script
/*shortcode*/

/*function init_shortcode()
{
    function content_shortcode($atts=[],$tp=null)
       {
       $data = get_pages();
       foreach ($data as $key => $value) {
        if ($value->ID == get_the_ID())
         {

        }else {
          echo($value->post_content);
          echo "<hr/>";
        }

       }
      }

  add_shortcode('tpShortcode','content_shortcode');
}
add_action('init','init_shortcode');




/*deuxieme methode*/
//recuperer le contenu des pages et le mettre dans une page
function one_page_init_shortcode()
{
   function one_page_shortcode($att=[],$content=null)
    {
          $args=array // declaration d un tableau
          (
          'sort_order'=>'asc',
          'sort_column'=>'post_title',
          'hierarchical'=>1,
          'exclude'=>'',
          'include'=>'',
          'meta_key'=>'',
          'meta_value'=>'',
          'authors'=>'',
          'child_of'=>0,
          'parent'=> -1,
          'exclude_tree'=>'',
          'number'=>'',
          'offset'=>0,
          'post_type'=>'page',
          'post_status'=>'publish'
        );
        $pages=get_pages($args);
        foreach($pages as $key=>$value)
         {

           if($value->ID !== get_the_ID())
           {
           echo "<p>" . $value->post_content  . "</p>";  // ne pas afficher One page et afficher les autres pages
           }
         };
    }
add_shortcode('shortcode','one_page_shortcode');
}


add_action('init','one_page_init_shortcode');
