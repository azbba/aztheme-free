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

if ( ! function_exists( 'aztheme_child_menu_items' ) ) {
  /**
   * Function to push child menus into one array
   * 
   * @param array $menu_items
   * @param int $parent_id
   * @return array $child_items
  */
  function aztheme_child_menu_items( $menu_items, $parent_id ) {
    $child_items = [];
    foreach ( $menu_items as $item ) {
      if ( $item->menu_item_parent == $parent_id ) {
        $child_items[] = $item;
      }
    }
    return $child_items;
  }
}

if ( ! function_exists( 'aztheme_is_active' ) ) {
  /**
   * Function to compare current url and selected menu item url
   * To print active class
   * @param strign $url
   * @return string $css_class
  */
  function aztheme_is_active( $url ) {
    global $wp;
    $current_url =home_url( add_query_arg( array(), $wp->request ) );
    return $current_url == rtrim($url, '/') ? 'active' : '';
  }
}