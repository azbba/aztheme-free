<?php
/**
 * The main template file
 * 
 * This file is required for a theme.
 * It's used to display a page when nothing more specific matches a query
 * 
 * @package WordPress
 * @subpackage aztheme
*/

get_header();

?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="row">
      <?php
        if ( have_posts() ):
          // Load posts loop.
          $aztheme_post_template = aztheme_sanitize_post_template( get_theme_mod( 'aztheme_post_template', 'card' ) );
          while ( have_posts() ):
            the_post();
            get_template_part( 'template-parts/content/content', $aztheme_post_template );
          endwhile;
        else:
          // If no content, include the "No posts found" template.
          get_template_part( 'template-parts/content/content', 'none' );
        endif;
      ?>
    </main>
  </div>
</div> <!-- .content-area -->

<?php get_footer(); ?>