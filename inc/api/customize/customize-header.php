<?php
/**
 * Customize the header using WordPress customize Api
 * 
 * @package WordPress
 * @subpackage aztheme 
*/

if ( ! function_exists( 'aztheme_customize_header' ) ) {
  /**
   * Function to create customize option for the page header
   * @param WP_Customize_Manager $wp_customize
  */
  function aztheme_customize_header( $wp_customize ) {

    // Create section
    $wp_customize->add_section( 
      'aztheme_customize_header_section', 
      [
        'priority'                      => 210,
        'title'                         => esc_html__( 'Page header', 'aztheme' ),
        'description'                   => esc_html__( 'Customize the page header', 'aztheme' ),
        'description_hidden'            => true
      ]
    );
    
    // Page header title setting
    $wp_customize->add_setting( 
      'aztheme_page_header_title', 
      [
        'default'                       => esc_html( get_bloginfo( 'name' ) ),
        'sanitize_callback'             => 'sanitize_text_field'
        // 'transport'                     => 'postMessage',
      ]
    );

    // Page header title description
    $wp_customize->add_setting(
      'aztheme_page_header_description',
      [
        'default'                       => esc_html( get_bloginfo( 'description' ) ),
        'sanitize_callback'             => 'aztheme_sanitize_description',
        // 'transport'                     => 'postMessage',
      ]
    );

    // Page header background color setting
    $wp_customize->add_setting(
      'aztheme_page_header_bg_color',
      [
        'default'                       => '#f0f5f9',
        'sanitize_callback'             => 'sanitize_hex_color'
        // 'transport'                     => 'postMessage',
      ]
    );

    // Page header title control
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'aztheme_page_header_title',
        [
          'type'                      => 'text',
          'section'                   => 'aztheme_customize_header_section',
          'label'                     => esc_html__( 'Page header title', 'aztheme' ),
          'description'               => esc_html__( 'This title is important for "SEO", the title appear in the homepage, please choose the write phrases carefully.', 'aztheme' ),
        ]
      )
    );

    // Page header description control
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'aztheme_page_header_description',
        [
          'type'                      => 'textarea',
          'section'                   => 'aztheme_customize_header_section',
          'label'                     => esc_html__( 'Page header description', 'aztheme' ),
          'description'               => esc_html__( 'Key phrases for your website content.', 'aztheme' ),
        ]
      )
    );

    // Page header background color control
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'aztheme_page_header_bg_color',
        [
          'label'                   => esc_html__( 'Background Color', 'aztheme' ),
          'section'                 => 'aztheme_customize_header_section'
        ]
      )
    );

  }
}

add_action( 'customize_register', 'aztheme_customize_header' );