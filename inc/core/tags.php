<?php
/**
 * Template tags functions
 * 
 * @package WordPress
 * @subpackage aztheme 
*/

if ( ! function_exists( 'aztheme_the_categories' ) ) {
  /**
   * Function to print the post categories
   * Must used insde the loop
  */
  function aztheme_the_categories() {
    if ( get_post_type() !== 'post' ) {
      return;
    }
    $categories = get_the_category();
    if ( ! empty( $categories ) ):
      echo '<div class="entry-categories">'; 
        foreach ( $categories as $category ):
          $category_ID          = $category->term_id;
          $category_css_class   = $category->slug . ' category-' . $category_ID;
          ?>
            <a class="entry-category <?php echo esc_attr( $category_css_class ); ?>" href="<?php echo esc_url( get_category_link( $category_ID ) ); ?>" rel="category tag">
              <?php echo esc_html( $category->name ); ?>
            </a>
            <?php
        endforeach;
      echo '</div>';
    endif;
  }
}

if ( ! function_exists( 'aztheme_the_title' ) ) {
  /**
   * Function to print the title
   * Must used insde the loop
  */
  function aztheme_the_title() {
    if ( is_singular() ) {
      return;
    }
    the_title( 
      sprintf( 
        '<h2 class="entry-title"><a href="%s" class="entry-title-link" rel="bookmark">', 
        esc_url( get_permalink() ) 
      ), 
      '</a></h2>' 
    );
  }
}

if ( ! function_exists( 'aztheme_publish_date' ) ) {
  /**
   * Function for print the date of publish and update
   * @return string $publish_date
  */
  function aztheme_publish_date() {
    $time_string = '<time class="posted-on" datetime="%1$s" itemprop="datePublished">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time('U') ) {
      $time_string .= '<time class="updated-on d-none" datetime="%3$s" itemprop="datePublished">%4$s</time>';
    }
    printf(
      $time_string,
      esc_attr( get_the_date( 'c' )),
      get_the_date(),
      esc_attr( get_the_modified_time( 'c' ) ),
      get_the_modified_date()
    );
  }
}

if ( ! function_exists( 'aztheme_the_post_meta' ) ) {
  /**
   * Function to print post meta
   * Must used insde the loop
  */
  function aztheme_the_post_meta() {
    if ( get_post_type() !== 'post' ) {
      return;
    }
    ?>
      <ul class="post-meta list-unstyled d-flex">
        <li class="meta-item">
          <i class="fa fa-fw fa-calendar" aria-hidden="true"></i>
          <?php aztheme_publish_date(); ?>
        </li>
        <li class="meta-item">
          <i class="fa fa-fw fa-user" aria-hidden="true"></i>
          <?php the_author_posts_link(); ?>
        </li>
        <li class="meta-item">
          <i class="fa fa-fw fa-comment" aria-hidden="true"></i>
          <?php 
            comments_popup_link(
              esc_html__( 'No comments', 'aztheme' ),
              esc_html__( 'One comment', 'aztheme' ),
              esc_html__( 
                /* translators: %: Comments counter.*/
                '% comments', 'aztheme' 
              ),
              '',
              esc_html__( 'Comments are deactivated', 'aztheme' )
            );
          ?>
        </li>
      </ul>
    <?php
  }
}

if ( ! function_exists( 'aztheme_the_thumbnail' ) ) {
  /**
   * Function to display post thumbanil
   * @param string $size post thumbanil size
   * @return 
  */
  function aztheme_the_thumbnail( $size = 'thumbnail-full' ) {
    if ( has_post_thumbnail() ) {
      ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-thumbnail-link" aria-label="Post thumbnail">
          <?php the_post_thumbnail( $size, ['class' => "entry-thumbnail $size" ] ); ?>
        </a>
      <?php
    } else {
      // Print the default image
      $thumbnail_sizes = wp_get_registered_image_subsizes();
      ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-thumbnail-link" aria-label="Post thumbnail">
          <img width="<?php echo esc_attr( $thumbnail_sizes[$size]['width'] ); ?>" height="<?php echo esc_attr( $thumbnail_sizes[$size]['height'] ); ?>" src="<?php echo esc_url( IMG_PATH . 'default-post-image.jpg' ) ?>" class="entry-thumbnail default-image <?php echo esc_attr( $size ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
        </a>
      <?php
    }
  }
}

if ( ! function_exists( 'aztheme_the_excerpt' ) ) {
  /**
   * Function to print the excerpt
   * @param length 
  */
  function aztheme_the_excerpt( $length = 200 ) {
    if ( $length === 0 ) {
      return;
    }
    // Get the excerpt
    $excerpt = get_the_excerpt();
    // Trim the excerpt
    $excerpt = substr( $excerpt, 0, $length );
    // Remove the last incomplete word after the maximum excerpt
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
    echo '<p class="entry-excerpt">' . $excerpt . '...</p>';
  }
}

if ( ! function_exists( 'aztheme_read_more' ) ) {
  /**
   * Function to print the read more button
   * @return 
  */
  function aztheme_read_more() {
    ?>
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="aztheme-btns read-more-btn ms-auto">
        <span class="label"><?php esc_html_e( 'Continue Reading', 'aztheme' ); ?></span>
      </a>
    <?php
  }
}