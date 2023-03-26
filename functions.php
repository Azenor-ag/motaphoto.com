<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );


function theme_enqueue_styles() {
wp_enqueue_script( 'script.js', get_stylesheet_directory_uri() . '/script.js', array(), "1.0.0", true);
wp_enqueue_style('motaphota', get_stylesheet_directory_uri() . '/style.css', array(),false);

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
?>