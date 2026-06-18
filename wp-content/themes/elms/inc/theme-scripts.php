<?php
/**
 * Enqueue scripts and styles.
 */
function elms_scripts()
{
  // // bootstrap stylesheet.
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], null);

  // // Fontawesome V5 stylesheet.
  wp_enqueue_style('fontawesome-5', get_template_directory_uri() . '/assets/css/all.min.css', [], null);
  wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', [], null);

    // Web font loaded.
    wp_enqueue_style('elms-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap', [], null );

  // Theme stylesheet.
  wp_enqueue_style('elms-style', get_stylesheet_uri(), [], ELMS_VERSION);

  // Add main stylesheet
  wp_enqueue_style('elms-main-style', get_template_directory_uri() . '/assets/css/elms-style.css', [], ELMS_VERSION);

  // Add responsive stylesheet
  wp_enqueue_style('elms-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], null);


  /**
   * Load All jQuery Library
   */
  wp_enqueue_script('elms-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], ELMS_VERSION, true);

  wp_enqueue_script('elms-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], ELMS_VERSION, true);

  wp_enqueue_script('elms-popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], ELMS_VERSION, true);
  wp_enqueue_script('wow-js', get_template_directory_uri() . '/assets/js/wow.min.js', [], ELMS_VERSION, true);

  // Add elms-main js library
  wp_enqueue_script('elms-scripts-js', get_template_directory_uri() . '/assets/js/elms-scripts.js', ['jquery'], '', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'elms_scripts');