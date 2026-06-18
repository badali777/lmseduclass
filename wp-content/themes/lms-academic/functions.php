<?php
/**
 * LMS Academic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lms_academic
 */


if ( ! function_exists( 'lms_academic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lms_academic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LMS Academic, use a find and replace
		 * to change 'lms-academic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lms-academic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support( 'widgets-block-editor' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size( 'lms-academic-blog-thumbnail-img', 600, 400, true);

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'lms-academic' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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
		add_theme_support( 'custom-header' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lms_academic_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'lms_academic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */



/* Place Below Dynamic Footer Code */

add_action('wp_footer', 'your_function_name');
function your_function_name() {
?>

<?php if ( get_option( 'theme_demo' ) ) { ?>
	<style>
#back-to-top{
	bottom:100px;     
}
@media only screen and (max-width: 991px) {
	footer{
		padding-bottom:60px;
	}
}
</style>
<div class="box_wrapper">
        <div class="toggle" id="togglePopup"></div>
        <div class="section-deal">
            <h2>Make your website live today!</h2>
            <h3>GET <strong>A FULL</strong> COPY OF THIS EXACT DEMO THEME IN YOUR WORDPRESS WITHIN MINUTES.</h3>
            <ul>
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
                        <path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
                        </path>
                    </svg> Effortless one-click demo import</li>
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
                        <path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
                        </path>
                    </svg> Theme Installation Service at <strong>$29</strong></li>
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
                        <path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
                        </path>
                    </svg> Life Time Updates & Premium Support</li>
				   <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
                        <path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
                        </path>
                    </svg> Risk-Free 7 Days Money Back Policy</li>
            </ul>
            <p>Purchase this WordPress theme and <strong> save $10</strong> today.</p>
        </div>
        <div class="section-action">
            <a href="https://www.flawlessthemes.com/theme/lms-academic-best-online-course-wordpress-theme/#demos" class="action-button" target="_blank"><span class="main">Buy LMS Academic Theme </span><span
                    class="after">SALE</span>
            </a>
        </div>
    </div>
  <script>
       document.addEventListener('DOMContentLoaded', function () {
        var toggleButton = document.getElementById('togglePopup');
        var boxWrapper = document.querySelector('.box_wrapper');
 
        toggleButton.addEventListener('click', function () {
            boxWrapper.classList.toggle('open');
        });
    });
    </script>
<?php } ?>
<?php
};

/* Dynamic Footer Ends Here */





function lms_academic_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lms_academic_content_width', 640 );
}
add_action( 'after_setup_theme', 'lms_academic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lms_academic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lms-academic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lms-academic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => esc_html__('LMS Academic Footer Widget', 'lms-academic') . $i,
            'id' => 'lms_academic_footer_' . $i,
            'description' => esc_html__('Shows Widgets in Footer', 'lms-academic') . $i,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
}
add_action( 'widgets_init', 'lms_academic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lms_academic_scripts_enqueue() {
	wp_enqueue_style( 'lms-academic-style', get_stylesheet_uri() );
    wp_enqueue_style( 'lms-academic-font', lms_academic_font_url(), array(), null);
    wp_enqueue_style( 'lms-academic-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );
     wp_enqueue_style( 'lms-academic-fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '1.0' );
     wp_enqueue_style( 'lms-academic-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0' );
     wp_enqueue_style( 'lms-academic-ionicons-css', get_template_directory_uri() . '/assets/css/ionicons.css', array(), '1.0' );
       wp_enqueue_style( 'lms-academic-youtube-popup-css', get_template_directory_uri() . '/assets/css/youtube-popup.css', array(), '1.0' );
     wp_enqueue_style( 'lms-academic-css', get_template_directory_uri() . '/assets/css/lms-academic.css', array(), '1.0' );
     wp_enqueue_style( 'lms-academic-media-css', get_template_directory_uri() . '/assets/css/media-queries.css', array(), '1.0' );
	wp_enqueue_script( 'lms-academic-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'lms-academic-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);

	wp_enqueue_script('custom_script_js', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '', true);

	wp_enqueue_script( 'lms-academic-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script( 'lms-academic-youtube-popup', get_template_directory_uri() . '/assets/js/youtubepopup.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'lms-academic-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0', true);

	wp_enqueue_script( 'lms-academic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lms_academic_scripts_enqueue' );

function lms_academic_custom_customize_enqueue()
{
    wp_enqueue_style('lms-academic-customizer-style', trailingslashit(get_template_directory_uri()) . 'inc/customizer/css/customizer-control.css');
}

add_action('customize_controls_enqueue_scripts', 'lms_academic_custom_customize_enqueue');



if (!function_exists('lms_academic_font_url')) :
    function lms_academic_font_url()
    {
        $fonts_url = '';
        $fonts = array();


        if ('off' !== _x('on', 'Open Sans font: on or off', 'lms-academic')) {
            $fonts[] = 'Open Sans:300';
        }

        if ('off' !== _x('on', 'Questrial font: on or off', 'lms-academic')) {
            $fonts[] = 'Questrial:400';
        }
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/lms-academic-menu.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer-control.php';
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/lms-academic-customizer-default.php';
require get_template_directory() . '/plugin-activation.php';
require get_template_directory() . '/lib/lms-academic-tgmp.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if (!function_exists('lms_academic_get_excerpt')) :
    function lms_academic_get_excerpt($post_id, $count)
    {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
endif;



if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}



if (!function_exists('lms_academic_blank_widget')) {

    function lms_academic_blank_widget()
    {
        echo '<div class="col-md-4">';
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' . esc_url(admin_url('widgets.php')) . '" target="_blank"><i class="fa fa-plus-circle"></i> ' . esc_html__('Add Footer Widget', 'lms-academic') . '</a>';
        }
        echo '</div>';
    }
}
add_action('admin_enqueue_scripts', 'load_admin_style');
function mytheme_setup() {

    // Block editor default styles
    add_theme_support( 'wp-block-styles' );

    // Responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Allow wide and full block alignment
    add_theme_support( 'align-wide' );

    // Custom header support
    add_theme_support( 'custom-header', array(
        'width'       => 1200,
        'height'      => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Editor style support
    add_editor_style( 'editor-style.css' );

}
add_action( 'after_setup_theme', 'mytheme_setup' );
function load_admin_style()
{
	wp_enqueue_script('jquery');
	wp_enqueue_style('theme_settings_css', get_template_directory_uri() . '/assets/css/theme-settings.css', false, '1.0.0');
	wp_enqueue_style('bootstrap_min_css', get_template_directory_uri() . '/assets/css/latest.bootstrap.css', false, '1.0.0');
	wp_enqueue_script('bootstrap_bundle_min_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}

function custom_admin_page()
{
	add_menu_page(
		'Lms Academic Free',    // Page title
		'Lms Academic Free',    // Menu title
		'manage_options', // Capability required to access the menu page
		'lms_academic_free',     // Menu slug (unique identifier)
		'custom_page_callback', // Function to display the page content
		'dashicons-admin-generic', // Icon URL or a dashicon class
		99                 // Position in the menu
	);
}
add_action('admin_menu', 'custom_admin_page');
// Function to display the content of the custom page




function custom_page_callback()
{
?>



	<div class="wrap" id="theme_settings">
		<h1 hidden></h1>
		<div class="accordion bl_tab_">

			<div class="row">
				<div class="col-md-3 col-lg-2 col-sm-12">
					<div class="nav flex-column nav-pills" id="bl-pills-tab" role="tablist" aria-orientation="vertical">
						<aside>
							<div class="accordion" id="theme_settings_accordion">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											General Settings </button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#theme_settings_accordion">
										<div class="accordion-body">
											<button class="nav-link show active" id="bl-pills-2-tab" data-bs-toggle="pill" data-bs-target="#bl-pills-2" type="button" role="tab" aria-controls="bl-pills-2" aria-selected="false">Back to Top</button>
											<button class="nav-link " id="bl-pills-1-tab" data-bs-toggle="pill" data-bs-target="#bl-pills-1" type="button" role="tab" aria-controls="bl-pills-1" aria-selected="true">Breadcrumbs</button>


										</div>
									</div>
								</div>

								
								<div class="accordion-item">

									<h2 class="accordion-header">
										<button class="nav-link collapsed" aria-expanded="false" id="bl-pills-3-tab" data-bs-toggle="pill" data-bs-target="#bl-pills-3" type="button" role="tab" aria-controls="bl-pills-3" aria-selected="false">
											Support
										</button>
									</h2>
								</div>

							</div>
						</aside>
					</div>
				</div>
				<div class="col-md-9 col-lg-10 col-sm-12">
					<div class="card p-lg-4 p-3 m-0">
						<div class="tab-content m-0" id="bl-pills-tabContent">
							<div class="tab-pane fade " id="bl-pills-1" role="tabpanel" aria-labelledby="bl-pills-1-tab">
								<form method="post">
									<input type="hidden" name="reset" value="1">
									<div class="show_hide_label">
										<div><label for="lms-academic_dslc_breadcrumb_show">Show Breadcrumbs on your website</label></div>
										<div class="onoff" id="onoff2">
											<input name="lms-academic_dslc_breadcrumb_show" type="checkbox" value="1" id="lms-academic_dslc_breadcrumb_show" <?php echo (get_option('lms-academic_dslc_breadcrumb_show') === "on") ? "checked" : ""; ?>>
											<label for="lms-academic_dslc_breadcrumb_show"> </label>
										</div>
									</div>

									<div class="bl_list_">
										<ul class="template_listing" id="template_list">
											<?php
											$args = array(
												'public'   => true,
												'show_in_menu' => true, // Set to true if you also want to include built-in post types like 'post' and 'page'.
											);

											$post_types = get_post_types($args, 'names');
											asort($post_types);
											foreach ($post_types as $key => $item) {
											?>
												<li>
													<label class="all new">
														<input class="lms-academic_breadcrumb_post" name="<?php echo 'lms-academic_dslc_' . $key; ?>" <?php echo ((get_option('lms-academic_dslc_' . $key) == 1) ? "checked" : ""); ?> type="checkbox"><?php echo $item ?>
													</label>
												</li>

											<?php } ?>


										</ul>
										<label class="bread_all">
											<input class="Select All" name="lms-academic_dslc_bread_all" <?php echo ((get_option('lms-academic_dslc_bread_all') == 1) ? "checked" : "") ?> type="checkbox">Apply to all
										</label>
									</div>
									<button type="submit" class="btn bttn">Save</button>
								</form>
							</div>
							<div class="tab-pane fade show active" id="bl-pills-2" role="tabpanel" aria-labelledby="bl-pills-2-tab">
								<form method="post">
									<input type="hidden" value="1" name="lms-academic_free_back_top_top_enable_form">
									<div class="show_hide_label">
										<div><label for="back_top_top_enable">Show Back To Top button on your website</label></div>
										<div class="onoff">
											<input type="checkbox" id="back_top_top_enable" name="back_top_top_enable" <?php if (get_option('lms-academic_free_back_top_top_enable') && get_option('lms-academic_free_back_top_top_enable') == "on") {
																															echo "checked";
																														} ?>>
											<label for="back_top_top_enable"></label>
										</div>
									</div>

									<?php submit_button(); ?>
								</form>
							</div>
							<div class="tab-pane fade" id="bl-pills-3" role="tabpanel" aria-labelledby="bl-pills-3-tab">
								<div>
									<a href="https://support.flawlessthemes.com/hc/3570365436/category/69" target="blank">Click here</a> to access our Knowledge Base.
								</div>
							</div>
							<div class="tab-pane fade" id="bl-pills-4" role="tabpanel" aria-labelledby="bl-pills-4-tab">
								<form method="post" action="options.php">

									<?php

									settings_fields('lms-academic_theme_option_group');
									do_settings_sections('lms-academic_theme_options');
									submit_button();
									?>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>



		<script>
	// On/Off JS
	jQuery(document).ready(function($) {
		if ($('#onoff2 input').is(':checked')) {
			$('.bl_tab_ .bl_list_').fadeIn('slow');
		} else {
			$('.bl_tab_ .bl_list_').fadeOut('slow');
		}

		// Toggle breadcrumb list on checkbox change
		$('#onoff2 input').change(function() {
			if ($(this).is(':checked')) {
				$('.bl_tab_ .bl_list_').fadeIn('slow');
			} else {
				$('.bl_tab_ .bl_list_').fadeOut('slow');
			}
		});

		jQuery(document).ready(function ($) {

    // Apply to all checkbox
    $('.bread_all input').on('change', function () {
        $('.lms-academic_breadcrumb_post').prop(
            'checked',
            $(this).is(':checked')
        );
    });

    // Sync Apply to all when individual checkboxes change
    $('.lms-academic_breadcrumb_post').on('change', function () {
        var total   = $('.lms-academic_breadcrumb_post').length;
        var checked = $('.lms-academic_breadcrumb_post:checked').length;

        $('.bread_all input').prop('checked', total === checked);
    });

});

	});
</script>

<?php


}










// custom callback function to print field HTML
function handle_post__request()
{
	if (isset($_POST) && isset($_POST['lms-academic_free_back_top_top_enable_form'])) {

		if (!empty($_POST['back_top_top_enable'])) {
			update_option('lms-academic_free_back_top_top_enable', $_POST['back_top_top_enable']);
		} else {
			update_option('lms-academic_free_back_top_top_enable', 0);
		}
	}
	if (isset($_POST) &&  isset($_POST['reset'])) {
		try {
			$args = array(
				'public'   => true,
				'show_in_menu' => true, // Set to true if you also want to include built-in post types like 'post' and 'page'.
			);
			$post_types = get_post_types($args, 'names');
			foreach ($post_types as $t_key => $t_item) {
				update_option('lms-academic_dslc_' . $t_key, 0);
			}

			update_option('lms-academic_dslc_bread_all', 0);
			foreach ($post_types as $t_key => $t_item) {
				if (isset($_POST['lms-academic_dslc_' . $t_key])) {
					update_option('lms-academic_dslc_' . $t_key, 1);
				}
			}
			if (isset($_POST['lms-academic_dslc_bread_all'])) {
				update_option('lms-academic_dslc_bread_all', 1);
			}
			if (isset($_POST['lms-academic_dslc_breadcrumb_show'])) {
				update_option('lms-academic_dslc_breadcrumb_show', 'on');
			} else {
				update_option('lms-academic_dslc_breadcrumb_show', 'off');
			}
		} catch (\Throwable $th) {
		}
	}
}
add_action('admin_init', 'handle_post__request');

// Hook to add the custom menu page
add_action('admin_menu', 'custom_admin_page');
// Breadcrumb function
function custom_breadcrumbs()
{
	// Home page link
	echo '<a href="' . home_url('/') . '">' . __('Home', 'lms-academic') . '</a> <span class="separator">/</span> ';

	// Check if on a singular post or page
	if (is_singular()) {
		global $post;

		// Get the category for the post
		$categories = get_the_category($post->ID);

		if ($categories) {
			$category = $categories[0]; // Use the first category
			echo '<a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a> <span class="separator">/</span> ';
		}

		// Display the post title
		echo '<span class="current">' . get_the_title() . '</span>';
	} elseif (is_category()) {
		// Display the current category
		echo '<span class="current">' . single_cat_title('', false) . '</span>';
	} elseif (is_tag()) {
		// Display the current tag
		echo '<span class="current">' . single_tag_title('', false) . '</span>';
	} elseif (is_archive()) {
		// Display the current archive
		echo '<span class="current">' . get_the_archive_title() . '</span>';
	} elseif (is_search()) {
		// Display the search term
		echo '<span class="current">' . __('Search results for: ', 'lms-academic') . get_search_query() . '</span>';
	} elseif (is_404()) {
		// Display 404 message
		echo '<span class="current">' . __('404 Not Found', 'lms-academic') . '</span>';
	}
	echo "
	<style>.separator {
		margin: 0 5px;
	}
	 
	.current {
		font-weight: bold;
	}
	 </style>";
}

function check_breadcrumb()
{
	if (get_option('lms-academic_dslc_breadcrumb_show') == 'on') {
		if (is_single()) {
			$post_type = get_post_type();
			if (get_option('lms-academic_dslc_' . $post_type) == 1) {
				$already_set = 1;
				if (function_exists('custom_breadcrumbs')) custom_breadcrumbs();
			}
		} elseif (is_page()) {
			if (get_option('lms-academic_dslc_page') == 1) {
				$already_set = 1;
				if (function_exists('custom_breadcrumbs')) custom_breadcrumbs();
			}
		}
		if (get_option('lms-academic_dslc_bread_all') == 1 && !isset($already_set)) {
			if (function_exists('custom_breadcrumbs')) custom_breadcrumbs();
		}
	}
}


?>