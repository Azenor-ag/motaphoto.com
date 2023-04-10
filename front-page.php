<?php get_header(); ?>


<div id="heroheader"  >
    <?php get_template_part( 'hero_header', get_post_format() ); ?>
    <h1>PHOTOGRAPHE EVENT</h1>
</div>
<div class="indexphoto container">
  <?php $args = array(
     'post_type' => 'photo',
     'posts_per_page' => 8,
     'post__not_in' => array (get_the_ID()),
      'paged'=>1);
     $query = new WP_Query( $args );
    ?>
  <?php if($query->have_posts()) : ?>
        <?php while($query->have_posts()) : ?>
            <?php $query->the_post();?>       
            <a href="<?php the_permalink()?>">   
             <?php the_content(); ?>
           </a>
              <?php if(has_post_thumbnail()) : ?>
              <?php endif; ?> 
        <?php endwhile; ?>
  <?php endif; ?> 
  <?php wp_reset_postdata(); ?>
</div>
<div class="btn__wrapper">
    <input type="button" Value="Charger plus" class="btn btn__primary" id="load-more">
</div>

<?php get_footer(); ?>

