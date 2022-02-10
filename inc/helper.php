<?php
/**
 * Helper functions
 * 
 * @package WordPress
 * @subpackage aztheme 
*/

if ( !function_exists( 'aztheme_get_menu_id' ) ) {
  /**
   * Function for get the menu id by menu location.
   * @param string $location
   * @return int menu id or return false on failure.
  */
  function aztheme_get_menu_id( $location ) {
    // Get all of locations
    $locations = get_nav_menu_locations();
    return isset( $locations[$location] ) ? $locations[$location] : false;
  }
}