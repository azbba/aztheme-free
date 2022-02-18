<?php
/**
 * Template part for displaying posts in boxes template
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>
<div class="col-6">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-boxes' ); ?>>
    <header class="entry-header">
      <?php aztheme_the_thumbnail( 'boxes-thumbnail' ); ?>
    </header>
    <div class="entry-body">
      <?php 
        aztheme_the_categories();
        aztheme_the_title();
        aztheme_the_excerpt(); 
      ?>
    </div>
  </article>
</div>