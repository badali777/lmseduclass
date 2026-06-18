<?php
/**
 * Makoa Personal Theme Functions
 *
 * @package Makoa_Personal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register pattern category for Makoa Personal
 */
function makoa_personal_register_pattern_category() {
	register_block_pattern_category(
		'makoa-personal',
		array(
			'label' => esc_html__( 'Makoa Personal', 'makoa-personal' ),
		)
	);
}
add_action( 'init', 'makoa_personal_register_pattern_category' );
