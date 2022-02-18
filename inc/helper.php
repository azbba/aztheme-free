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

if ( !function_exists( 'aztheme_sanitize_description' ) ) {
  /**
   * Function to sanitize description text
   * Allow only [ a, br, strong, em ]
   * @param string $description
   * @return string $description
  */
  function aztheme_sanitize_description( $description ) {
    return wp_kses( 
      $description, 
      [
        'a'         => [
          'href'    => [],
          'class'   => [],
          'target'  => [],
          'title'   => []
        ],
        'strong'    => [],
        'em'        => [],
        'br'        => []
      ] 
    );
  }
}

if ( ! function_exists( 'aztheme_content_layout' ) ) {
  /**
   * Function to determine the site-content column sizes
   * @param string $element
   * @return array $columns
  */
  function aztheme_content_layout( $element ) {
    // Default columns
    $content_area = 'col-md-8 col-lg-9';
    $sidebar = 'col-md-4 col-lg-3';

    if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
      $content_area = 'col-12';
    }

    $columns = [
      'content' => $content_area,
      'sidebar' => $sidebar
    ];

    return $columns[ $element ];
  }
}

if ( ! function_exists( 'aztheme_sanitize_post_template' ) ) {
  /**
   * Function to sanitize post template
   * @param string $template
   * @return string $template 
  */
  function aztheme_sanitize_post_template( $template ) {
    $allowed_template = [ 'card', 'boxes', 'classic' ];
    return in_array( $template, $allowed_template ) ? $template : 'card';
  }
}