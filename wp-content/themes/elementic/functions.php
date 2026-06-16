<?php
/**
 * Elementic functions and definitions
 *
 * @package Elementic
 *
 * IMPORTANT: This theme must NOT create posts, pages, menus, or any other content
 * programmatically. Themes should only register features, templates, and display
 * existing content. Content creation is not allowed in themes per WordPress guidelines.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ELEMENTIC_VERSION', '1.0.0' );
define( 'ELEMENTIC_THEME_DIR', get_template_directory() );
define( 'ELEMENTIC_THEME_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function elementic_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'elementic', ELEMENTIC_THEME_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 630, true );
	add_image_size( 'elementic-featured', 800, 450, true );
	add_image_size( 'elementic-thumbnail', 400, 300, true );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary'             => esc_html__( 'Primary Menu', 'elementic' ),
			'footer'              => esc_html__( 'Footer Menu', 'elementic' ),
			'footer-useful-links' => esc_html__( 'Footer Useful Links', 'elementic' ),
			'footer-category'     => esc_html__( 'Footer Category', 'elementic' ),
		)
	);

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Add support for custom background.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f0f2f5',
		)
	);

	// Add support for custom header.
	add_theme_support(
		'custom-header',
		array(
			'default-image'      => '',
			'width'              => 1920,
			'height'             => 400,
			'flex-height'        => true,
			'flex-width'         => true,
			'header-text'        => true,
			'default-text-color' => '222222',
		)
	);

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for wide and full alignment.
	add_theme_support( 'align-wide' );

	// Add support for post formats.
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// WooCommerce support.
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	load_theme_textdomain( 'elementic', get_template_directory() . '/language' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Editor styling.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'elementic_setup' );


/**
 * Set the content width in pixels
 */
function elementic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elementic_content_width', 1200 );
}
add_action( 'after_setup_theme', 'elementic_content_width', 0 );

/**
 * Register widget areas
 */
function elementic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elementic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'elementic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'elementic' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'elementic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'elementic' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'elementic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'elementic' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'elementic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'elementic' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'elementic' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elementic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elementic_scripts() {

	// Main stylesheet.
	wp_enqueue_style( 'elementic-style', get_stylesheet_uri(), array(), ELEMENTIC_VERSION );

	// Navigation & layout stylesheet (contains navigation and blog layout rules).
	wp_enqueue_style( 'elementic-navigation-style', ELEMENTIC_THEME_URI . '/assets/css/navigation.css', array( 'elementic-style' ), ELEMENTIC_VERSION );

	// RTL support.
	wp_style_add_data( 'elementic-style', 'rtl', 'replace' );

	// Font Awesome for icons.
	wp_enqueue_style( 'elementic-font-awesome', ELEMENTIC_THEME_URI . '/assets/fonts/fontawesome/css/all.css', array(), '7.1.0' );

	// Skip link focus fix for accessibility (IE compatibility).
	wp_enqueue_script( 'elementic-skip-link-focus-fix', ELEMENTIC_THEME_URI . '/assets/js/skip-link-focus-fix.js', array(), ELEMENTIC_VERSION, true );

	// Navigation script.
	wp_enqueue_script( 'elementic-navigation', ELEMENTIC_THEME_URI . '/assets/js/navigation.js', array( 'jquery' ), ELEMENTIC_VERSION, true );

	// Main theme script.
	wp_enqueue_script( 'elementic-script', ELEMENTIC_THEME_URI . '/assets/js/script.js', array(), ELEMENTIC_VERSION, true );

	// Search AJAX script.
	wp_enqueue_script( 'elementic-search', ELEMENTIC_THEME_URI . '/assets/js/search.js', array( 'jquery' ), ELEMENTIC_VERSION, true );
	wp_localize_script(
		'elementic-search',
		'elementicSearch',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'elementic_search_nonce' ),
		)
	);

	// Pagination AJAX script.
	if ( is_home() || is_archive() || is_category() || is_tag() || is_author() || is_date() ) {
		wp_enqueue_script( 'elementic-pagination', ELEMENTIC_THEME_URI . '/assets/js/pagination.js', array( 'jquery' ), ELEMENTIC_VERSION, true );
		wp_localize_script(
			'elementic-pagination',
			'elementicPagination',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'elementic_pagination_nonce' ),
			)
		);
	}

	// Comment reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elementic_scripts' );

