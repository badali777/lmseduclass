<?php
/**
 * Block patterns functionality.
 *
 * @package Elementic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Block Patterns
 */
function elementic_register_block_patterns() {
	if ( function_exists( 'register_block_pattern' ) ) {
		// phpcs:disable WordPress.WP.CustomBlocks -- Themes are allowed to register block patterns.
		// phpcs:ignore -- Themes are allowed to register block patterns.
		register_block_pattern( // phpcs:ignore
			'elementic/hero-with-cta',
			array(
				'title'       => __( 'Hero with CTA', 'elementic' ),
				'description' => _x( 'Hero section with centered heading and CTA button', 'Block pattern description', 'elementic' ),
				'categories'  => array( 'header' ),
				'content'     => '
                    <!-- wp:group {"align":"full","className":"elementic-hero"} -->
                    <div class="wp-block-group alignfull elementic-hero"><div class="wp-block-group__inner-container">
                    <!-- wp:heading {"textAlign":"center","level":1} --><h1 class="has-text-align-center">Build Your Awesome Website</h1><!-- /wp:heading -->
                    <!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">We create beautiful websites for businesses.</p><!-- /wp:paragraph -->
                    <!-- wp:button {"align":"center"} --><div class="wp-block-button aligncenter"><a class="wp-block-button__link">Get Started</a></div><!-- /wp:button -->
                    </div></div>
                    <!-- /wp:group -->
                ',
			)
		);
		// phpcs:enable
	}
}
add_action( 'init', 'elementic_register_block_patterns' );
