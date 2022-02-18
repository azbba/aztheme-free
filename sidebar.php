<?php
/**
 * Template that display the primary sidebar 
 * 
 * @package WordPress
 * @subpackage aztheme
*/

if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
  return;
}

?>

<div class="<?php echo esc_attr( aztheme_content_layout( 'sidebar' ) ); ?>">
  <aside class="site-sidebar">
  <?php dynamic_sidebar( 'primary-sidebar' ); ?>
  </aside>
</div> <!-- .col > .sidebar -->