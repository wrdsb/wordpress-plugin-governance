<?php get_header(); ?>

<div class="container">
  <div class="row">
      <div class="col-sm-8 col-lg-8">

        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();
          the_title( '<h2 class="news"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">'. strtoupper($post->post_name) .': ', '</a></h2>' );      
          echo '<small class="gray-dark">Posted: '. get_the_date('F j, Y') .' at '. get_the_time('g:i a') .'</small>';
          if ( has_excerpt() ) {
            the_excerpt();
            echo '<p class="readmore"><a href="'. get_permalink($post->ID) . '"><strong>Read more about</strong> <cite>'. get_the_title($post->ID) .'</cite> &#187;</a></p>';
          } else {
            the_excerpt();
          }
        endwhile;
        ?>

      </div> <!-- end content area -->

      <div class="col-sm-4 col-lg-8">
      </div>

  </div>
</div>

<?php get_footer();
