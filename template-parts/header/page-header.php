<?php
/**
 * The Template for displaying the page header
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php
          if ( is_home() ) {
            $title          = get_theme_mod( 'aztheme_page_header_title', get_bloginfo( 'name' ) );
            $description    = get_theme_mod( 'aztheme_page_header_description', get_bloginfo( 'description' ) );
            ?>
              <div class="wrapper page-header-home">
                <?php if ( ! empty( $title  ) ): ?>
                  <h1 class="page-header-title"><?php echo aztheme_sanitize_description( $title ); ?></h1>
                <?php endif; ?>
                <?php if ( ! empty( $description  ) ): ?>
                  <p class="page-heder-description"><?php echo aztheme_sanitize_description( $description ); ?></p>
                <?php endif; ?>
              </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>