/**
 * Implement the Custom Header feature
 */
require ELEMENTIC_THEME_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme
 */
require ELEMENTIC_THEME_DIR . '/inc/template-tags.php';

/**
 * Customizer additions
 */
require ELEMENTIC_THEME_DIR . '/inc/customizer.php';

/**
 * Load block styles and block patterns
 */
require_once ELEMENTIC_THEME_DIR . '/inc/block-styles.php';
require_once ELEMENTIC_THEME_DIR . '/inc/block-patterns.php';

/**
 * Custom widgets
 */
require ELEMENTIC_THEME_DIR . '/inc/widgets/class-elementic-recent-posts-widget.php';
require ELEMENTIC_THEME_DIR . '/inc/widgets/class-elementic-social-links-widget.php';
require ELEMENTIC_THEME_DIR . '/inc/widgets/register-social-links-widget.php';

/**
 * Add custom body classes.
 *
 * @param array $classes The classes array.
 * @return array Modified classes array.
 */
function elementic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Add layout class.
	$layout    = get_theme_mod( 'elementic_layout', 'right-sidebar' );
	$classes[] = sanitize_html_class( $layout );

	return $classes;
}
add_filter( 'body_class', 'elementic_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts
 */
function elementic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'elementic_pingback_header' );

/**
 * Custom excerpt length.
 *
 * @param int $length The excerpt length in words.
 * @return int Modified excerpt length.
 */
function elementic_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return get_theme_mod( 'elementic_excerpt_length', 30 );
}
add_filter( 'excerpt_length', 'elementic_excerpt_length', 999 );

/**
 * Custom excerpt more.
 *
 * @param string $more The excerpt more string.
 * @return string Modified excerpt more string.
 */
function elementic_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '...';
}
add_filter( 'excerpt_more', 'elementic_excerpt_more' );

/**
 * Add custom post classes.
 *
 * @param array  $classes The post classes.
 * @param string $css_class The CSS class argument.
 * @param int    $post_id The post ID.
 * @return array Modified classes array.
 */
function elementic_post_classes( $classes, $css_class, $post_id ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
	if ( ! is_singular() ) {
		$classes[] = 'entry-item';
	}
	return $classes;
}
add_filter( 'post_class', 'elementic_post_classes', 10, 3 );

/**
 * Filter the archive title.
 *
 * @param string $title The archive title.
 * @return string Modified archive title.
 */
function elementic_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'elementic_archive_title' );

/**
 * Sanitize checkbox.
 *
 * @param mixed $checked The checkbox value to sanitize.
 * @return bool Sanitized checkbox value.
 */
function elementic_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize select.
 *
 * @param string $input The select input value.
 * @param object $setting The setting object.
 * @return string Sanitized select value.
 */
function elementic_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize number.
 *
 * @param int    $number The number input value.
 * @param object $setting The setting object.
 * @return int Sanitized number value.
 */
function elementic_sanitize_number( $number, $setting ) {
	$number = absint( $number );
	return ( $number ? $number : $setting->default );
}

/**
 * AJAX Search Handler
 */
