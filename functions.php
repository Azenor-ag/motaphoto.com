<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );


function theme_enqueue_styles() {
wp_enqueue_script( 'script.js', get_stylesheet_directory_uri() . '/script.js', array(), "1.0.0", true);
wp_enqueue_style('motaphota', get_stylesheet_directory_uri() . '/style.css', array(),false);
wp_enqueue_script('script2',get_stylesheet_directory_uri() . '/script.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
/*ajout du logo par WP*/

  function motaphoto_setup() {
    add_theme_support('custom-logo');
}
    
add_action( 'after_setup_theme', 'motaphoto_setup' );

  /*ajouter les menus*/
// s'il y a plusieurs menus à rajouter, voici le code :
function register_my_menus() {
	register_nav_menus(
	array(
	'header-menu' => __( 'Menu Header' ),
	'footer-menu' => __( 'Menu Footer' ),
	)
	);
   }
   add_action( 'init', 'register_my_menus' );

   /*renvoyer la référence dans la modale*/
?>
<?php
/* pagination infinie*/
function weichie_load_more() {
  $ajaxposts = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 4,
    'paged' => $_POST['paged'],
    'post__not_in' => array (get_the_ID()),
  ]);



   if($ajaxposts->have_posts()) : 
     while($ajaxposts->have_posts()) : 
       $ajaxposts->the_post();?>       
        <a href="<?php the_permalink()?>">   
         <?php the_content(); ?>
       </a>
          <?php if(has_post_thumbnail()) : ?>
          <?php endif; ?> 
    <?php endwhile; ?>
<?php endif; ?> 
<?php wp_reset_postdata(); 


  exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');
?>