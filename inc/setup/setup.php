<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * ! important: [ post-thumbnails, responsive-embeds, editor-styles, html5, automatic-feed-links ]
 * This features are enabled by defaults from version 5.9.
 * 
 * 
 * @package WordPress
 * @subpackage aztheme
*/

if ( ! function_exists( 'aztheme_setup' ) ) {
  /**
   * Function to activate WordPress features
   * @return
  */
  function aztheme_setup() {
    // Enables plugins and themes to manage the document title tag.
    add_theme_support( 'title-tag' );

    // Enables Custom_Backgrounds support
    add_theme_support( 'custom-background', [
      'default-color'   => '#E6E9EE',
    ]);

    // Enables Theme_Logo support.
    add_theme_support( 'custom-logo', [
      'height'      => 50,
      'width'       => 130,
      'flex-height' => true,
      'flex-width'  => true,
    ] );

    // Enables Post Thumbnails support
    add_theme_support( 'post-thumbnails' );
    
    // Register post thumbnail sizes
    add_image_size( 'card-thumbnail', 860, 575 );
    add_image_size( 'classic-thumbnail', 280, 157 );
    add_image_size( 'boxes-thumbnail', 636, 357 );

    // Enables Automatic Feed Links for post and comment in the head.
    add_theme_support( 'automatic-feed-links' );

    // Allows the use of HTML5 markup.
    add_theme_support( 'html5', [
      'comment-list', 'comment-form', 'search-form',
      'gallery', 'caption', 'style', 'script', 'navigation-widgets'
    ] );

    // Enables Selective Refresh for Widgets being managed within the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Enable the support for default Gutenberg block styles
    add_theme_support( 'wp-block-styles' );

    // Enabling theme support for align full and align wide option for the block editor.
    add_theme_support( 'align-wide' );
  }
}

add_action( 'after_setup_theme', 'aztheme_setup' );