function elementic_ajax_search() {
	// Verify nonce.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'elementic_search_nonce' ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Security check failed.', 'elementic' ) ) );
	}

	$search_term = isset( $_POST['search'] ) ? sanitize_text_field( wp_unslash( $_POST['search'] ) ) : '';

	if ( empty( $search_term ) || strlen( $search_term ) < 3 ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please enter at least 3 characters.', 'elementic' ) ) );
	}

	// Get all public post types (posts and custom post types).
	$post_types = get_post_types( array( 'public' => true ), 'names' );
	// Exclude attachments from search.
	unset( $post_types['attachment'] );

	$args = array(
		's'              => $search_term,
		'post_type'      => $post_types,
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'orderby'        => 'relevance',
	);

	$search_query = new WP_Query( $args );

	$results = array();

	if ( $search_query->have_posts() ) {
		while ( $search_query->have_posts() ) {
			$search_query->the_post();
			$post_type_obj   = get_post_type_object( get_post_type() );
			$post_type_label = $post_type_obj ? $post_type_obj->labels->singular_name : get_post_type();

			$results[] = array(
				'title'     => get_the_title(),
				'url'       => get_permalink(),
				'excerpt'   => wp_trim_words( get_the_excerpt(), 15, '...' ),
				'date'      => get_the_date(),
				'type'      => $post_type_label,
				'thumbnail' => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) : '',
			);
		}
		wp_reset_postdata();
	}

	wp_send_json_success(
		array(
			'results' => $results,
			'count'   => $search_query->found_posts,
		)
	);
}
add_action( 'wp_ajax_elementic_search', 'elementic_ajax_search' );
add_action( 'wp_ajax_nopriv_elementic_search', 'elementic_ajax_search' );

/**
 * Include custom post types in search.
 *
 * @param WP_Query $query The search query object.
 * @return void
 */
function elementic_search_post_types( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		// Get all public post types (posts and custom post types).
		$post_types = get_post_types( array( 'public' => true ), 'names' );
		// Exclude attachments from search.
		unset( $post_types['attachment'] );
		$query->set( 'post_type', array_values( $post_types ) );
	}
}
add_action( 'pre_get_posts', 'elementic_search_post_types' );

/**
 * Increase posts per page on homepage to ensure all category tabs have posts available.
 *
 * @param WP_Query $query The WordPress query object.
 * @return void
 */
function elementic_homepage_posts_per_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( is_home() || is_front_page() ) ) {
		// Load more posts on homepage to ensure all category tabs have posts available for filtering.
		$default_posts = absint( get_option( 'posts_per_page' ) );
		$query->set( 'posts_per_page', max( 100, $default_posts ) );
	}
}
add_action( 'pre_get_posts', 'elementic_homepage_posts_per_page' );

/*
 * Magic-line pagination removed.
 * The theme now uses `elementic_numeric_pagination()` and AJAX handler `elementic_ajax_pagination()`
 * for a single, consistent pagination implementation.
 *
 * If you need to restore the old magic-line visual effect, implement a small JS/CSS plugin
 * that enhances `.numeric-pagination` instead of keeping a separate pagination function.
 */

/**
 * AJAX Handler for Pagination
 */
