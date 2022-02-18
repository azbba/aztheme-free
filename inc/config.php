<?php
/**
 * The base configuration for aztheme project
 * 
 * @package WordPress
 * @subpackage aztheme
*/

// Returns an URL for css directory
defined( 'CSS_PATH' ) or define( 'CSS_PATH', get_template_directory_uri() . '/assets/css/' );

// Returns an URL for js directory
defined( 'JS_PATH' ) or define( 'JS_PATH', get_template_directory_uri() . '/assets/js/' );

// Returns an URL for css directory
defined( 'LIBS_PATH' ) or define( 'LIBS_PATH', get_template_directory_uri() . '/assets/libs/' );

// Returns an URL for iamges directory
defined( 'IMG_PATH' ) or define( 'IMG_PATH', get_template_directory_uri() . '/assets/images/' );