<?php
/**
 * The template for displaying archive pages
 *
 * @package Elementic
 */

get_header();
?>

	<?php
	// Determine archive context.
	$archive_type = 'archive';
	$archive_id   = 0;
	$year_attr    = '';
	$month_attr   = '';

	if ( is_category() ) {
		$archive_type = 'category';
		$archive_id   = get_queried_object_id();
	} elseif ( is_tag() ) {
		$archive_type = 'tag';
		$archive_id   = get_queried_object_id();
	} elseif ( is_author() ) {
		$archive_type = 'author';
		$archive_id   = get_queried_object_id();
	} elseif ( is_date() ) {
		$archive_type = 'date';
		$year_attr    = get_query_var( 'year' );
		$month_attr   = get_query_var( 'monthnum' );
	}
	?>

	<main id="primary" class="site-main" data-archive-type="<?php echo esc_attr( $archive_type ); ?>" data-archive-id="<?php echo esc_attr( $archive_id ); ?>" data-year="<?php echo esc_attr( $year_attr ); ?>" data-month="<?php echo esc_attr( $month_attr ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="posts-container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</div><!-- .posts-container -->
			<?php

			// Numeric Pagination for archives (use numeric so AJAX/links match category base).
			if ( function_exists( 'elementic_numeric_pagination' ) ) {
				elementic_numeric_pagination();
			} else {
				elementic_magic_line_pagination();
			}

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();