function elementic_ajax_pagination() {
	// Verify nonce.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'elementic_pagination_nonce' ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Security check failed.', 'elementic' ) ) );
	}

	$paged      = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;
	$query_type = isset( $_POST['query_type'] ) ? sanitize_text_field( wp_unslash( $_POST['query_type'] ) ) : 'default';

	// Setup query args.
	// Limit posts per page to prevent performance issues, while respecting WordPress setting.
	$posts_per_page = min( absint( get_option( 'posts_per_page' ) ), 50 );
	$args           = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
	);

	// Handle different query types - get from current query if available.
	global $wp_query;

	if ( is_category() ) {
		$args['cat'] = get_queried_object_id();
	} elseif ( is_tag() ) {
		$args['tag_id'] = get_queried_object_id();
	} elseif ( is_author() ) {
		$args['author'] = get_queried_object_id();
	} elseif ( is_date() ) {
		if ( get_query_var( 'year' ) ) {
			$args['year'] = get_query_var( 'year' );
		}
		if ( get_query_var( 'monthnum' ) ) {
			$args['monthnum'] = get_query_var( 'monthnum' );
		}
		if ( get_query_var( 'day' ) ) {
			$args['day'] = get_query_var( 'day' );
		}
	}

	// Also handle from POST data if provided.
	if ( 'archive' === $query_type && isset( $_POST['archive_type'] ) ) {
		$archive_type = sanitize_text_field( wp_unslash( $_POST['archive_type'] ) );
		$archive_id   = isset( $_POST['archive_id'] ) ? absint( $_POST['archive_id'] ) : 0;

		switch ( $archive_type ) {
			case 'category':
				$args['cat'] = $archive_id;
				break;
			case 'tag':
				$args['tag_id'] = $archive_id;
				break;
			case 'author':
				$args['author'] = $archive_id;
				break;
			case 'date':
				if ( isset( $_POST['year'] ) ) {
					$args['year'] = absint( $_POST['year'] );
				}
				if ( isset( $_POST['month'] ) ) {
					$args['monthnum'] = absint( $_POST['month'] );
				}
				break;
		}
	}

	$query = new WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		}
		wp_reset_postdata();
	} else {
		get_template_part( 'template-parts/content', 'none' );
	}

	$content = ob_get_clean();

	// Get pagination HTML (use numeric pagination for AJAX responses).
	// Build the base URL for pagination links based on query type.
	$base_url = '';
	if ( 'archive' === $query_type ) {
		$archive_type = isset( $_POST['archive_type'] ) ? sanitize_text_field( wp_unslash( $_POST['archive_type'] ) ) : '';
		$archive_id   = isset( $_POST['archive_id'] ) ? absint( $_POST['archive_id'] ) : 0;

		if ( 'category' === $archive_type && $archive_id ) {
			$base_url = get_category_link( $archive_id );
		} elseif ( 'tag' === $archive_type && $archive_id ) {
			$base_url = get_tag_link( $archive_id );
		} elseif ( 'author' === $archive_type && $archive_id ) {
			$base_url = get_author_posts_url( $archive_id );
		}
	}

	// If no base URL yet, use the blog/home URL.
	if ( ! $base_url ) {
		$base_url = get_home_url() . '/';
		if ( ! is_front_page() ) {
			// If not front page, might be posts page.
			$posts_page = get_option( 'page_for_posts' );
			if ( $posts_page ) {
				$base_url = get_permalink( $posts_page );
			}
		}
	}

	ob_start();
	if ( function_exists( 'elementic_numeric_pagination' ) ) {
		elementic_numeric_pagination(
			array(
				'total'   => $query->max_num_pages,
				'current' => $paged,
				'base'    => $base_url,
			)
		);
	} elseif ( function_exists( 'elementic_magic_line_pagination' ) ) {
		// Fallback to magic line if numeric not available.
		elementic_magic_line_pagination(
			array(
				'total'   => $query->max_num_pages,
				'current' => $paged,
				'base'    => $base_url,
			)
		);
	} else {
		the_posts_pagination( array( 'mid_size' => 2 ) );
	}
	$pagination = ob_get_clean();

	wp_send_json_success(
		array(
			'content'    => $content,
			'pagination' => $pagination,
			'max_pages'  => $query->max_num_pages,
			'current'    => $paged,
		)
	);
}
add_action( 'wp_ajax_elementic_pagination', 'elementic_ajax_pagination' );
add_action( 'wp_ajax_nopriv_elementic_pagination', 'elementic_ajax_pagination' );

/**
 * Numeric Pagination.
 *
 * Outputs a simple numeric pagination using WordPress paginate_links.
 *
 * @param array $args Optional. Pagination arguments (total, current, base).
 * @return void
 */
