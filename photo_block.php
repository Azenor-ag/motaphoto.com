<?php $args = array(
       'post_type' => 'photo',
	   'post__not_in' => array (get_the_ID()),
	   'posts_per_page' => 2,
   );

   $query = new WP_Query( $args );
?>

<?php if($query->have_posts()) : ?>
       <?php while($query->have_posts()) : ?>
           <?php $query->the_post();?>
        <a href="<?php echo get_the_permalink(get_the_ID());?>">
               <?php the_content(); ?></a>
       <?php endwhile; ?>

<?php endif; 
  wp_reset_query();
?>


