<?php
/**
 * Template part for displaying a message that posts cannot be found
 * 
 * @package WordPress
 * @subpackage aztheme
*/
?>
<div class="col-12">
  <section class="no-results not-found">
    <header class="page-header">
      <h2 class="page-title">
        <?php esc_html_e( 'Nothing found', 'aztheme' ); ?>
      </h2>
    </header>
    <div class="page-content">
      <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ):
          ?>
            <p class="no-results-description">
              <?php
                printf( wp_kses( 
                  /* translators: %s: Link to WP admin new post page.*/
                  __( 'Ready to publish your first post? <a href="%s">Get started here</a>', 'aztheme' ), 
                  [
                    'a' => [
                      'href'  => []
                    ]
                  ] ), 
                  esc_url( admin_url( 'post-new.php' ) ) 
                );
              ?>
            </p>
          <?php
        elseif ( is_search() ):
          ?>
            <p class="no-results-description">
              <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'aztheme' ) ?>
            </p>
          <?php
          get_search_form();
        else:
          ?>
            <p class="no-results-description">
              <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aztheme' ) ?>
            </p>
          <?php
          get_search_form();
        endif;
      ?>
    </div>
  </section>
</div>