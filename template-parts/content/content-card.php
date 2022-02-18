<?php
/**
 * Template part for displaying posts in card template
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>
<div class="col-12">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
    <header class="entry-header">
      <?php
        aztheme_the_categories();
        aztheme_the_title();
        aztheme_the_post_meta();
      ?>
    </header>
    <div class="entry-body">
      <?php 
        aztheme_the_thumbnail();
        aztheme_the_excerpt(); 
      ?>
    </div>
    <footer class="entry-footer">
      <?php aztheme_read_more(); ?>
    </footer>
  </article>
</div>