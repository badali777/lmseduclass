<?php
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elms_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'elms_content_width', 640 );
}
add_action( 'after_setup_theme', 'elms_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elms_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'elms' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'elms' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action( 'widgets_init', 'elms_widgets_init' );


/**
 * Display admin notice when theme is activated or themes page is loaded
 */
function elms_admin_notice() {
	// Get current screen
	$screen = get_current_screen();

	// Check if we're on the themes page
	if ($screen && ($screen->id === 'themes' || $screen->id === 'dashboard')) {
		$theme_activated = isset($_GET['activated']) && $_GET['activated'] == 'true';

		// Get theme screenshot URL
		$theme = wp_get_theme();
		$screenshot = $theme->get_screenshot();

		// Start output buffering to build our notice
		ob_start();
		?>
		<div class="notice notice-success is-dismissible elms-welcome-notice">
			<div class="elms-welcome-content" style="display: flex; align-items: center; padding: 15px 0;">
				<?php if ($screenshot) : ?>
					<div class="elms-screenshot" style="margin-right: 20px; flex: 0 0 200px;">
						<img src="<?php echo esc_url($screenshot); ?>" style="max-width: 100%; height: auto; border: 1px solid #ddd;">
					</div>
				<?php endif; ?>

				<div class="elms-welcome-text">
					<h2><?php echo $theme_activated ? 'Welcome! Thank you for choosing ' . esc_html($theme->get('Name')) . '!' : 'Welcome! Thank you for choosing ' . esc_html($theme->get('Name')). ' theme. ' ?> </h2>

					<p><?php echo esc_html__("We're delighted to have you on board. To make the most of your experience and unlock all the features this theme offers, explore the customization options and start building your site today.", "elms");?></p>

					<div class="elms-links" style="margin-top: 15px;">
						<a href="mailto:kader.webdev@gmail.com" class="button button-primary" target="_blank"><?php echo esc_html__('Get Help', 'elms');?></a>
						<a href="/wp-admin/customize.php" class="button" target="_blank" style="margin-left: 10px;"><?php echo esc_html__('Settings', 'elms');?></a>
					</div>
				</div>
			</div>
		</div>
		<?php
		// Get the buffered content
		$notice = ob_get_clean();
		echo $notice;
	}
}
add_action('admin_notices', 'elms_admin_notice');