<?php
/**
 * Template for displaying search forms
 *
 * @package Elementic
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'elementic' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'elementic' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" autocomplete="off" />
	</label>
	<button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'elementic' ); ?>">
		<i class="fas fa-search" aria-hidden="true"></i>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'elementic' ); ?></span>
	</button>
	<div class="el-search-results" id="el-ajax-search-results" style="display: none;" role="listbox" aria-label="<?php esc_attr_e( 'Search results', 'elementic' ); ?>" aria-live="polite" aria-atomic="false"></div>
</form>