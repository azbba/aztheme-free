<?php
/**
 * Template part for displaying posts in classic template
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>
<div class="col-12">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-classic' ); ?>>
    <div class="d-flex">
      <header class="post-header flex-shrink-0">
        <?php aztheme_the_thumbnail( 'classic-thumbnail' ); ?>
      </header>
      <div class="entry-body flex-grow-1 ms-3">
        <?php
          aztheme_the_categories();
          aztheme_the_title();
          aztheme_the_post_meta();
          aztheme_the_excerpt();
          aztheme_read_more();
        ?>
      </div>
    </div>
  </article>
</div>