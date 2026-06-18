<?php
/**
 * Elementic Theme Customizer
 *
 * @package Elementic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elementic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'elementic_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'elementic_customize_partial_blogdescription',
			)
		);
	}

	// Layout Settings.
	$wp_customize->add_section(
		'elementic_layout_settings',
		array(
			'title'    => esc_html__( 'Layout Settings', 'elementic' ),
			'priority' => 30,
		)
	);

	// Sidebar Layout.
	$wp_customize->add_setting(
		'elementic_layout',
		array(
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'elementic_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'elementic_layout',
		array(
			'label'   => esc_html__( 'Sidebar Layout', 'elementic' ),
			'section' => 'elementic_layout_settings',
			'type'    => 'select',
			'choices' => array(
				'right-sidebar' => esc_html__( 'Right Sidebar', 'elementic' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'elementic' ),
				'no-sidebar'    => esc_html__( 'No Sidebar', 'elementic' ),
			),
		)
	);

	// Container Width.
	$wp_customize->add_setting(
		'elementic_container_width',
		array(
			'default'           => 1200,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'elementic_container_width',
		array(
			'label'       => esc_html__( 'Container Width (px)', 'elementic' ),
			'section'     => 'elementic_layout_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 960,
				'max'  => 1920,
				'step' => 10,
			),
		)
	);

	// Blog Settings.
	$wp_customize->add_section(
		'elementic_blog_settings',
		array(
			'title'    => esc_html__( 'Blog Settings', 'elementic' ),
			'priority' => 35,
		)
	);

	// Excerpt Length.
	$wp_customize->add_setting(
		'elementic_excerpt_length',
		array(
			'default'           => 30,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'elementic_excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt Length (words)', 'elementic' ),
			'section'     => 'elementic_blog_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 5,
			),
		)
	);

	// Show Featured Image.
	$wp_customize->add_setting(
		'elementic_show_featured_image',
		array(
			'default'           => true,
			'sanitize_callback' => 'elementic_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'elementic_show_featured_image',
		array(
			'label'   => esc_html__( 'Show Featured Image on Blog', 'elementic' ),
			'section' => 'elementic_blog_settings',
			'type'    => 'checkbox',
		)
	);

	// Show Post Meta.
	$wp_customize->add_setting(
		'elementic_show_post_meta',
		array(
			'default'           => true,
			'sanitize_callback' => 'elementic_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'elementic_show_post_meta',
		array(
			'label'   => esc_html__( 'Show Post Meta (Date, Author)', 'elementic' ),
			'section' => 'elementic_blog_settings',
			'type'    => 'checkbox',
		)
	);

	// Color Settings.
	$wp_customize->add_section(
		'elementic_color_settings',
		array(
			'title'    => esc_html__( 'Color Settings', 'elementic' ),
			'priority' => 40,
		)
	);

	// Primary Color.
	$wp_customize->add_setting(
		'elementic_primary_color',
		array(
			'default'           => '#ff8c00',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'elementic_primary_color',
			array(
				'label'   => esc_html__( 'Primary Color', 'elementic' ),
				'section' => 'elementic_color_settings',
			)
		)
	);

	// Secondary Color.
	$wp_customize->add_setting(
		'elementic_secondary_color',
		array(
			'default'           => '#e67a00',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'elementic_secondary_color',
			array(
				'label'   => esc_html__( 'Secondary Color', 'elementic' ),
				'section' => 'elementic_color_settings',
			)
		)
	);

	// Footer Settings.
	$wp_customize->add_section(
		'elementic_footer_settings',
		array(
			'title'    => esc_html__( 'Footer Settings', 'elementic' ),
			'priority' => 45,
		)
	);

	// Footer Title.
	$wp_customize->add_setting(
		'elementic_footer_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_title',
		array(
			'label'       => esc_html__( 'Footer Title', 'elementic' ),
			'section'     => 'elementic_footer_settings',
			'type'        => 'text',
			'description' => esc_html__( 'Enter the footer title (e.g., site name).', 'elementic' ),
		)
	);

	// Footer Description.
	$wp_customize->add_setting(
		'elementic_footer_description',
		array(
			'default'           => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'elementic' ),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_description',
		array(
			'label'       => esc_html__( 'Footer Description', 'elementic' ),
			'section'     => 'elementic_footer_settings',
			'type'        => 'textarea',
			'description' => esc_html__( 'Enter the footer description text.', 'elementic' ),
		)
	);

	// Social Media Links.
	$wp_customize->add_setting(
		'elementic_footer_facebook',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_facebook',
		array(
			'label'   => esc_html__( 'Facebook URL', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_instagram',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_instagram',
		array(
			'label'   => esc_html__( 'Instagram URL', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_youtube',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_youtube',
		array(
			'label'   => esc_html__( 'YouTube URL', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_twitter',
		array(
			'default'           => 'https://twitter.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_twitter',
		array(
			'label'   => esc_html__( 'Twitter URL', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'url',
		)
	);

	// Footer Section Titles.
	$wp_customize->add_setting(
		'elementic_footer_links_title',
		array(
			'default'           => esc_html__( 'Useful Links', 'elementic' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_links_title',
		array(
			'label'   => esc_html__( 'Useful Links Title', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_category_title',
		array(
			'default'           => esc_html__( 'Our Category', 'elementic' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_category_title',
		array(
			'label'   => esc_html__( 'Category Title', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_contact_title',
		array(
			'default'           => esc_html__( 'Contact Us', 'elementic' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_contact_title',
		array(
			'label'   => esc_html__( 'Contact Title', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'text',
		)
	);

	// Contact Information.
	$wp_customize->add_setting(
		'elementic_footer_phone',
		array(
			'default'           => '+1234567890',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_phone',
		array(
			'label'   => esc_html__( 'Phone Number', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_email',
		array(
			'default'           => 'personalblog@example.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_email',
		array(
			'label'   => esc_html__( 'Email Address', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'email',
		)
	);

	$wp_customize->add_setting(
		'elementic_footer_address',
		array(
			'default'           => '123 Glassford Street New York, USA',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_address',
		array(
			'label'   => esc_html__( 'Address', 'elementic' ),
			'section' => 'elementic_footer_settings',
			'type'    => 'textarea',
		)
	);

	// Footer Copyright Text.
	$wp_customize->add_setting(
		'elementic_footer_copyright',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'elementic_footer_copyright',
		array(
			'label'       => esc_html__( 'Copyright Text', 'elementic' ),
			'section'     => 'elementic_footer_settings',
			'type'        => 'textarea',
			'description' => esc_html__( 'Enter your custom copyright text. Leave empty to use default.', 'elementic' ),
		)
	);
}
add_action( 'customize_register', 'elementic_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function elementic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function elementic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elementic_customize_preview_js() {
	wp_enqueue_script( 'elementic-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), ELEMENTIC_VERSION, true );
}
add_action( 'customize_preview_init', 'elementic_customize_preview_js' );

/**
 * Output CSS custom properties for customizer settings
 * This is the only minimal inline CSS needed to set dynamic CSS variables
 */
function elementic_customizer_css() {
	$primary_color   = get_theme_mod( 'elementic_primary_color', '#ff8c00' );
	$secondary_color = get_theme_mod( 'elementic_secondary_color', '#e67a00' );
	$container_width = get_theme_mod( 'elementic_container_width', 1200 );

	?>
	<style type="text/css">
		:root {
			--elementic-primary-color: <?php echo esc_attr( $primary_color ); ?>;
			--elementic-secondary-color: <?php echo esc_attr( $secondary_color ); ?>;
			--elementic-container-width: <?php echo absint( $container_width ); ?>px;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'elementic_customizer_css' );
