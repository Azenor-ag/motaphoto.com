<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );


function theme_enqueue_styles() {
wp_enqueue_style('motaphota', get_stylesheet_directory_uri() . '/style.css', array(),false);
wp_enqueue_script('lightbox',get_stylesheet_directory_uri() . '/lightbox.js', array(),'1.0', true);
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
function filtre(){

  $filtrajax = new WP_Query([
    'post_type' => 'photo',
    'orderby'  => 'date',
    'order' => $_POST['post_ordre'],
    'paged' => $_POST['paged'],
    'posts_per_page' => 12,
    'tax_query' => array(
      $_POST['category'] !="all" ?
      array(
         'taxonomy' =>'categorie' ,
         'field'    => 'slug',
        'terms'    => $_POST['category'],
      )
      :'',
      $_POST['post_format'] !="all" ?
      array(
        'taxonomy' => 'format' ,
        'field'    => 'slug',
        'terms'    => $_POST['post_format'],
      )
      :'',
    )
  ]);

  if($filtrajax->have_posts()) : 
    while($filtrajax->have_posts()) : 
      $filtrajax->the_post();?>       
            <div class="overlay-image">
                  <?php the_content(); ?>
                <div class=hover>
                   <img class="full_screen" data-image="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri(); ?>./assets/fullscreen.png" alt="full_screen">
                   <a href="<?php echo get_the_permalink(get_the_ID());?>">
                     <img class="eye" src="<?php echo get_template_directory_uri(); ?>./assets/eye.png" alt="eye">
                   </a>
                   <div class="texte">
                     <div> <?php the_title(); ?></div>
                      <div class="right_now"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie'));?></div>
                   </div>
                </div>  
           </div>
    <?php endwhile; ?>
  <?php endif; 
    wp_reset_postdata();
    exit();
}
add_action('wp_ajax_filtre', 'filtre');
add_action('wp_ajax_nopriv_filtre', 'filtre');
?>

<?php
function ajoutCategorie(){
if($terms = get_terms(array(
  'taxonomy' =>'categorie' ,
  'field'    => 'slug',
 'terms'    => $_POST['category'],
)))
foreach ($terms as $term){
  echo '<option  value="'.$term->slug.'">'.$term ->name.'</option>';
}
}

function ajoutFormat(){
  if($terms = get_terms(array(
    'taxonomy' =>'format' ,
    'field'    => 'slug',
   'terms'    => $_POST['post_format'],
  )))
  foreach ($terms as $term){
    echo '<option  value="'.$term->slug.'">'.$term ->name.'</option>';
  }
  }

function ajoutOrderDirection(){
  if ($order_options = (array(
      'DESC' => 'Nouveautés',
      'ASC' => 'Les plus anciens',
    )))
    foreach( $order_options as $value => $label ) {
        echo "<option ".selected( $_POST['tri'], $value )." value='$value'>$label</option>";
    }
  }
?>