<?php
/**
 * Register Social Links Widget.
 *
 * @package Elementic
 */

if ( class_exists( 'Elementic_Social_Links_Widget' ) ) {
	/**
	 * Register the Social Links Widget.
	 */
	function elementic_register_social_links_widget() {
		register_widget( 'Elementic_Social_Links_Widget' );
	}
	add_action( 'widgets_init', 'elementic_register_social_links_widget' );
}
