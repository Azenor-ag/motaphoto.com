<div id="heroheader"  >
<?php

$the_query = new WP_Query( array ( 
    'orderby' => 'rand',
     'posts_per_page' => 1 ,
     "post_type" => 'photo' ) );
//output the random post
while ( $the_query->have_posts() ) : $the_query->the_post();
the_post_thumbnail();
endwhile;


//Reset Post Data
wp_reset_postdata();
?>
<h1 >PHOTOGRAPHE EVENT</h1>
</div>