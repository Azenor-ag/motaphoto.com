<div class="indexphoto container">
  <?php $args = array(
     'post_type' => 'photo',
     'posts_per_page' => 12,
     'orderby' => 'date',
     'order' => 'DESC',
      'paged'=>1);
     $query = new WP_Query( $args );
    ?>
  <?php if($query->have_posts()) : ?>
    <ul class="photo-list">
        <?php while($query->have_posts()) : ?>
            <?php $query->the_post();?>       
            <a href="<?php the_permalink()?>">   
             <?php the_content(); ?>
           </a>
              <?php if(has_post_thumbnail()) : ?>
    </ul>
              <?php endif; ?>         
        <?php endwhile; ?>
  <?php endif;   wp_reset_query();?> 
</div>
<div class="btn__wrapper">
    <a href="#!" class="btn btn__primary" id="loadmore">Charger plus</a>
</div>