function elementic_numeric_pagination( $args = array() ) {
	global $wp_query;

	$total   = isset( $args['total'] ) ? absint( $args['total'] ) : ( isset( $wp_query->max_num_pages ) ? absint( $wp_query->max_num_pages ) : 1 );
	$current = isset( $args['current'] ) ? absint( $args['current'] ) : max( 1, get_query_var( 'paged' ) );
	$base    = isset( $args['base'] ) ? $args['base'] : '';

	if ( $total <= 1 ) {
		return;
	}

	// Determine the base URL if not provided.
	if ( ! $base ) {
		$big    = 999999999; // Need an unlikely integer.
		$base   = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
		$format = '?paged=%#%';
	} else {
		// Use query string format for base URL.
		$base   = add_query_arg( 'paged', '%#%', $base );
		$format = '';
	}

	$links = paginate_links(
		array(
			'base'      => $base,
			'format'    => $format,
			'current'   => $current,
			'total'     => $total,
			'type'      => 'array',
			'prev_text' => esc_html__( '&laquo; Previous', 'elementic' ),
			'next_text' => esc_html__( 'Next &raquo;', 'elementic' ),
		)
	);

	if ( is_array( $links ) ) {
		// Build accessible numeric pagination. Add data-page and ARIA attributes.
		$nav_id = 'numeric-paging-' . uniqid();
		echo '<nav id="' . esc_attr( $nav_id ) . '" class="numeric-pagination" role="navigation" aria-label="' . esc_attr__( 'Posts numeric pagination', 'elementic' ) . '">';
		echo '<ul class="numeric-pagination-list">';

		foreach ( $links as $link_html ) {
			$link = $link_html; // Original HTML from paginate_links.

			// Detect current page.
			$is_current = ( false !== strpos( $link, 'current' ) );

			// Extract page number from href if present.
			$page_num = 0;
			if ( preg_match( '/href=["\']([^"\']+)["\']/', $link, $m ) ) {
				$href = html_entity_decode( $m[1], ENT_QUOTES, 'UTF-8' );
				// Try to find paged query var or /page/X/ pattern.
				if ( preg_match( '/[\?&]paged=(\d+)/', $href, $pm ) ) {
					$page_num = absint( $pm[1] );
				} elseif ( preg_match( '/\/page\/(\d+)\//', $href, $pm ) ) {
					$page_num = absint( $pm[1] );
				} elseif ( preg_match( '/\/page\/(\d+)$/', $href, $pm ) ) {
					$page_num = absint( $pm[1] );
				} else {
					$page_num = 1;
				}
			} elseif ( $is_current ) {
				$page_num = $current;
			}

			// Add aria-current for current page.
			if ( $is_current ) {
				// Replace <a ...> or <span ...> to ensure aria-current on span for current.
				if ( false !== strpos( $link, '<a' ) ) {
					// Unlikely, but handle.
					$link = str_replace( '<a', '<a aria-current="page"', $link );
				} else {
					$link = str_replace( '<span', '<span aria-current="page"', $link );
				}
				echo '<li class="page-item current" aria-hidden="false">' . $link . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				continue;
			}

			// For non-current links add data-page and rel when appropriate.
			// Insert data-page into the anchor.
			if ( false !== strpos( $link, '<a' ) ) {
				$data_attr = ' data-page="' . esc_attr( $page_num ) . '"';
				// Add aria-label to indicate page.
				/* translators: %d: page number */
				$aria_label = ' aria-label="' . esc_attr( sprintf( esc_html__( 'Go to page %d', 'elementic' ), $page_num ) ) . '"';
				// Add rel prev/next if applicable.
				$rel = '';
				if ( $page_num === $current - 1 ) {
					$rel = ' rel="prev"';
				} elseif ( $page_num === $current + 1 ) {
					$rel = ' rel="next"';
				}

				// Inject attributes into the first anchor tag.
				$link = preg_replace( '/<a(\s+)/', '<a$1' . $data_attr . $aria_label . $rel . ' ', $link, 1 );
			}

			echo '<li class="page-item">' . $link . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo '</ul>';
		echo '</nav>';
	}
}

/**
 * Add accessibility attributes to menu items with children.
 *
 * @param array    $atts The HTML attributes applied to the menu item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array The modified attributes.
 */
function elementic_nav_menu_link_attributes( $atts, $item, $args ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
	if ( in_array( 'menu-item-has-children', $item->classes, true ) || in_array( 'page_item_has_children', $item->classes, true ) ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'elementic_nav_menu_link_attributes', 10, 3 );
