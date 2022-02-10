<?php
/**
 * The Template for displaying the upperbar
 * 
 * @package WordPress
 * @subpackage aztheme
*/

$aztheme_pages_menu_status = has_nav_menu( 'pages_menu' );
$aztheme_mdeia_menu_status = has_nav_menu( 'social_media_menu' );

// Do not load the upperbar if both 'pages_menu' and 'social_media_menu' are not registered
if ( ! $aztheme_pages_menu_status && ! $aztheme_mdeia_menu_status ) {
  return;
}

$aztheme_columns_width  = [
  'pages_menu'          => ! $aztheme_mdeia_menu_status ? 'col-12' : 'col-md-8 col-lg-9',
  'social_media_menu'   => ! $aztheme_pages_menu_status ? 'col-12' : 'col-md-4 col-lg-3'
];

?>

<div class="upperbar">
  <div class="container">
    <div class="row">
      <?php if ( $aztheme_pages_menu_status ): ?>
        <div class="<?php echo esc_attr( $aztheme_columns_width['pages_menu'] ) ?>">
          <?php aztheme_pages_menu(); ?>
        </div>
      <?php endif; ?>
      <?php if ( $aztheme_mdeia_menu_status ): ?>
        <div class="<?php echo esc_attr( $aztheme_columns_width['social_media_menu'] ) ?>">
          <?php aztheme_social_media_menu(); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>