<?php
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
function university_features() {
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');

add_theme_support( 'post-thumbnails' );

function wp_custom_theme() {
    //wp_enqueue_style( 'style', get_template_directory_uri() );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
  }
add_action( 'wp_enqueue_scripts', 'wp_custom_theme' );


// Register Custom post Type
function university_post_types() {
  register_post_type('our_events', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', "thumbnail", 'excerpt'),
    'rewrite' => array('slug' => 'our_events'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));
}

add_action('init', 'university_post_types');

// Events Pagination
function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            ));
  }
}

add_action('pre_get_posts', 'university_adjust_queries');


