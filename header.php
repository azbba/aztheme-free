<?php
/**
 * The Template for displaying the header
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- Start our header -->
  <header class="site-header">
    <?php get_template_part( 'template-parts/header/upperbar' ); ?>
    <?php get_template_part( 'template-parts/header/navbar' ); ?>
    <?php get_template_part( 'template-parts/header/page-header' ) ?>
  </header>
  <!-- End our header -->