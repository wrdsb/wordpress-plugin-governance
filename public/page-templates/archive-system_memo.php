<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(''); ?> (<?php bloginfo('name'); ?>)</title>
  <?php $asset_version = "1/1.0.0"; ?>

  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/1/master.css" rel="stylesheet" media="all">

  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $asset_version; ?>/images/icon-60x60.png" rel="apple-touch-icon" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $asset_version; ?>/images/icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $asset_version; ?>/images/icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
  <link href="https://s3.amazonaws.com/wrdsb-ui-assets/<?php echo $asset_version; ?>/images/icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

  <script src="https://s3.amazonaws.com/wrdsb-theme/js/addtohomescreen.min.js"></script>
  <script src="https://s3.amazonaws.com/wrdsb-theme/js/jquery.floatThead.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script>
    $(document).ready(function(){
      $('table.table-fixed-head').floatThead({
        useAbsolutePositioning: false
      });
    });

    $("table").addClass("table table-striped table-bordered");
    $("table").wrap("<div class='table-responsive'></div>");
    </script>

  <?php wp_head(); ?>

  <!-- Google Analytics Tracking Code -->
  <?php if (wrdsb_i_am_a_staff_site()) { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-16094689-22', 'auto');
    ga('require', 'linkid');
    ga('send', 'pageview');
  </script>
  <?php } ?>
</head>

<body id="top">

<!-- header -->
  <div class="container container-top">
    <div class="header">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div id="logo" role="heading">
            <a aria-labelledby="logo" href="<?php echo home_url(); ?>/"><span><?php echo get_bloginfo('name'); ?></span>
              <p id="sitename"><?php echo get_bloginfo('name'); ?></p>
              <?php if (get_bloginfo('description') != '') { ?>
              <p id="sitedescription"><?php echo get_bloginfo('description'); ?></p>
              <?php } ?>
            </a>
          </div>
        </div>
        <div class="col-md-3 col-sm-4">
          <div class="staff-shortcuts" role="complementary" aria-labelledby="staff-shortcut-list">
            <div id="staff-shortcut-list">
              <a href="#address">Contact Information</a>
            </div>
            <div class="searchbox" role="search" aria-labelledby="search">
              <form action="<?php echo home_url(); ?>/" method="get">
                <input aria-label="Search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="navbar my-navbar" role="navigation" aria-labelledby="navbar-header">
        <div id="navbar-header">
          <button type="button" class="navbar-toggle togglesearch" data-toggle="collapse" data-target=".navbar-search">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-search"></span>
          </button>

          <button type="button" class="navbar-toggle togglenav" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php echo get_bloginfo('name'); ?></a>
        </div>
            
        <div class="collapse navbar-search" role="search" aria-labelledby="mobileSearch">
              <form action="<?php echo home_url(); ?>/" method="get">
                <input aria-label="Search" type="text" name="s" id="mobileSearch" value="<?php the_search_query(); ?>" placeholder="Search" />
              </form>
        </div>

        <div id="menu" role="navigation" aria_label="Menu">

        <?php if (has_nav_menu('top')) {
          wp_nav_menu(array('theme_location' => 'top', 'menu_class' => 'nav nav-justified', 'container_class' => 'collapse navbar-collapse'));
        } else {
          wp_page_menu(array('depth' => 1, 'show_home' => true, 'menu_class' => 'collapse navbar-collapse' ));
        } ?>
        </div>
    </div><!-- /.navbar -->
  </div><!-- /.container-top -->

  <div class="container container-breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li><a href="<?php echo get_option('home'); ?>">Home</a></li>
      <li><a href="/system-memos">System Memos</a></li>
    </ol>
  </div>

<div class="container">
  <div class="row">
      <div class="col-sm-8">
        <?php
        echo '<div>';
        // Previous/next post navigation.
        if( get_previous_posts_link() ) :
          previous_posts_link( '« Newer Memos' );
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        endif;
        if( get_next_posts_link() ) :
          next_posts_link( 'Older Memos »' );
        endif;
        echo '</div>';

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

        echo '<div>';
        // Previous/next post navigation.
        if( get_previous_posts_link() ) :
          previous_posts_link( '« Newer Memos' );
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        endif;
        if( get_next_posts_link() ) :
          next_posts_link( 'Older Memos »' );
        endif;
        echo '</div>';

        $categories = get_terms( array(
          'taxonomy' => 'governance_categories',
          'hide_empty' => true,
        ) );

        $tags = get_terms( array(
          'taxonomy' => 'governance_tags',
          'hide_empty' => true,
        ) );


        function hierarchical_audience_tree($category = 0) {
          $r = '';
          $args = array(
            'parent' => $category,
          );
          $next = get_terms('audiences', $args);
          if ($next) {
            $r .= '<ul>';
            foreach ($next as $cat) {
              $r .= '<li><a href="/system-memos/by-audience/'.$cat->slug.'">'. $cat->name .'</a>';
                  $r .= $cat->term_id !== 0 ? hierarchical_audience_tree($cat->term_id) : null;
            }
            $r .= '</li>';
            $r .= '</ul>';
          }
          return $r;
        }
        ?>
      </div> <!-- end content area -->

      <div class="col-sm-4" role="complementary">
        <div class="sidebar-right widget-area" role="complementary">
          <div class="sub-menu-heading"><span>Memos by Audience</span></div>
          <div class="textwidget">
            <?php echo hierarchical_audience_tree(); ?>
          </div>
          <div class="sub-menu-heading"><span>Memos by Category</span></div>
          <div class="textwidget">
            <ul>
              <?php foreach( $categories as $category ) { ?>
                <li><a href="<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="sub-menu-heading"><span>Tags</span></div>
          <div class="textwidget">
              <?php
                $tags_list = '<p>';
                foreach ($tags as $tag) {
                  $tags_list .= '<a href="'. $tag->slug .'">'. $tag->name .'</a> &middot; ';
                }
                $tags_list = rtrim($tags_list, ' &middot; ');
                $tags_list .= '</p>';
                echo $tags_list;
              ?>
            </p>
          </div>
        </div>
      </div>

  </div>
</div>

    <div id="footer" class="footer" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3" aria-labelledby="address">
              <address>
                <h1 id="address">Waterloo Region District School Board</h1>
              	<p>51 Ardelt Avenue<br />
                Kitchener, ON N2C 2R5</p>
                <p>Switchboard: 519-570-0003<br />
                <a href="https://www.wrdsb.ca/about-the-wrdsb/contact/">Contact the WRDSB</a></p>
                <p><a href="https://www.wrdsb.ca/about-the-wrdsb/contact/website-feedback/" target="_blank">Website Feedback Form</a></p>
              </address>
          </div>
          <div class="col-sm-6 col-md-3" aria-labelledby="wrdsb-email-you">
              <h1 id="wrdsb-email-you">Let Us Email You!</h1>
          </div>
          <div class="col-sm-6 col-md-3" aria-labelledby="connect-wrdsb">
              <h1 id="connect-wrdsb">Stay Connected</h1>
          </div>
          <div class="col-sm-6 col-md-3" role="region">
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="loginbar" role="navigation" aria_labelledby="adminbar">
      <p id="adminbar" class="copyright" style="text-align: center;">
      <?php if ( is_user_logged_in() ) {
        wp_loginout();
      } ?>
      </p>
    </div>
  <?php wp_footer(); ?>
</body>
</html>
