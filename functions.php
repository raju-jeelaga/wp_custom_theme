<?php
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

function wp_custom_theme() {
    //wp_enqueue_style( 'style', get_template_directory_uri() );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
  }
add_action( 'wp_enqueue_scripts', 'wp_custom_theme' );

