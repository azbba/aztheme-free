<?php
/**
 * Template part to displaying the navbar
 * 
 * @package WordPress
 * @subpackage aztheme
*/

?>

<div class="site-navbar">
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url( get_home_url() ); ?>">
        <?php echo bloginfo( 'name' ); ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#azthemeNavbar" aria-controls="azthemeNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php if ( has_nav_menu( 'primary_menu' ) ): ?>
        <div class="collapse navbar-collapse" id="azthemeNavbar">
          <?php aztheme_primary_menu(); ?>
        </div>
      <?php endif; ?>
    </div>  
  </nav>
</div>