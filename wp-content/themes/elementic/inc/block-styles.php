<?php
/**
 * Block styles functionality.
 *
 * @package Elementic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom block styles for core blocks.
 */
function elementic_register_block_styles() {
	// phpcs:disable WordPress.WP.CustomBlocks -- Themes are allowed to register block styles.
	// Button: ghost style.
	// phpcs:ignore -- Themes are allowed to register block styles.
	register_block_style( // phpcs:ignore
		'core/button',
		array(
			'name'  => 'elementic-ghost',
			'label' => __( 'Ghost (Elementic)', 'elementic' ),
		)
	);

	// Quote: bordered style.
	// phpcs:ignore -- Themes are allowed to register block styles.
	register_block_style( // phpcs:ignore
		'core/quote',
		array(
			'name'  => 'elementic-bordered',
			'label' => __( 'Bordered (Elementic)', 'elementic' ),
		)
	);
	// phpcs:enable
}
add_action( 'init', 'elementic_register_block_styles' );
