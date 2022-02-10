<?php
/**
 * Enqueue functions
 * Enqueue CSS and JavaScript files
 * 
 * @package WordPress
 * @subpackage aztheme
 * @version 1.0.0
*/

if ( ! function_exists( 'aztheme_enqueue_scripts' ) ) {
    function aztheme_enqueue_scripts() {
        // Enqueue CSS files
        wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap' );
        wp_enqueue_style( 'font-awesome', LIBS_PATH . 'css/font-awesome.min.css', [], '4.7.0' );
        wp_enqueue_style( 'bootstrap', LIBS_PATH . 'css/bootstrap.min.css', [], '5.1.3' );
        wp_enqueue_style( 'aztheme', CSS_PATH . 'aztheme.css', [], '1.0.0' );
        // Enqueue JavaScript files
        wp_enqueue_script( 'bootstrap-js', LIBS_PATH . 'js/bootstrap.bundle.min.js', [], '5.1.3', true );
        wp_enqueue_style( 'aztheme-js', JS_PATH . 'aztheme.js', [], '1.0.0' );
    }
}

add_action( 'wp_enqueue_scripts', 'aztheme_enqueue_scripts' );