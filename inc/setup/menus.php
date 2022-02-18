<?php
/**
 * Register menus
 * 
 * @package WordPress
 * @subpackage aztheme
*/

if ( ! function_exists( 'aztheme_register_menus' ) ) {
  /**
   * Function for registers navigation menus.
   * @return
  */
  function aztheme_register_menus() {
    register_nav_menus([
      'pages_menu'        => esc_html__( 'Pages menu', 'aztheme' ),
      'social_media_menu' => esc_html__( 'Social media menu', 'aztheme' ),
      'primary_menu'      => esc_html__( 'Primary menu', 'aztheme' ),
    ]);
  }
}

add_action( 'after_setup_theme', 'aztheme_register_menus' );

if ( ! function_exists( 'aztheme_pages_menu' ) ) {
  /**
   * Function for display pages menu
   * @return string | boolean false
   */
  function aztheme_pages_menu() {
    wp_nav_menu([
      'menu'        => 'pages_menu',
      'container'   => false,
      'menu_class'  => 'list-unstyled d-flex mb-0 pages-menu',
      'depth'       => 1
    ]);
  }
}

if ( ! function_exists( 'social_media_menu' ) ) {
  /**
   * Function for display Social media menu 
   * @param string $location
   * @return string $social_media_menu
  */
  function aztheme_social_media_menu( $location = 'social_media_menu' ) {
    $menu_id = aztheme_get_menu_id( $location );
    if ( $menu_id === false ) {
      return;
    }
    $allowed_media = [
      'facebook', 'facebook-f', 'facebook-messenger', 'facebook-square',
      'twitter', 'twitter-square', 'youtube', 'youtube-square',
      'github', 'github-alt', 'github-square',
      'pinterest', 'pinterest-p', 'pinterest-square', 
      'behance', 'behance-square', 'instagram', 'instagram-square', 
      'linkedin', 'linkedin-in', 'whatsapp', 'whatsapp-square', 
      'tumblr', 'tumblr-square', 'snapchat', 'snapchat-square', 
      'reddit', 'reddit-square', 'reddit-alien', 'vimeo', 'vimeo-square', 'vimeo-v',
      'vk', 'soundcloud', 'skype', 'viber', 'line', 'telegram', 
      'flickr', 'quora', 'discord', 'tiktok', 'twitch',
    ];
    $menu_items = wp_get_nav_menu_items( $menu_id );
    if ( is_array( $menu_items ) && !empty( $menu_items ) ):
      ?>
        <ul class="list-unstyled d-flex mb-0 social-media-menu">
          <?php 
            foreach ( $menu_items as $menu_item): 
              $media = trim( strtolower($menu_item->title), ' ' ); 
              if ( in_array( $media, $allowed_media ) ):
                $media_label = ucfirst( substr( $media, strpos( $media, '-' ) ) );
          ?>
            <li>
              <a href="<?php echo esc_url( $menu_item->url ); ?>" target="_blank" aria-label="<?php echo esc_attr( $media_label ); ?>">
                <i class="fa fa-fw fa-<?php echo esc_attr( $media ); ?>" aria-hidden="true"></i>
              </a>
            </li>
          <?php endif; endforeach; ?>
        </ul>
      <?php
    endif;
  }
}

if ( ! function_exists( 'aztheme_primary_menu' ) ) {
  function aztheme_primary_menu() {
    $menu_id = aztheme_get_menu_id( 'primary_menu' );
    if ( $menu_id === false ) {
      return;
    }
    $menu_items = wp_get_nav_menu_items( $menu_id );
    if ( is_array( $menu_items ) && !empty( $menu_items ) ):
      ?>
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
          <?php foreach ( $menu_items as $menu_item ):
            if ( ! $menu_item->menu_item_parent  ):
              $child_menus = aztheme_child_menu_items( $menu_items, $menu_item->ID );
              if ( empty( $child_menus ) ):
                ?>
                  <li class="nav-item">
                    <a class="nav-link <?php echo aztheme_is_active( $menu_item->url ); ?>" href="<?php echo esc_url($menu_item->url); ?>">
                      <?php echo esc_html( $menu_item->title ); ?>
                    </a>
                  </li>
                <?php
              else:
                ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" id="<?php echo 'navbarDropDown' . $menu_item->ID;  ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo esc_html( $menu_item->title ); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="<?php echo 'navbarDropDown' . $menu_item->ID;  ?>">
                      <?php
                        foreach( $child_menus as $child_item ):
                          ?>
                            <li>
                              <a class="dropdown-item" href="<?php echo esc_url( $child_item->url ) ?>">
                                <?php echo esc_html($child_item->title); ?>
                              </a>
                            </li>
                          <?php
                        endforeach;
                      ?>
                    </ul>
                  </li>
                <?php
              endif;
            endif;
          endforeach; 
          ?>
        </ul>
      <?php
    endif;
  }
}