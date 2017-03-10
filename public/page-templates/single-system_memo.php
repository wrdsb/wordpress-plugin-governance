<?php get_header(); ?>
<div class="container">
  <div class="row">
      <div class="col-sm-8 col-lg-8">

        <?php // check if the post has a Post Thumbnail assigned to it.
          if ( has_post_thumbnail() ) {
            echo '<div class="featuredimage">';
              the_post_thumbnail('wrdsb-one-sidebar');
            echo '</div>';
          }
        ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <small class="gray-dark">Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></small>

          <?php $more = 1; the_content(); ?>

        <?php endwhile; else: ?>
          <p> <?php _e('Sorry, no System Memos matched your criteria.'); ?> </p>
        <?php endif; ?>

	<div class="prevnext-container">
	  <?php previous_post_link('<p class="prevpost">&laquo; Older: %link</p>'); ?>
          <?php if(!get_adjacent_post(false, '', true)) { echo ''; } // if there are no older articles ?>
	  <?php next_post_link('<p class="nextpost">Newer: %link &raquo;</p>'); ?>
          <?php if(!get_adjacent_post(false, '', false)) { echo ''; } // if there are no newer articles ?>
	</div>

      </div> <!-- end content area -->

      <div class="col-sm-4 col-lg-4" role="complementary">
        <div class="sidebar-right widget-area" role="complementary">
          <div class="sub-menu-heading"><span>Memo #<?php echo strtoupper($post->post_name); ?></span></div>
          <?php
            echo '</p><p>Audiences: ';
              the_terms( $post->ID, 'audiences', '', ' &middot; ' );
            echo '</p><p>Contacts: ';
              the_terms( $post->ID, 'contacts', '', ' &middot; ' );
            echo '<p>Categories: ';
              the_terms( $post->ID, 'governance_categories', '', ' &middot; ' );
            echo '</p><p>Tags: ';
              the_terms( $post->ID, 'governance_tags', '', ' &middot; ' );
            echo '</p>';
          ?>
        </div>
      </div>

  </div>
</div>

<?php get_footer();
